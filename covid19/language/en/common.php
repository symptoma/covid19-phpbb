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

    'SC_OPTION_LEGEND'          => 'COVID-19 Display Options',
    'SC_OPTION_INTROTEXT'       => 'Introductiontext for Chatbot',
    'SC_OPTION_ELEVATION'       => 'Elevation',
    'SC_OPTION_HEIGHT'          => 'Height',
    'SC_OPTION_WIDTH'           => 'Width',
    'SC_OPTION_INTROTEXT_EXPLAIN'       => 'customized welcome message when the conversation starts',
    'SC_OPTION_ELEVATION_EXPLAIN'       => 'z-index, adjust if chatbot is not visible or covers content',
    'SC_OPTION_HEIGHT_EXPLAIN'          => 'Window height',
    'SC_OPTION_WIDTH_EXPLAIN'           => 'Window width'
));
