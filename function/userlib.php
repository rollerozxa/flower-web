<?php

require_once('mysql.php');

define('IDENTIFIER_UID', 'uid');
define('IDENTIFIER_USERID', 'userID');

trait asdfTrait {
	private $data;
	private $dataDelta = [];
	private $readonly;
	private $identifier;
	private $idType;
	public static $cache = [];
	public static $cacheDelta = [];
	public static $doCache = true;
	/**
	 * Table the data should save to. This is supposed to be overriden on a class-level efter behov.
	 * (THIS CONCATENATES DIRECTLY INTO A QUERY, PLEASE SANITYCHECK YOUR INPUTS!)
	 */
	private $tbl = 'user';

	/**
	 * Construct method.
	 *
	 * @param bool $readonly
	 * @param string $identifier User identifier
	 * @param string $idType
	 */
	function __construct($readonly, $identifier, $idType = IDENTIFIER_UID) {
		$this->readonly = $readonly;
		$this->identifier = $identifier;
		$this->idType = $idType;
	}

	/**
	 * Destruct method. It saves the delta to the database.
	 */
	function __destruct() {
		// update user data only if object is read-only and $dataDelta isn't blank
		if (!$this->readonly && !empty($this->dataDelta)) {
			$sets = '';
			$values = [];
			foreach ($this->dataDelta as $k => $v) {
				if ($sets != '')
					$sets .= ',';
				$sets .= sprintf('%s = ?', $k);
				$values[] = $v;
			}
			$values[] = $this->identifier;
			$this->saveToDB($sets, $values);
		}
	}

	/**
	 * Set an user data value. If the object is constructed read-only, it will throw a warning.
	 *
	 * @param string $key Data key.
	 * @param mixed $value Data value.
	 */
	function setData($key, $value)  {
		if ($this->readonly) {
			trigger_error('setData() method used on read-only user object', E_USER_ERROR);
		}
		$this->dataDelta[$key]=$value;
		$this->cacheDelta();
	}

	/**
	 * Put the current data delta into cache. Extracted into a function to ease class-basis overrides.
	 */
	private function cacheDelta() {
		self::$cache[$this->identifier]['delta'] = $this->dataDelta;
	}

	/**
	 * Save the current data delta to database. Extracted into a function to ease class-basis overrides.
	 */
	private function saveToDB($sets, $values) {
		// null
	}

	/**
	 * Change the numeric value of $key by $value.
	 *
	 * @param string $key Data key.
	 * @param int $value Data value to change by.
	 */
	function abveData($key, $value) {
		if (!is_numeric($this->getData($key)) || !is_numeric($value)) {
			trigger_error('abveData() method used with non-numeric attribute and/or value', E_USER_ERROR);
		}
		$this->setData($key, $this->getData($key) + $value);
	}

	/**
	 * Get an user data value.
	 *
	 * @param string $key Data key.
	 * @return mixed Data value.
	 */
	function getData($key) {
		if (isset($this->dataDelta[$key])) {
			return $this->dataDelta[$key];
		} else {
			return $this->data[$key];
		}
	}

	/**
	 * Check if user has enough of $key, relative to $cmp.
	 *
	 * @param string $key Data key to compare with.
	 * @param int $cmp Amount to compare to.
	 * @return void
	 */
	function enough($key, $cmp) {
		return $this->getData($key) >= $cmp;
	}
}


class user {
	use asdfTrait;

	public $flower;

	private function saveToDB($sets, $values) {
		query("UPDATE user SET $sets WHERE $this->idType = ?", $values);
	}

	/**
	 * Update user data, either from database or from cache if it exists.
	 */
	function updateUserInfo() {
		if (isset(self::$cache[$this->identifier]['user']) && self::$doCache) {
			$this->data = self::$cache[$this->identifier]['user'];
			$this->dataDelta = self::$cache[$this->identifier]['delta'];
		} else {
			$this->data = fetch("SELECT * FROM user WHERE $this->idType = ? LIMIT 1", [$this->identifier]);
			self::$cache[$this->identifier]['user'] = $this->data;
		}
	}

	/**
	 * Create a flower object.
	 *
	 * @param string $flower The type of flower to create.
	 */
	function updateUserFlower($flower) {
		$this->flower[$flower] = new userFlower($this->readonly, $flower, $this->identifier, $this->idType);
	}

	/**
	 * Toggle the bit for a given flower.
	 */
	function toggleHasFlower($flower) {
		global $flowers_id;

		$this->getData('hasflower', $this->getData('hasflower') ^ (2 ** $flowers_id[$flower]));
	}

	/**
	 * Get whether user has a given flower.
	 */
	function hasFlower($flower) {
		global $flowers_id;

		return $this->getData('hasflower') & (2 ** $flowers_id[$flower]);
	}
}

class userFlower {
	use asdfTrait {
		__construct as traitConstruct;
	}

	private $flower;

	/**
	 * Construct method.
	 *
	 * @param bool $readonly
	 * @param string $identifier User identifier
	 * @param string $idType
	 */
	function __construct($readonly, $flower, $identifier, $idType = IDENTIFIER_UID) {
		$this->traitConstruct($readonly, $identifier, $idType);
		$this->flower = $flower;
		$this->updateFlowerInfo();
	}

	/**
	 * Put the current data delta into cache.
	 */
	private function cacheDelta() {
		self::$cache[$this->identifier][$this->flower.'_delta'] = $this->dataDelta;
	}

	private function saveToDB($sets, $values) {
		$values[] = $this->flower;
		query("UPDATE user_flower SET $sets WHERE $this->idType = ? AND flower = ?", $values);
	}

	/**
	 * Update flower data, either from database or from cache if it exists.
	 */
	function updateFlowerInfo() {
		if (isset(self::$cache[$this->identifier][$this->flower]) && self::$doCache) {
			$this->data = self::$cache[$this->identifier][$this->flower];
			$this->dataDelta = self::$cache[$this->identifier][$this->flower.'_delta'];
		} else {
			$this->data = fetch("SELECT * FROM user_flower WHERE flower = ? AND $this->idType = ? LIMIT 1", [$this->flower, $this->identifier]);
			self::$cache[$this->identifier][$this->flower] = $this->data;
		}
	}

	/**
	 * Get full growth rate for the currently logged in user.
	 *
	 * @param bool $formatted Should the growth rate be formatted?
	 * @return mixed Basic growth rate.
	 */
	function getflowergrowthrate($formatted = true) {
		$multiplier = 1;
		if ($this->getData('water') >= 0 && $this->getData('sun') >= 0) {
			if ($this->getData('fertilizer') > 0) {
				$multiplier = $multiplier * 3;
			}
			if ($this->getData('superfertilizer') > 0) {
				$multiplier = $multiplier + 1 * 5;
			}
			if ($this->getData('giga') > 0) {
				$multiplier = $multiplier * 4;
			}
			if ($this->getData('water') > 2) {
				$multiplier = $multiplier * 2;
			}
		} else {
			if ($this->getData('sun') <= 0) {
				return 0;
			} else {
				if ($this->getData('nevershrink') == 1) {
					return 0;
				} else {
					return -1.36;
				}
			}
		}

		if ($formatted)
			return resourceformat($this->getData('basicgrowthrate') * 0.36 * $multiplier);
		else
			return $this->getData('basicgrowthrate') * 0.36 * $multiplier;
	}
}
