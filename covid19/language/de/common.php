<?php
/**
 *
 * Symptoma Covid19 Chatbot. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, Helmuth Lammer, https://symptoma.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

$lang = array_merge($lang, array(
    'SC_BANNER_TITLE' => 'COVID-19',
    'SC_BANNER_SUBTITLE' => 'INfo',
    'SC_BANNER_LINK_TEXT' => 'Test starten',
    'SC_BANNER_LINK_URL' =>'https://www.symptoma.com/covid-19'
));
