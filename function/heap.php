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
		case 10:	return '';
		case 11:	return '';
		case 12:	return '';
		case 13:	return '';
		case 14:	return '';
		case 15:	return '';
		case 16:	return '';
		case 17:	return '';
		case 18:	return '';
		case 19:	return '';
		case 20:	return '';
		
	}
}

function heapsize() {
	// TODO: Make heap size system.
}

?>