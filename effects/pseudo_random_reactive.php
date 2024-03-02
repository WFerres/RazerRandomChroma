#!/usr/bin/env php
<?php

/**
 * @author William FERRES
 * @depends polychromatic tool for hardware communication.
 * RazerRandomChroma, a simple tool to control the Chroma function of a Razer mouse.
 * Features random choice of effect for random with weighted choices to favor preferred effects.
 */

if(!defined('IN_TOOL'))
{
	die('Do not run this script directly');
}

function pseudo_random_reactive()
{
	global $minTime, $maxTime, $chosenColors;
	$duration = getRandomTime($minTime['pseudo_random_reactive'], $maxTime['pseudo_random_reactive']);
	$color = getRandomColor($chosenColors);
	$speed = getRandomSpeed(1, 4);
	system('polychromatic-cli -z backlight -o reactive -p "' . $speed . '" -c "' . $color . '"');
	sleep($duration);
}