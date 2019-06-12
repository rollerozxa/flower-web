<?php

/**
 * Gives you the human-readable name of the heap prize.
 *
 * @param int $id Heap prize ID.
 * @return string Heap prize name.
 */
function heapprize($id) {
	switch ($id) {
		case 1:		return '200 days of water for all flowers';
		case 2:		return '200 days of sun for all flowers';
		case 3:		return '200 days of warp for all flowers';
		case 4:		return '200 days of giga for all flowers';
		case 5:		return '100cm/hr basic growth rate for all flowers';
		case 6:		return '+2 PGM';
		case 7:		return '+5 PGM';
		case 8:		return '3 prepaid PGM packages';
		case 9:		return '+100*/hr ';
	}
}

/**
 * Converts a heap size ID into the integer heap size.
 *
 * @param int $id Heap size ID.
 * @return int Heap size.
 */
function heapsize($id) {
	switch ($id) {
		case 1:		return 5000000;
		case 2:		return 250000000;
		case 3:		return 500000000;
		case 4:		return 750000000;
		case 5:		return 1500000000;
		case 6:		return 3000000000;
	}
}

?>