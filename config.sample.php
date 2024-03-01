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

$effectsWeights = array();
$minTime = array();
$maxTime = array();

/* Random Mode can be 'mt' for use of the Mersenne Twister algorithm or 'crypto' to use a cryptographically secure algorithm.
 * Can choosing effects and color for a mouse with cryptographically secure algorithm be useful in some circonstances?
 * I'll let the reader think about it.
 * Note that the 'crypto' method requires PHP7+
 */
$randomMode = 'mt';

/* Put below the list of priviliged colors used by the pseudo* effects */
$chosenColors = array('#ff0000', '#00ff00', '#0000ff', '#ffff00', '#ff00ff', '#00ffff');

/* Put below the weights of the desired effect. To disable an effect, just comment the corresponding line */
$effectsWeights['random_breathing'] = 20;
$effectsWeights['pseudo_random_breathing'] = 10;

$effectsWeights['random_reactive'] = 5;
$effectsWeights['pseudo_random_reactive'] = 5;

$effectsWeights['spectrum'] = 20;

$effectsWeights['random_static'] = 10;
$effectsWeights['pseudo_random_static'] = 10;

$effectsWeights['wave'] = 20;

/* Put below the minimum and maximum duration (in seconds) of each effect. */
$minTime['random_breathing'] = 60;
$maxTime['random_breathing'] = 300;
$minTime['pseudo_random_breathing'] = 60;
$maxTime['pseudo_random_breathing'] = 180;

$minTime['random_reactive'] = 30;
$maxTime['random_reactive'] = 60;
$minTime['pseudo_random_reactive'] = 30;
$maxTime['pseudo_random_reactive'] = 60;

$minTime['spectrum'] = 60;
$maxTime['spectrum'] = 300;

$minTime['random_static'] = 60;
$maxTime['random_static'] = 120;
$minTime['pseudo_random_static'] = 60;
$maxTime['pseudo_random_static'] = 180;

$minTime['wave'] = 60;
$maxTime['wave'] = 300;
