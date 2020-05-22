<?php

///
/// 5 - Seeds Draw
///

switch ($_REQUEST['a']) {
	case 'buyseedtickets':
		if ($quantity * 15 <= $cuser->getData('seeds')) {
			$seedsdraw_rewards = [
				['odds' => 1000, 'id' => 'water', 'desc' => '+6 hours of water!'],
				['odds' => 2000, 'id' => 'sun', 'desc' => '+6 hours of sun!'],
				['odds' => 6000, 'id' => 'warp', 'desc' => '+6 hours of warp!'],
				['odds' => 50000, 'id' => 'giga', 'desc' => '+6 hours of giga!'],
				['odds' => 120000, 'id' => 'jump', 'desc' => '+6 hours of time jump!'],
				['odds' => 100000000, 'id' => 'mseed', 'desc' => 'Magic seed!']
			];

			$rewards = [];
			$rewardlist = '<ul class="nobreak">';

			foreach ($seedsdraw_rewards as $reward) {
				$rewards[$reward['id']] = floor($quantity / $reward['odds']);
				if ($quantity >= $reward['odds']) {
					$rewardlist .= '<li>'.$reward['desc'].' (x'.floor($quantity / $reward['odds']).')</li>';
				}
			}

			$rewardlist .= '</ul>';

			// TODO: Implement putting the magic seeds somewhere.
			$resources = ['water', 'sun', 'warp', 'giga', 'jump'];
			foreach ($resources as $resource)
				$cuser->flower[$gid]->abveData($resource, $rewards[$resource]);

			header_msg("Bought $quantity seeds draw tickets for " . ($quantity * 15) . " seeds, giving you the following rewards:<br>" . $rewardlist);

		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
}