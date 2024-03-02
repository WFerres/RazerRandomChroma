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

function internal_rand($min, $max)
{
	global $randomMode;
	if($randomMode === 'mt')
	{
		return mt_rand($min, $max);
	}
	elseif($randomMode === 'crypto')
	{
		return random_int($min, $max);
	}
	die('Unknown random method');
}

function getRandomEffect($effectsWeights)
{
	$rand = internal_rand(1, (int) array_sum($effectsWeights));
	foreach($effectsWeights AS $key => $value)
	{
		$rand -= $value;
		if($rand <= 0)
		{
			return $key;
		}
	}
}

function getRandomColor($subset = NULL)
{
	if($subset === NULL)
	{
		ob_start();
		printf('#%06x', internal_rand(0, 16777215));
		return ob_get_clean();
	}
	shuffle($subset);
	return $subset[0];
}

function getRandomDirection()
{
	return internal_rand(1, 2);
}

function getRandomTime($min, $max)
{
	return internal_rand($min, $max);
}

function getRandomSpeed($min, $max)
{
	return internal_rand($min, $max);
}