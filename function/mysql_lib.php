<?php
$sqldebug = 1;
$nqueries = 0;
$nrowsf = 0;
$nrowst = 0;

function SqlQuery($query) {
	global $mysqli, $nqueries, $nrowst, $sqldebug;
	
	$res = $mysqli->query($query);
	if (!$res) {
		print "<strong>MySQL error</strong>: " . $mysqli->error;
		if ($sqldebug)
			print " @ " . $query;
		print "<br>";
	} else {
		$nqueries++;
		$nrowst += (int) isset($res->num_rows);
	}
	
	return $res;
}

function SqlFetchRow($res) {
	global $nrowsf;
	
	if (!$res)
		return NULL;
	if ($res->num_rows <= 0)
		return NULL;
	
	$ret = $res->fetch_assoc();
	if ($ret)
		$nrowsf++;
	
	return $ret;
}

function SqlQueryFetchRow($query) {
	return SqlFetchRow(SqlQuery($query));
}

function SqlQueryResult($query, $col = 0) {
	global $nrowsf;
	
	$res = SqlQuery($query);
	if (!$res)
		return NULL;
	if ($res->num_rows <= 0)
		return NULL;
	
	$nrowsf++;
	$ceva = array_values($res->fetch_assoc());
	$rasp = $ceva[$col];
	return $rasp;
}

function SqlNumRows($res) {
	if (!$res)
		return 0;
	return $res->num_rows;
}

function SqlEscape($val) {
	global $mysqli;
	return $mysqli->real_escape_string($val);
}

?>