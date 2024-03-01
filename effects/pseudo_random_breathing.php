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

function pseudo_random_breathing()
{
	global $minTime, $maxTime, $chosenColors;
	$duration = getRandomTime($minTime['pseudo_random_breathing'], $maxTime['pseudo_random_breathing']);
	/* We use the built-in mouse breathing mode to breathe between the two randomly priviliged chosen colors */
	$color1 = getRandomColor($chosenColors);
	$colorsTmp = $chosenColors;
	unset($colorsTmp[$color1]);
	$colorsTmp = array_values($colorsTmp);
	$color2 = getRandomColor($colorsTmp);
	system('uchroma fx breathe --colors "' . $color1 . '" "' . $color2 . '"');
	sleep($duration);
}