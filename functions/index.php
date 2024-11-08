<?php
// require './../app/dummy.php';
function app() {
    return \App\Config\Config::getInstance();
}

function DateTimeFormat($DateTime, $Timezone, $RegionCode = ''){
    $dateTime = new DateTime($DateTime);

    $dateTime->setTimezone(new DateTimeZone($Timezone));
    $formattedDateTime = $dateTime->format('d/m/Y \a\t h:i a');
    return $formattedDateTime.' '.$RegionCode;
}



function dummy() {
    // die('fsfsdf');
    // return getWeatherData();
    return false;
}
