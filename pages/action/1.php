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
		$cost = $cuser->getData('seedincome') * ($quantity * 5);
		// Check whether you have enough stars.
		if ($cost <= $cuser->getData('stars')) {
			$cuser->abveData('stars', 0-$cost);
			$cuser->abveData('seedincome', $quantity / 10);
			header_msg("Bought ".number_format($quantity / 10,1)."$/hr for $cost stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'upgradebgr':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * 720 <= $cuser->getData('stars')) {
			$cuser->abveData('stars', 0-($quantity * 720));
			$cuser->flower[$gid]->abveData('basicgrowthrate', $quantity);
			header_msg("Bought " . ($quantity * 0.36) . "cm/hr for " . ($quantity * 720) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'buywater':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough seeds.
		if ($quantity * 20 <= $cuser->getData('seeds')) {
			$cuser->abveData('seeds', 0-($quantity * 20));
			$cuser->flower[$gid]->abveData('water', $quantity);
			header_msg("Bought $quantity hours of water for " . ($quantity * 20) . " seeds!");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'buysun':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * 2 <= $cuser->getData('stars')) {
			$cuser->abveData('stars', 0-($quantity * 2));
			$cuser->flower[$gid]->abveData('sun', $quantity);
			header_msg("Bought $quantity hours of sun for " . ($quantity * 2) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'buyautowater':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough seeds.
		if ($quantity * $autowater_cost <= $cuser->getData('seeds')) {
			$cuser->abveData('seeds', 0-($quantity * $autowater_cost));
			$cuser->flower[$gid]->abveData('autowater', $quantity);
			header_msg("Bought Auto Water (x" . $quantity . ") for " . ($quantity * $autowater_cost) . " seeds!");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'buyfertilizer':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough seeds.
		if ($quantity * $fertilizer_cost <= $cuser->getData('seeds')) {
			$cuser->abveData('seeds', 0-($quantity * $fertilizer_cost));
			$cuser->flower[$gid]->abveData('fertilizer', $quantity);
			header_msg("Bought Fertilizer (x" . $quantity . ") for " . ($quantity * $fertilizer_cost) . " seeds!");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'buysuperfertilizer':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * $superfertilizer_cost <= $cuser->getData('stars')) {
			$cuser->abveData('stars', 0-($quantity * $superfertilizer_cost));
			$cuser->flower[$gid]->abveData('superfertilizer', $quantity);
			header_msg("Bought Super Fertilizer (x" . $quantity . ") for " . ($quantity * $superfertilizer_cost) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'buywarp':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough seeds.
		if ($quantity * 50 <= $cuser->getData('seeds')) {
			$cuser->abveData('seeds', 0-($quantity * 50));
			$cuser->flower[$gid]->abveData('warp', $quantity);
			header_msg("Bought $quantity hours of warp for " . ($quantity * 50) . " seeds!");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'buygiga':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * 4 <= $cuser->getData('stars')) {
			$cuser->abveData('stars', 0-($quantity * 4));
			$cuser->flower[$gid]->abveData('giga', $quantity);
			header_msg("Bought $quantity hours of giga for " . ($quantity * 4) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'bulk':
		// We need a quantity parameter!
		if ($noquantity) break;
		// Check whether you have enough stars.
		if ($quantity * getbulkprice() <= $cuser->getData('stars')) {
			$cuser->abveData('stars', 0-($quantity * getbulkprice()));
			foreach ($flowers as $flower) {
				$flower = strtolower($flower);
				if ($cuser->getData('has_'.$flower)) {
					$cuser->updateUserFlower($flower);
					$resources = ['water', 'sun', 'warp', 'giga'];
					foreach ($resources as $resource)
						$cuser->flower[$flower]->abveData($resource, $quantity);
				}
			}
			header_msg("Bought $quantity hours of bulk items for " . ($quantity * getbulkprice()) . " stars!");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	case 'nevershrink':
		// Check if you haven't already bought it!
		if ($cuser->flower[$gid]->getData('nevershrink') == 0) {
			// Check whether you have enough stars.
			if (4000 <= $cuser->getData('stars')) {
				$cuser->abveData('stars', 0-4000);
				$cuser->flower[$gid]->setData('nevershrink', 1);
				header_msg("Your flower won't shrink anymore! ^.^");
			} else {
				header_msg("You don't have enough stars!", "ff7777");
			}
		}
	break;
}