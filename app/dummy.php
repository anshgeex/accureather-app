<?php

// function getWeatherData(){
//     return 'jfkldf';
// }

function dummyLocationsCitites() {
    return [
        'status_code' => 200,
        'response' => [
            [
                'Version' => 1,
                'Key' => 28143,
                'Type' => 'City',
                'Rank' => 10,
                'LocalizedName' => 'Dhaka',
                'EnglishName' => 'Dhaka',
                'PrimaryPostalCode' => '',
                'Region' => [
                    'ID' => 'ASI',
                    'LocalizedName' => 'Asia',
                    'EnglishName' => 'Asia',
                ],
                'Country' => [
                    'ID' => 'BD',
                    'LocalizedName' => 'Bangladesh',
                    'EnglishName' => 'Bangladesh',
                ],
                'AdministrativeArea' => [
                    'ID' => 'C',
                    'LocalizedName' => 'Dhaka',
                    'EnglishName' => 'Dhaka',
                    'Level' => 1,
                    'LocalizedType' => 'Division',
                    'EnglishType' => 'Division',
                    'CountryID' => 'BD',
                ],
                'TimeZone' => [
                    'Code' => 'BDT',
                    'Name' => 'Asia/Dhaka',
                    'GmtOffset' => 6,
                    'IsDaylightSaving' => '',
                    'NextOffsetChange' => '',
                ],
                'GeoPosition' => [
                    'Latitude' => 23.71,
                    'Longitude' => 90.407,
                    'Elevation' => [
                        'Metric' => [
                            'Value' => 5,
                            'Unit' => 'm',
                            'UnitType' => 5,
                        ],
                        'Imperial' => [
                            'Value' => 16,
                            'Unit' => 'ft',
                            'UnitType' => 0,
                        ],
                    ],
                ],
                'IsAlias' => '',
                'SupplementalAdminAreas' => [],
                'DataSets' => [
                    'AirQualityCurrentConditions',
                    'AirQualityForecasts',
                    'FutureRadar',
                    'MinuteCast',
                ],
            ],
            [
                'Version' => 1,
                'Key' => 113487,
                'Type' => 'City',
                'Rank' => 10,
                'LocalizedName' => 'Kinshasa',
                'EnglishName' => 'Kinshasa',
                'PrimaryPostalCode' => '',
                'Region' => [
                    'ID' => 'AFR',
                    'LocalizedName' => 'Africa',
                    'EnglishName' => 'Africa',
                ],
                'Country' => [
                    'ID' => 'CD',
                    'LocalizedName' => 'Democratic Republic of the Congo',
                    'EnglishName' => 'Democratic Republic of the Congo',
                ],
                'AdministrativeArea' => [
                    'ID' => 'KN',
                    'LocalizedName' => 'Kinshasa',
                    'EnglishName' => 'Kinshasa',
                    'Level' => 1,
                    'LocalizedType' => 'City',
                    'EnglishType' => 'City',
                    'CountryID' => 'CD',
                ],
                'TimeZone' => [
                    'Code' => 'WAT',
                    'Name' => 'Africa/Kinshasa',
                    'GmtOffset' => 1,
                    'IsDaylightSaving' => '',
                    'NextOffsetChange' => '',
                ],
                'GeoPosition' => [
                    'Latitude' => -4.316,
                    'Longitude' => 15.298,
                    'Elevation' => [
                        'Metric' => [
                            'Value' => 180,
                            'Unit' => 'm',
                            'UnitType' => 5,
                        ],
                        'Imperial' => [
                            'Value' => 590,
                            'Unit' => 'ft',
                            'UnitType' => 0,
                        ],
                    ],
                ],
                'IsAlias' => '',
                'SupplementalAdminAreas' => [],
                'DataSets' => [
                    'AirQualityCurrentConditions',
                    'AirQualityForecasts',
                    'MinuteCast',
                ],
            ],
            [
                'Version' => 1,
                'Key' => 60449,
                'Type' => 'City',
                'Rank' => 10,
                'LocalizedName' => 'Santiago',
                'EnglishName' => 'Santiago',
                'PrimaryPostalCode' => '',
                'Region' => [
                    'ID' => 'SAM',
                    'LocalizedName' => 'South America',
                    'EnglishName' => 'South America',
                ],
                'Country' => [
                    'ID' => 'CL',
                    'LocalizedName' => 'Chile',
                    'EnglishName' => 'Chile',
                ],
                'AdministrativeArea' => [
                    'ID' => 'RM',
                    'LocalizedName' => 'Región Metropolitana de Santiago',
                    'EnglishName' => 'Región Metropolitana de Santiago',
                    'Level' => 1,
                    'LocalizedType' => 'Region',
                    'EnglishType' => 'Region',
                    'CountryID' => 'CL',
                ],
                'TimeZone' => [
                    'Code' => 'CLST',
                    'Name' => 'America/Santiago',
                    'GmtOffset' => -3,
                    'IsDaylightSaving' => 1,
                    'NextOffsetChange' => '2025-04-06T03:00:00Z',
                ],
                'GeoPosition' => [
                    'Latitude' => -33.446,
                    'Longitude' => -70.659,
                    'Elevation' => [
                        'Metric' => [
                            'Value' => 522,
                            'Unit' => 'm',
                            'UnitType' => 5,
                        ],
                        'Imperial' => [
                            'Value' => 1712,
                            'Unit' => 'ft',
                            'UnitType' => 0,
                        ],
                    ],
                ],
                'IsAlias' => '',
                'SupplementalAdminAreas' => [
                    [
                        'Level' => 2,
                        'LocalizedName' => 'Santiago',
                        'EnglishName' => 'Santiago',
                    ],
                ],
                'DataSets' => [
                    'AirQualityCurrentConditions',
                    'AirQualityForecasts',
                    'FutureRadar',
                    'MinuteCast',
                    'Radar',
                ]
            ]
        ]
    ];
}

function dummyCurrentConditionCitites() {
    return [
        'status_code' => 200,
        'response' => [
            [
                'Key' => 28143,
                'LocalizedName' => 'Dhaka',
                'EnglishName' => 'Dhaka',
                'Country' => [
                    'ID' => 'BD',
                    'LocalizedName' => 'Bangladesh',
                    'EnglishName' => 'Bangladesh',
                ],
                'TimeZone' => [
                    'Code' => 'BDT',
                    'Name' => 'Asia/Dhaka',
                    'GmtOffset' => 6,
                    'IsDaylightSaving' => false,
                    'NextOffsetChange' => null,
                ],
                'GeoPosition' => [
                    'Latitude' => 23.7098,
                    'Longitude' => 90.40711,
                    'Elevation' => [
                        'Metric' => [
                            'Value' => 5,
                            'Unit' => 'm',
                            'UnitType' => 5,
                        ],
                        'Imperial' => [
                            'Value' => 16,
                            'Unit' => 'ft',
                            'UnitType' => 0,
                        ],
                    ],
                ],
                'LocalObservationDateTime' => '2024-11-07T15:52:00+06:00',
                'EpochTime' => 1730973120,
                'WeatherText' => 'Hazy sunshine',
                'WeatherIcon' => 5,
                'HasPrecipitation' => false,
                'PrecipitationType' => null,
                'IsDayTime' => true,
                'Temperature' => [
                    'Metric' => [
                        'Value' => 31.2,
                        'Unit' => 'C',
                        'UnitType' => 17,
                    ],
                    'Imperial' => [
                        'Value' => 88,
                        'Unit' => 'F',
                        'UnitType' => 18,
                    ],
                ],
                'MobileLink' => 'http://www.accuweather.com/en/bd/dhaka/28143/current-weather/28143?lang=en-us',
                'Link' => 'http://www.accuweather.com/en/bd/dhaka/28143/current-weather/28143?lang=en-us',
            ],
            [
                'Key' => 113487,
                'LocalizedName' => 'Kinshasa',
                'EnglishName' => 'Kinshasa',
                'Country' => [
                    'ID' => 'CD',
                    'LocalizedName' => 'Democratic Republic of the Congo',
                    'EnglishName' => 'Democratic Republic of the Congo',
                ],
                'TimeZone' => [
                    'Code' => 'WAT',
                    'Name' => 'Africa/Kinshasa',
                    'GmtOffset' => 1,
                    'IsDaylightSaving' => false,
                    'NextOffsetChange' => null,
                ],
                'GeoPosition' => [
                    'Latitude' => -4.31642,
                    'Longitude' => 15.29834,
                    'Elevation' => [
                        'Metric' => [
                            'Value' => 180,
                            'Unit' => 'm',
                            'UnitType' => 5,
                        ],
                        'Imperial' => [
                            'Value' => 590,
                            'Unit' => 'ft',
                            'UnitType' => 0,
                        ],
                    ],
                ],
                'LocalObservationDateTime' => '2024-11-07T10:37:00+01:00',
                'EpochTime' => 1730972220,
                'WeatherText' => 'Cloudy',
                'WeatherIcon' => 7,
                'HasPrecipitation' => false,
                'PrecipitationType' => null,
                'IsDayTime' => true,
                'Temperature' => [
                    'Metric' => [
                        'Value' => 28.2,
                        'Unit' => 'C',
                        'UnitType' => 17,
                    ],
                    'Imperial' => [
                        'Value' => 83,
                        'Unit' => 'F',
                        'UnitType' => 18,
                    ],
                ],
                'MobileLink' => 'http://www.accuweather.com/en/cd/kinshasa/113487/current-weather/113487?lang=en-us',
                'Link' => 'http://www.accuweather.com/en/cd/kinshasa/113487/current-weather/113487?lang=en-us',
            ],
            [
                'Key' => 60449,
                'LocalizedName' => 'Santiago',
                'EnglishName' => 'Santiago',
                'Country' => [
                    'ID' => 'CL',
                    'LocalizedName' => 'Chile',
                    'EnglishName' => 'Chile',
                ],
                'TimeZone' => [
                    'Code' => 'CLST',
                    'Name' => 'America/Santiago',
                    'GmtOffset' => -3,
                    'IsDaylightSaving' => true,
                    'NextOffsetChange' => '2025-04-06T03:00:00Z',
                ],
                'GeoPosition' => [
                    'Latitude' => -33.44643,
                    'Longitude' => -70.65901,
                    'Elevation' => [
                        'Metric' => [
                            'Value' => 522,
                            'Unit' => 'm',
                            'UnitType' => 5,
                        ],
                        'Imperial' => [
                            'Value' => 1712,
                            'Unit' => 'ft',
                            'UnitType' => 0,
                        ],
                    ],
                ],
                'LocalObservationDateTime' => '2024-11-07T06:35:00-03:00',
                'EpochTime' => 1730972100,
                'WeatherText' => 'Partly cloudy',
                'WeatherIcon' => 35,
                'HasPrecipitation' => false,
                'PrecipitationType' => null,
                'IsDayTime' => false,
                'Temperature' => [
                    'Metric' => [
                        'Value' => 11.2,
                        'Unit' => 'C',
                        'UnitType' => 17,
                    ],
                    'Imperial' => [
                        'Value' => 52,
                        'Unit' => 'F',
                        'UnitType' => 18,
                    ],
                ],
                'MobileLink' => 'http://www.accuweather.com/en/cl/santiago/60449/current-weather/60449?lang=en-us',
                'Link' => 'http://www.accuweather.com/en/cl/santiago/60449/current-weather/60449?lang=en-us',
            ],
        ],
    ];
}