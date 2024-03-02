#!/usr/bin/env php
<?php

/**
 * @author William FERRES
 * @depends polychromatic tool for hardware communication.
 * RazerRandomChroma, a simple tool to control the Chroma function of a Razer mouse.
 * Features random choice of effect for random with weighted choices to favor preferred effects.
 */

if(PHP_SAPI !== 'cli')
{
	die('This tool must be run in the cli');
}
define('IN_TOOL', true);

define('ROOT_DIR', __DIR__ . DIRECTORY_SEPARATOR);

require_once ROOT_DIR . 'config.php';
require_once ROOT_DIR . 'includes' . DIRECTORY_SEPARATOR . 'utils.php';

/* Pseudo random effects are the same as random effects but only features a subset of specifically chosen colors to let the most beautiful colors appear more frequently than unknown ones. */
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'random_breathing.php';
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'pseudo_random_breathing.php';
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'pseudo_builtin_random_breathing.php';
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'random_reactive.php';
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'pseudo_random_reactive.php';
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'spectrum.php';
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'random_static.php';
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'pseudo_random_static.php';
require_once ROOT_DIR . 'effects' . DIRECTORY_SEPARATOR . 'wave.php';

/* Fire the main logic code */

while(true)
{
	$nextEffect = getRandomEffect($effectsWeights);
	$nextEffect();
}
