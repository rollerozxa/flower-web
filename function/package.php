<?php

/// PGM package functions

/**
 * Takes the ID of a PGM package reward and returns a human friendly title of the PGM package reward.
 *
 * @param string $id ID of the PGM package reward.
 * @return string Human friendly title of the PGM package reward.
 */
function PakIDtoName($id) {
	switch ($id) {
		case 'water':		return 'Water';
		case 'sun':			return 'Sun';
		case 'giga':		return 'Giga Fertilizer';
		case 'warp':		return 'Time Warp';
		case 's_income':	return 'Seed Income';
		case 't_income':	return 'Stars Income';
		case 'bgr':			return 'Basic Growth Rate';
		case 'stars':		return 'Stars';
		case 'seeds':		return 'Seeds';
	}
}
