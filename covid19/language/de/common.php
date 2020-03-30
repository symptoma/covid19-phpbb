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

    'SC_OPTION_LEGEND'          => 'COVID-19 Anzeige Optionen',
    'SC_OPTION_INTROTEXT'       => 'Chatbot Begrüßung',
    'SC_OPTION_ELEVATION'       => 'Richtebene',
    'SC_OPTION_HEIGHT'          => 'Höhe',
    'SC_OPTION_WIDTH'           => 'Breite',
    'SC_OPTION_INTROTEXT_EXPLAIN'       => 'Individuelle Begrüßungsnachricht, wenn der Chat startet',
    'SC_OPTION_ELEVATION_EXPLAIN'       => 'z-index, anpassen, wenn der Chatbot ganz oder teilweise verdeckt ist',
    'SC_OPTION_HEIGHT_EXPLAIN'          => 'Fentsterhöhe',
    'SC_OPTION_WIDTH_EXPLAIN'           => 'Fensterbreite'
));
