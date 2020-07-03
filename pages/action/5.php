<?php

///
/// 5 - Seeds Draw
///

switch ($_REQUEST['a']) {
	case 'buyseedtickets':
		if ($cuser->enough('seeds', $quantity * 15)) {
			$seedsdraw_rewards = [
				['odds' => 1000, 'id' => 'water', 'desc' => '+6 hours of water!'],
				['odds' => 2000, 'id' => 'sun', 'desc' => '+6 hours of sun!'],
				['odds' => 6000, 'id' => 'warp', 'desc' => '+6 hours of warp!'],
				['odds' => 50000, 'id' => 'giga', 'desc' => '+6 hours of giga!'],
				['odds' => 120000, 'id' => 'jump', 'desc' => '+6 hours of time jump!'],
				['odds' => 100000000, 'id' => 'mseed', 'desc' => 'Magic seed!']
			];

			$draw = new DrawMaster($seedsdraw_rewards, $quantity);
			$rewards = $draw->getRewards();

			// TODO: Implement putting the magic seeds somewhere.
			$resources = ['water', 'sun', 'warp', 'giga', 'jump'];
			foreach ($resources as $resource)
				$cuser->flower[$gid]->abveData($resource, $rewards[$resource]);

			header_msg("Bought $quantity seeds draw tickets for ".($quantity * 15)." seeds, giving you the following rewards:<br>".$draw->getRewardList());
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
}