<?php

class DrawMaster {
	/**
	 * Human-readable HTML list for the rewards.
	 *
	 * @var string
	 */
	private $rewardList;

	/**
	 * Array of given rewards.
	 */
	private $rewards;

	/**
	 * Construct method.
	 *
	 * @param array $possibleRewards Array of possible rewards to be given, along with odds, ID and human-readable name.
	 * @param int $quantity
	 */
	function __construct($possibleRewards, $quantity) {
		$this->rewards = [];
		$this->rewardList = '<ul class="nobreak">';

		foreach ($possibleRewards as $posReward) {
			$this->rewards[$posReward['id']] = floor($quantity / $posReward['odds']);
			if ($quantity >= $posReward['odds']) {
				$this->rewardList .= '<li>'.$posReward['desc'].' (x'.floor($quantity / $posReward['odds']).')</li>';
			}
		}

		if ($this->rewardList == '<ul class="nobreak">') {
			$this->rewardList .= '<li>Nothing :(</li>';
		}

		$this->rewardList .= '</ul>';
	}

	/**
	 * Get a human-readable HTML list for the given rewards.
	 */
	function getRewardList() {
		return $this->rewardList;
	}

	/**
	 * Get a array of given rewards.
	 */
	function getRewards() {
		return $this->rewards;
	}
}
