<?php

///
/// 1  - Items page
///

switch ($_REQUEST['a']) {
	/* Due to galaxy bonus, it costs half as much (original: 100* per 1/hr) */
	case 'upgradeincome':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Seed income cost is more advanced, let's just calculate it once.
		$cost = $userdata['seedincome'] * ($quantity * 5);
		// Check whether you have enough stars.
		if ($cost <= $userdata['stars']) {
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - $cost) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user` SET `seedincome` = '" . ($userdata['seedincome'] + $quantity / 10) . "' WHERE `user`.`uid` = '$uid';");
			header_msg("Bought $quantity for $cost stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'upgradebgr':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * 720 <= $userdata['stars']) {
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - $quantity * 720) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user_$gid` SET `basicgrowthrate` = '" . ($userdata['basicgrowthrate'] + $quantity) . "' WHERE `user_$gid`.`uid` = '$uid';");
			header_msg("Bought " . ($quantity * 0.36) . "cm/hr for " . ($quantity * 720) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'buywater':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough seeds.
		if ($quantity * 20 <= $userdata['seeds']) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] - $quantity * 20) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user_$gid` SET `water` = '" . ($userdata['water'] + $quantity) . "' WHERE `user_$gid`.`uid` = '$uid';");
			header_msg("Bought $quantity hours of water for " . ($quantity * 20) . " seeds!");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'buysun':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * 2 <= $userdata['stars']) {
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - $quantity * 2) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user_$gid` SET `sun` = '" . ($userdata['sun'] + $quantity) . "' WHERE `user_$gid`.`uid` = '$uid';");
			header_msg("Bought $quantity hours of sun for " . ($quantity * 2) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'buyautowater':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough seeds.
		if ($quantity * $autowater_cost <= $userdata['seeds']) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] - $quantity * $autowater_cost) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user_$gid` SET `autowater` = '" . ($userdata['autowater'] + $quantity) . "' WHERE `user_$gid`.`uid` = '$uid';");
			header_msg("Bought Auto Water (x" . $quantity . ") for " . ($quantity * $autowater_cost) . " seeds!");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'buyfertilizer':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough seeds.
		if ($quantity * $fertilizer_cost <= $userdata['seeds']) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] - $quantity * $fertilizer_cost) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user_$gid` SET `fertilizer` = '" . ($userdata['fertilizer'] + $quantity) . "' WHERE `user_$gid`.`uid` = '$uid';");
			header_msg("Bought Fertilizer (x" . $quantity . ") for " . ($quantity * $fertilizer_cost) . " seeds!");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'buysuperfertilizer':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * $superfertilizer_cost <= $userdata['stars']) {
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - $quantity * $superfertilizer_cost) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user_$gid` SET `superfertilizer` = '" . ($userdata['superfertilizer'] + $quantity) . "' WHERE `user_$gid`.`uid` = '$uid';");
			header_msg("Bought Super Fertilizer (x" . $quantity . ") for " . ($quantity * $superfertilizer_cost) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'buywarp':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough seeds.
		if ($quantity * 50 <= $userdata['seeds']) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] - $quantity * 50) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user_$gid` SET `warp` = '" . ($userdata['warp'] + $quantity) . "' WHERE `user_$gid`.`uid` = '$uid';");
			header_msg("Bought $quantity hours of warp for " . ($quantity * 50) . " seeds!");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'buygiga':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * 4 <= $userdata['stars']) {
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - $quantity * 4) . "' WHERE `user`.`uid` = '$uid';");
			SqlQuery("UPDATE `user_$gid` SET `giga` = '" . ($userdata['giga'] + $quantity) . "' WHERE `user_$gid`.`uid` = '$uid';");
			header_msg("Bought $quantity hours of giga for " . ($quantity * 4) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'bulk':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * getbulkprice() <= $userdata['stars']) {
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - $quantity * getbulkprice()) . "' WHERE `uid` = '$uid';");
			foreach ($flowers as $flower) {
				$flower = strtolower($flower);
				if ($userdata['has_' . $flower]) {
					SqlQuery("UPDATE `user_$flower` SET `water` = water + '$quantity',
							`sun` = sun + '$quantity', `warp` = warp + '$quantity',
							`giga` = giga + '$quantity' WHERE `uid` = '$uid';");
				}
			}
			header_msg("Bought $quantity hours of bulk items for " . ($quantity * getbulkprice()) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'nevershrink':
		// Check if you haven't already bought it!
		if ($userdata['nevershrink'] == 0) {
			// Check whether you have enough stars.
			if (4000 <= $userdata['stars']) {
				SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - 4000) . "' WHERE `user`.`uid` = '$uid';");
				SqlQuery("UPDATE `user_$gid` SET `nevershrink` = '1' WHERE `user_$gid`.`uid` = '$uid';");
				header_msg("Your flower won't shrink anymore! ^.^");
			} else {
				header_msg("You don't have enough stars!", "ff7777");
			}
		}
	break;
}

?>