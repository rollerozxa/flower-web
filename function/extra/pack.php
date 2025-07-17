<?php

// Something that was intended to be used for writing out binary responses. Don't think it ever got used,
// as I found the library from pocketmine instead.

class packHelper {
	public static function int8($i) {
		return is_int($i) ? pack("c", $i) : unpack("c", $i)[1];
	}

	public static function uInt8($i) {
		return is_int($i) ? pack("C", $i) : unpack("C", $i)[1];
	}

	public static function int16($i) {
		return is_int($i) ? pack("s", $i) : unpack("s", $i)[1];
	}

	public static function uInt16($i) {
		$f = is_int($i) ? "pack" : "unpack";
		$i = $f("n", $i);
		return is_array($i) ? $i[1] : $i;
	}

	public static function int32($i) {
		return is_int($i) ? pack("l", $i) : unpack("l", $i)[1];
	}

	public static function uInt32($i) {
		$f = is_int($i) ? "pack" : "unpack";
		$i = $f("N", $i);
		return is_array($i) ? $i[1] : $i;
	}

	public static function int64($i) {
		return is_int($i) ? pack("q", $i) : unpack("q", $i)[1];
	}

	public static function uInt64($i) {
		$f = is_int($i) ? "pack" : "unpack";
		$i = $f("J", $i);
		return is_array($i) ? $i[1] : $i;
	}
}

//echo packHelper::uInt32(1337);