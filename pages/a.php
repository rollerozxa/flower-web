<?php

if (!isset($_GET['quantity'])) {
	$noquantity = true;
} else {
	$noquantity = false;
	$quantity = $_GET['quantity'];
}

$buyvalue	= 50;
$sellvalue	= 50;

// It's checked before including the file, no need to check again.
switch ($_REQUEST['a']) {
	///
	/// 1  - Items page
	///
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
	
	///
	/// 2 - Chatterbox
	///
	case 'chat':
		if (isset($_POST['text'])) {
			$_POST['text'] = htmlspecialchars(mysqli_real_escape_string($mysqli, $_POST['text']));
			SqlQuery("INSERT INTO `chat` (`userID`, `message`, `gid`, `time`) VALUES ('{$userdata['userID']}', '{$_POST['text']}', '$gid', ".time().");");
		}
	break;
	case 'chatdelet':
		if ($userdata['powerlevel'] > 1) {
			if (is_numeric($quantity)) {
				if (SqlQueryResult("SELECT COUNT(*) FROM `chat` WHERE `ID` = '$quantity'") == 1) {
					SqlQuery("DELETE FROM `chat` WHERE `ID` = '$quantity';");
					header_msg("Message deleted!");
				} else {
					header_msg("Message doesn't exist.", "ff7777");
				}
			} else {
				header_msg("Oops! What were you trying to do? ;)", "ff7777");
			}
		} else {
			header_msg("I don't know how you got here, but you shouldn't be here!", "ff7777");
		}
	break;
	case 'chatnuke':
		if ($userdata['powerlevel'] == 4) {
			if (isset($_POST['shouldnuke'])) {
				SqlQuery("TRUNCATE TABLE `chat`;");
				header_msg("*Explosion sound*");
			} else {
				header_msg("Checkbox not clicked. Disaster averted.", "ff7777");
			}
		} else {
			header_msg("I don't know how you got here, but you shouldn't be here!", "ff7777");
		}
	break;
	// It's actually from page ID -1 (Edit message), but it redirects you to page ID 2 (Chat). Eh.
	case 'editmessage':
		if ($userdata['powerlevel'] > 1) {
			if (isset($_POST['edited_message']) && isset($_POST['message_id']) && is_numeric($_POST['message_id'])) {
				$edited_message = SqlEscape($_POST['edited_message']);
				$message_id = $_POST['message_id'];
				SqlQuery("UPDATE `chat` SET `message` = '$edited_message' WHERE `ID` = $message_id;");
			}
		}
	break;
	
	///
	/// 3 - Friends
	///
	case 'addfriend':
		if (isset($_POST['friendcode']) && is_numeric($_POST['friendcode'])) {
			if (($_POST['friendcode'] >= 100000000) && ($_POST['friendcode'] <= 999999999)) {
				if ($_POST['friendcode'] != $userdata['friendcode']) {
					if (SqlQueryResult("SELECT COUNT(*) FROM `user` WHERE `friendcode` = '{$_POST['friendcode']}'") == 1) {
						$friendeddata = SqlQueryFetchRow("SELECT * FROM user WHERE friendcode = {$_POST['friendcode']}");
						if (SqlQueryResult("SELECT COUNT(*) FROM `friend_connections` WHERE (`friender_userid` = {$userdata['userID']} OR `friended_userid` = {$userdata['userID']}) AND `friended_userid` = {$friendeddata['userID']} ") == 0) {
							SqlQuery("INSERT INTO `friend_connections` (`friender_userid`, `friended_userid`) VALUES ('{$userdata['userID']}', '{$friendeddata['userID']}')");
							header_msg("You've added {$friendeddata['username']} as your friend!");
						} else {
							header_msg("You're already friends with {$friendeddata['username']}!", "ff7777");
						}
					} else {
						header_msg("A user with the friend code doesn't exist.", "ff7777");
					}
				} else {
					header_msg("You can't friend yourself.", "ff7777");
				}
			} else {
				header_msg("Friend code value is out of reach.", "ff7777");
			}
		} else {
			header_msg("Friend codes can only contain numbers!", "ff7777");
		}
	break;
	case 'removefriend':
		if (is_numeric($quantity)) {
			if (SqlQueryResult("SELECT COUNT(*) FROM `friend_connections` WHERE `connection_id` = $quantity AND (`friender_userid` = {$userdata['userID']} OR `friended_userid` = {$userdata['userID']})") == 1) {
				SqlQuery("DELETE FROM `friend_connections` WHERE `connection_id` = '$quantity'");
				header_msg("You've removed a friend.");
			} else {
				header_msg("...Huh?", "ff7777");
			}
		} else {
			header_msg("...Huh?", "ff7777");
		}
	break;
	
	///
	/// 4  - Star Exchange
	///
	case 'buystars':
		if ($quantity < ($userdata['seeds'] / $buyvalue)) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] - ($quantity * $buyvalue)) . "' WHERE `user`.`uid` = '" . $userdata['uid'] . "';");
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] + $quantity) . "' WHERE `user`.`uid` = '" . $userdata['uid'] . "';");
			header_msg("Bought $quantity stars at a rate of $buyvalue Seeds / Star");
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	case 'sellstars':
		if ($quantity < $userdata['stars']) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] + ($quantity * $sellvalue)) . "' WHERE `user`.`uid` = '" . $userdata['uid'] . "';");
			SqlQuery("UPDATE `user` SET `stars` = '" . ($userdata['stars'] - $quantity) . "' WHERE `user`.`uid` = '" . $userdata['uid'] . "';");
			header_msg("Sold $quantity stars at a rate of $sellvalue Seeds / Star");
		} else {
			header_msg("You don't have enough stars!", "ff7777");
		}
	break;
	
	///
	/// 10 - Global Compost
	///
	case 'heap':
		if ($quantity < $userdata['seeds']) {
			SqlQuery("UPDATE `user` SET `seeds` = '" . ($userdata['seeds'] - $quantity) . "' WHERE `user`.`uid` = " . $userdata['uid'] . ";");
			SqlQuery("UPDATE `globalcompost` SET `compostsize` = `compostsize` + '$quantity' ORDER BY compostID DESC LIMIT 1");
			$compost = SqlQueryFetchRow("SELECT * FROM globalcompost ORDER BY compostID DESC LIMIT 1;");
			if ($compost['compostsize'] >= $compost['compostmaxsize']) {
				SqlQuery("INSERT INTO `globalcompost` (`compostmaxsize`, `compostprize`) VALUES ('" . heapsize(rand(1,6)) . "', '" . rand(1,9) . "');");
				header_msg("You threw " . $quantity . " seeds onto the heap and filled up the heap!");
			} else {
				header_msg("Threw " . $quantity . " seeds onto the heap!");
			}
		} else {
			header_msg("You don't have enough seeds!", "ff7777");
		}
	break;
	
	///
	/// 11 - Change name
	///
	case 'changename':
		if (strlen($_POST['name']) <= 35) {
			$_POST['name'] = mysqli_real_escape_string($mysqli, $_POST['name']);
			SqlQuery("UPDATE `user` SET `username` = '{$_POST['name']}' WHERE `user`.`uid` = '$uid'");
		} else {
			header_msg("Nickname is too long", "ff7777");
		}
	break;
	case 'changeflag':
		if (file_exists('flags/' . $quantity . '.png')) {
			SqlQuery("UPDATE `user` SET `country` = '" . $quantity . "' WHERE `user`.`uid` = " . $userdata['uid'] . ";");
		} else {
			header_msg("Invalid flag. Wait, how?", "ff7777");
		}
	break;

	///
	/// 13 - Settings
	///
	case 'yelbak':
		if ($_POST['yelbak'] == 1 || $_POST['yelbak'] == 0) {
			SqlQuery("UPDATE `user` SET `yellow_background` = {$_POST['yelbak']} WHERE `uid` = '$uid'");
		} else {
			header_msg("Invalid value for option 'Yellowish Background'.", "ff7777");
		}
	break;
	case 'menustyle':
		if ($_POST['menustyle'] == 1 || $_POST['menustyle'] == 0) {
			SqlQuery("UPDATE `user` SET `menustyle` = {$_POST['menustyle']} WHERE `uid` = '$uid'");
		} else {
			header_msg("Invalid value for option 'Menu bar style'.", "ff7777");
		}
	break;
	case 'zoom':
		if ($_POST['zoom'] == 1 || $_POST['zoom'] == 0) {
			SqlQuery("UPDATE `user` SET `zoom` = {$_POST['zoom']} WHERE `uid` = '$uid'");
		} else {
			header_msg("Invalid value for option 'Zoom'.", "ff7777");
		}
	break;
}

update_userdata();

?>
