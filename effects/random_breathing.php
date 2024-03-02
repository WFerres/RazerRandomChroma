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

function random_breathing()
{
	global $minTime, $maxTime;
	$duration = getRandomTime($minTime['random_breathing'], $maxTime['random_breathing']);
	$endTime = time() + $duration;
	while(time() < $endTime)
	{
		/* As there is no real random in the mouse breathing mode, we recreate it by using the static mode */
		$color = getRandomColor();
		system('polychromatic-cli -z backlight -o static -c "' . $color . '"');
		sleep(3);
		system('polychromatic-cli -z backlight -o static -c "#000000"');
		sleep(3);
	}
}