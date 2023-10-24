<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="css/bootstrap.css" rel="stylesheet">
    <title>Forecast</title>
    <style>
        .container-fluid {
            /* This class is used as is from bootstrap. No changes required. */
        }

        /* This class creates the blue boxes of the correct width for each day. */
        .bg-primary {
            width: 500px;
            height: auto;
            min-height: 150px;
            padding: 10px;
            margin-bottom: 2px;
        }

        /* This sets the paragraphs away from the left margin */
        .bg-primary p {
            padding-left: 90px;
        }

        /* This floats the image to the left and sets the size. */
        .forecastImage {
            margin-right: 10px;
            width: 80px;
            float: left;
        }

        h5 {
            background-color: yellow;
            width: 500px;
            padding: 10px;
        }
    </style>
</head>
<body>
<?php
// Array for months
$monthArray = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

//Temperature codes for display
$degreeCodeCelsius = "&#8451;";
$degreeCodeFahrenheit = "	&#8457;";

if (!file_exists("forecastData/forcast.txt")
    || !filesize("forecastData/forcast.txt")) { ?>
    <h1>Forcast is Unavailable. our webteam </h1>
    <p><?= getdate("m/d/Y") ?></p>

<? }


function checkMeasuringUnit($unit, $temp)
{
    switch ($unit) {
        case "celsius":
            $temp .= "℃";
        case "fahrenheit":
    }
    $temp .= "℉";
    return $temp;
}

/*getdate()
strtotime();*/
?>
<div class="container-fluid">
    <h3>5 Day Forecast</h3>
    <div class='bg-primary'>
        <h4>test</h4>
        <img src='' class='forecastImage'>
        <p>test</p>
        <p>test</p>
    </div>
    <h5>Weekly Temperature Averages: High: ?? Low: ??</h5>
    Current as of 'today's date'

    <!-- this code will be used in the event the data file is not found or is empty
    <h2>Forecast is unavailable. Our web team has been notified.</h2>-->
</body>
</html>