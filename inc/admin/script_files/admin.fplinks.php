<?php
/****************************************************************************/
/*  						< MangosWeb v4 >  								*/
/*              Copyright (C) <2017> <Mistvale.com>   		                */
/*					  < http://www.mistvale.com >							*/
/*																			*/
/*			Original MangosWeb Enhanced (C) 2010-2011 KeysWow				*/
/*			Original MangosWeb (C) 2007, Sasha, Nafe, TGM, Peec				*/
/****************************************************************************/

//========================//
if(INCLUDED!==true) {
	echo "Not Included!"; exit;
}
//=======================//

$mainnav_links = array(
	'1-News', 
	'2-Account', 
	'3-GameGuide', 
	'4-Workshop', 
	'5-Media', 
	'6-Forums', 
	'7-Community',
	'8-Support'
	);

function updateOrder()
{
	global $DB, $Core, $lang;
	foreach($_POST as $key => $value)
	{
		$DB->query("UPDATE `mw_menu_items` SET `order`='$value' WHERE `id`='$key'");
	}

	output_message('success', $lang['link_order_updated']);
}

function editLink()
{
	global $DB, $Core, $lang;
	$DB->query("UPDATE `mw_menu_items` SET
		`menu_id`='".$_POST['menu_id']."',
		`link_title`='".$_POST['link_title']."',
		`link`='".$_POST['link']."',
		`guest_only`='".$_POST['guest_only']."',
		`account_level`='".$_POST['account_level']."'
	  WHERE `id`='".$_GET['linkid']."'
	");

	output_message('success', $lang['link_update_success']);
}

function deleteLink()
{
	global $DB;
	$DB->query("DELETE FROM `mw_menu_items` WHERE `id`='".$_GET['linkid']."'");

	output_message('success', 'Deleted Menu Item');
}

function addLink()
{
	global $DB, $lang;
	$DB->query("INSERT INTO mw_menu_items(
		`menu_id`,
		`link_title`,
		`link`,
		`guest_only`,
		`account_level`)
	  VALUES(
		'".$_POST['menu_id']."', 
		'".$_POST['link_title']."', 
		'".$_POST['link']."', 
		'".$_POST['guest_only']."', 
		'".$_POST['account_level']."')
	");

	output_message('success', $lang['link_add_success']);
}
?>