<?php

use Google\Client;
use Google\Service\Sheets;
use Google\Service\Drive;
use Google\Service\Drive\Permission;
use \Google\Service\Sheets\Spreadsheet;

use Classes\Helpers\CurlRequest;

require_once 'Mail.php';
class AccuWeather {
    private $Client;
    private $Obj_CurrentConditionData;
    public function __construct() {
        $this->Client = new Client();
        $this->Client->setAuthConfig(realpath(__DIR__ . '/../../google-service-account.json'));
        $this->Client->setScopes(Sheets::SPREADSHEETS);
        $this->Client->addScope(Drive::DRIVE);
        $this->Index();
    }

    public function Index() {
        $WeatherData = [];        
        $_URL = app()->apiurl.LOCATION_ENDPOINT['TOPCITIES'].RECORDS_PER_PAGE;
        $_PARAMS = '?apikey='.app()->apikey;
        $LocationTopCitiesUrl = $_URL.$_PARAMS;
        $LocationTopCitiesResponse = CurlRequest::get($LocationTopCitiesUrl);
        
        $__URL = app()->apiurl.CURRENT_CONDITION_ENDPOINT['TOPCITIES'].RECORDS_PER_PAGE;
        $__PARAMS = '?apikey='.app()->apikey;
        $CurrentConditionTopCitiesUrl = $__URL.$__PARAMS;
        $CurrentConditionResponse = CurlRequest::get($CurrentConditionTopCitiesUrl);
        
        // dummy captured for testing and prepare the logics
        $dummyLocationsCitites = dummyLocationsCitites();
        $dummyCurrentConditionCitites = dummyCurrentConditionCitites();
        
        $locationsResponse = $LocationTopCitiesResponse;
        $currentCondtion = $CurrentConditionResponse;
        if( $locationsResponse['status_code'] == 200 && $currentCondtion['status_code'] == 200 ){
            
            $WeatherData[] = SHEET_HEADINGS;
            $this->Obj_CurrentConditionData = $currentCondtion['response'];
            
            foreach ($locationsResponse['response'] as $key => $locations) {
                // $WeatherData[] = [
                //     'name'=>$locations['EnglishName'],
                //     'country'=>$locations['Country']['EnglishName'],
                //     'region'=>$locations['Region']['EnglishName'],
                //     'Timezone' => $locations['TimeZone']['Name'],
                //     'Rank' => $locations['Rank'],
    
                //     'Latitude' => $currentCondtion[$key]['GeoPosition']['Latitude'],
                //     'Longitude' => $currentCondtion[$key]['GeoPosition']['Longitude'],
                //     'WeatherText' => $currentCondtion[$key]['WeatherText'],
                //     'IsDayTime' => $currentCondtion[$key]['IsDayTime'] == 1 ? 'TRUE':'FALSE',
                //     'TemperatureCelsiusC' => $currentCondtion[$key]['Temperature']['Metric']['Value'],
                //     'TemperatureFahrenheitF' => $currentCondtion[$key]['Temperature']['Imperial']['Value'],
                //     'LastUpdatedAt' => DateTimeFormat($currentCondtion[$key]['LocalObservationDateTime'], $locations['TimeZone']['Name'], $locations['TimeZone']['Code']),
                // ];
                
                $_LocationData= [
                    $locations['EnglishName'],
                    $locations['Country']['EnglishName'],
                    $locations['Region']['EnglishName'],
                    $locations['TimeZone']['Name'],
                    $locations['Rank'],
                ];

                // making sure and getting date based on Key.
                $_CurrentConditionData = $this->GetCurrentConditionData($locations["Key"]);
                $WeatherData[] = array_merge($_LocationData, $_CurrentConditionData);
            }

            $service = new Sheets($this->Client);
            $driveService = new Drive($this->Client);
    
            $permission = new Permission();
            $permission->setType('anyone'); 
            $permission->setRole('reader');
           
            $Title = 'AccuWeather Reports '.time();
            $spreadsheet = new Sheets\Spreadsheet([
                'properties' => [
                    'title' => $Title
                ]
            ]);
            
            $createdSpreadsheet = $service->spreadsheets->create($spreadsheet);
            $spreadsheetId = $createdSpreadsheet->spreadsheetId;
    
            $range = 'Sheet1!A1';
            $body = new Google\Service\Sheets\ValueRange([
                'values' => $WeatherData
            ]);
    
            $service->spreadsheets_values->update(
                $spreadsheetId,
                $range,
                $body,
                ['valueInputOption' => 'RAW']
            );

            $driveService->permissions->create($spreadsheetId, $permission);
            echo "Spreadsheet Generated ID: " . $spreadsheetId;
            echo "<hr />Google Spread sheet: <a target='_blank' href='https://docs.google.com/spreadsheets/d/".$spreadsheetId."'>".$Title."</a>";
            echo '<hr />';

            $GoogleSheetLink = str_replace("{SPREADSHEET_ID}",$spreadsheetId,GOOGLE_SHEETL_EXPORT_LINK);
            $GoogeSheetPath = 'google_report_sheet.xlsx';
            $this->downloadGoogleSheet($GoogleSheetLink, $GoogeSheetPath);
            $Email = new Mail();
            $EmalResposne = $Email->sendEmail(EMAIL_TEMPLATE['email'], EMAIL_TEMPLATE['subject'], EMAIL_TEMPLATE['body'],    '', $GoogeSheetPath);
            if( $EmalResposne ){
                echo "Email sent successfully!";
            } else {
                echo "Email sent Faild";
            }
            echo "<hr /> -------------------------- END OF EXECUTION -------------------------- ";
            die;
        } else {
            echo "Invalid response";
            die;
        }
    }

    public function GetCurrentConditionData ($Key){
        $indexedArray = array_column($this->Obj_CurrentConditionData, null, 'Key');
        
        if (isset($indexedArray[$Key])) {
            $item = $indexedArray[$Key];
            return [
                $item['GeoPosition']['Latitude'],
                $item['GeoPosition']['Longitude'],
                $item['WeatherText'],
                $item['IsDayTime'] == 1 ? 'TRUE':'FALSE',
                $item['Temperature']['Metric']['Value'],
                DateTimeFormat($item['LocalObservationDateTime'], $item['TimeZone']['Name'], $item['TimeZone']['Code'])
            ];
        }
        return [];
    }
    public function  downloadGoogleSheet($googleSheetLink, $savePath)
    {
        // Use file_get_contents to download the file content from the public Google Sheet URL
        $fileContent = file_get_contents($googleSheetLink);
    
        if ($fileContent === false) {
            die('Error downloading file.');
        }
    
        // Save the content to a local file
        file_put_contents($savePath, $fileContent);
    }
}