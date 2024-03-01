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

function random_static()
{
	global $minTime, $maxTime;
	$duration = getRandomTime($minTime['random_static'], $maxTime['random_static']);
	$color = getRandomColor();
	system('uchroma fx static --color "' . $color . '"');
	sleep($duration);
}