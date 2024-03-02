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

function pseudo_builtin_random_breathing()
{
	global $minTime, $maxTime;
	$duration = getRandomTime($minTime['pseudo_builtin_random_breathing'], $maxTime['pseudo_builtin_random_breathing']);
	/* We use the built-in mouse breathing mode to breathe between the colors chosen "randomly" by the mouse.
	 * Note that on most Razer mouse, the built-in random mode will only ever select #ff0000, #00ff00, #0000ff, #ffff00, #ff00ff, #00ffff */
	system('polychromatic-cli -z backlight -o breath -p random');
	sleep($duration);
}