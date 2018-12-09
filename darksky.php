#!/usr/bin/php

<?php
function test_image_daytime($icon) {
	switch ($icon) {
		case "clear-day":
			return 'a';
		case "clear-night":
			return 'a';
		case "rain":
			return 'g';
		case "snow":
			return 'o';
		case "sleet":
			return 'x';
		case "wind":
			return '9';
		case "fog":
			return '7';
		case "cloudy":
			return 'e';
		case "partly-cloudy-day":
			return 'c';
		case "partly-cloudy-night":
			return 'a';
    }
}

function test_image_nighttime($icon) {
    switch($icon) {
		case "clear-day":
			return 'A';
		case "clear-night":
			return 'A';
		case "rain":
			return 'G';
		case "snow":
			return 'O';
		case "sleet":
			return 'x';
		case "wind":
			return '9';
		case "fog":
			return '7';
		case "cloudy":
			return 'f';
		case "partly-cloudy-day":
			return 'C';
		case "partly-cloudy-night":
			return 'C';
    }
}

function test_image_forecast($icon) {
	switch ($icon) {
		case "clear-day":
			return 'a';
		case "clear-night":
			return 'a';
		case "rain":
			return 'j';
		case "snow":
			return 'q';
		case "sleet":
			return 'x';
		case "wind":
			return '9';
		case "fog":
			return '7';
		case "cloudy":
			return 'e';
		case "partly-cloudy-day":
			return 'c';
		case "partly-cloudy-night":
			return 'a';
	}
}

# Put your coordinates here:
$coords="";

# Put your API key for Dark Sky here:
$apiKey="";

# Put your preferred temperature units here:
$units="si";


# Get current weather forecast:
$jsonData=`curl https://api.darksky.net/forecast/{$apiKey}/{$coords}?units=${units}`;

# Decode json object:
$weatherData=json_decode($jsonData);

# Generate current icon based on time of day:
$hour=date("H");

if ($hour > 6 && $hour < 18) {
	echo(test_image_daytime($weatherData->currently->icon));
	echo("\n");
}
else {
	echo(test_image_nighttime($weatherData->currently->icon));
	echo("\n");
}

# Write apparent current temperature:
echo((int)round($weatherData->currently->apparentTemperature));
echo("\n");


# Write forecast information for the next three days:
$timeZone = $weatherData->timezone;
$dt = new DateTime("now", new DateTimeZone($timeZone));

for ($i = 0; $i < 3; ++$i) {
	echo(test_image_forecast($weatherData->daily->data[( $i+1 )]->icon));
	echo("\n");
	echo((int)round($weatherData->daily->data[( $i+1 )]->apparentTemperatureLow));
	echo("\n");
	echo((int)round($weatherData->daily->data[( $i+1 )]->apparentTemperatureHigh));
	echo("\n");
    $dt->setTimestamp($weatherData->daily->data[( $i+1 )]->time);
	echo($dt->format("D"));
	echo("\n");
}
?>
