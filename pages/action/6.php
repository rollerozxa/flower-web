<?php

///
/// 6 - Stars Draw
///


switch ($_REQUEST['a']) {
	case 'buystartickets':
		if ($cuser->enough('stars', $quantity * 2)) {
			$starsdraw_rewards = [
				['odds' => 1000, 'id' => 'friendslot', 'desc' => '+1 friend slot!'],
				['odds' => 5000, 'id' => 'income', 'desc' => '+1 seed/hr income!'],
				['odds' => 9000, 'id' => 'bgr', 'desc' => '+36.00cm/hr basic growth rate!'],
				['odds' => 20000, 'id' => 'pgm', 'desc' => '+1 PGM'],
				['odds' => 200000, 'id' => 'seeds', 'desc' => '1000 seeds!'],
				['odds' => 100000000, 'id' => 'mseed', 'desc' => 'Magic seed!']
			];

			$draw = new DrawMaster($starsdraw_rewards, $quantity);
			$rewards = $draw->getRewards();

			// TODO: Actually give the rewards.

			header_msg("Bought $quantity stars draw tickets for " . ($quantity * 2) . " stars, giving you the following rewards:<br>" . $draw->getRewardList());
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
}