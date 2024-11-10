<?php 
$PREFIX = '';
$RECORDS_PER_PAGE = 50;
$API_V = 'v1';
$LOCATION_ENDPOINT = [
    "TOPCITIES"=> "/locations/".$API_V."/topcities/",
];

$CURRENT_CONDITION_ENDPOINT = [
    "TOPCITIES"=> "/currentconditions/".$API_V."/topcities/",
];

$SHEET_HEADINGS = [
    'Name',
    'Country',
    'Region',
    'Timezone',
    'Rank',
    'Latitude',
    'Longitude',
    'Weather Text',
    'Is Day Time',
    'Temperature Celsius (C)',
    'Temperature Fahrenheit (F)',
    'Last Updated At'
];

$EMAIL_TEMPLATE = [
    'email'=>'zahin@iion.io', // Email id on which the Sheet will be sent after creation
    'subject'=>'Weather Report for Top 50 Cities - Attached Excel File',
    'body'=>'<p>I hope this message finds you well.</p>
        <p>
            I am pleased to share with you the latest weather report, which includes current conditions and location-specific data for the top 50 cities. This report provides an overview of key weather metrics, including temperature, humidity, and overall conditions, helping you stay updated with the latest climate insights.
        </p>
        <p>
            Please find the attachment
        </p>
        <h4>Thanks & Regards</h4>'
];

$GOOGLE_SHEETL_EXPORT_LINK = 'https://docs.google.com/spreadsheets/d/{SPREADSHEET_ID}/export?format=xlsx';

define("LOCATION_ENDPOINT", $LOCATION_ENDPOINT);
define("CURRENT_CONDITION_ENDPOINT", $CURRENT_CONDITION_ENDPOINT);
define("RECORDS_PER_PAGE", $RECORDS_PER_PAGE);
define("SHEET_HEADINGS", $SHEET_HEADINGS);
define("EMAIL_TEMPLATE", $EMAIL_TEMPLATE);
define("GOOGLE_SHEETL_EXPORT_LINK", $GOOGLE_SHEETL_EXPORT_LINK);