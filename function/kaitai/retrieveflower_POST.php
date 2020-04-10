<?php
// This is a generated file! Please edit source .ksy file and use kaitai-struct-compiler to rebuild

class RetrieveflowerPost extends \Kaitai\Struct\Struct {
	public function __construct(\Kaitai\Struct\Stream $_io, \Kaitai\Struct\Struct $_parent = null, \RetrieveflowerPost $_root = null) {
		parent::__construct($_io, $_parent, $_root);
		$this->_read();
	}

	private function _read() {
		$this->_m_actionSize = $this->_io->readS2be();
		$this->_m_action = \Kaitai\Struct\Stream::bytesToStr($this->_io->readBytes($this->actionSize()), "UTF-8");
		$this->_m_uidSize = $this->_io->readS2be();
		$this->_m_uid = \Kaitai\Struct\Stream::bytesToStr($this->_io->readBytes($this->uidSize()), "UTF-8");
		$this->_m_flowerSize = $this->_io->readS2be();
		$this->_m_flower = \Kaitai\Struct\Stream::bytesToStr($this->_io->readBytes($this->flowerSize()), "UTF-8");
		$this->_m_usernameSize = $this->_io->readS2be();
		$this->_m_username = \Kaitai\Struct\Stream::bytesToStr($this->_io->readBytes($this->usernameSize()), "UTF-8");
		$this->_m_passSize = $this->_io->readS2be();
		$this->_m_pass = \Kaitai\Struct\Stream::bytesToStr($this->_io->readBytes($this->passSize()), "UTF-8");
		$this->_m_unused1 = $this->_io->readS4be();
		$this->_m_maxScores = $this->_io->readS4be();
		$this->_m_differenceBetweenScores = $this->_io->readS4be();
		$this->_m_priceList = $this->_io->readBitsInt(1) != 0;
		$this->_io->alignToByte();
		$this->_m_countrySize = $this->_io->readS2be();
		$this->_m_country = \Kaitai\Struct\Stream::bytesToStr($this->_io->readBytes($this->countrySize()), "UTF-8");
		$this->_m_surveyCompleted = $this->_io->readBitsInt(1) != 0;
	}
	protected $_m_actionSize;
	protected $_m_action;
	protected $_m_uidSize;
	protected $_m_uid;
	protected $_m_flowerSize;
	protected $_m_flower;
	protected $_m_usernameSize;
	protected $_m_username;
	protected $_m_passSize;
	protected $_m_pass;
	protected $_m_unused1;
	protected $_m_maxScores;
	protected $_m_differenceBetweenScores;
	protected $_m_priceList;
	protected $_m_countrySize;
	protected $_m_country;
	protected $_m_surveyCompleted;
	public function actionSize() { return $this->_m_actionSize; }
	public function action() { return $this->_m_action; }
	public function uidSize() { return $this->_m_uidSize; }
	public function uid() { return $this->_m_uid; }
	public function flowerSize() { return $this->_m_flowerSize; }
	public function flower() { return $this->_m_flower; }
	public function usernameSize() { return $this->_m_usernameSize; }
	public function username() { return $this->_m_username; }
	public function passSize() { return $this->_m_passSize; }

	/**
	 * Unused password thing
	 */
	public function pass() { return $this->_m_pass; }

	/**
	 * Unused integer. Value is always 0x3.
	 */
	public function unused1() { return $this->_m_unused1; }
	public function maxScores() { return $this->_m_maxScores; }
	public function differenceBetweenScores() { return $this->_m_differenceBetweenScores; }
	public function priceList() { return $this->_m_priceList; }
	public function countrySize() { return $this->_m_countrySize; }
	public function country() { return $this->_m_country; }
	public function surveyCompleted() { return $this->_m_surveyCompleted; }
}