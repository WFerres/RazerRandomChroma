#!/usr/bin/env php
<?php

/**
 * @author William FERRES
 * @depends uchroma tool for hardware communication.
 * RazerRandomChroma, a simple tool to control the Chroma function of a Razer mouse.
 * Features random choice of effect for random with weighted choices to favor preferred effects.
 */

if(!defined('IN_TOOL'))
{
	die('Do not run this script directly');
}

function random_reactive()
{
	global $minTime, $maxTime;
	$duration = getRandomTime($minTime['random_reactive'], $maxTime['random_reactive']);
	$color = getRandomColor();
	$speed = getRandomSpeed(1, 4);
	system('uchroma fx reactive --color "' . $color . '" --speed "' . $speed . '"');
	sleep($duration);
}