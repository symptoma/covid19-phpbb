<?php
/**
 *
 * Symptoma Covid19 Chatbot. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, Helmuth Lammer, https://symptoma.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace symptoma\covid19\controller;

/**
 * Symptoma Covid19 Chatbot main controller.
 */
class main
{
	/* @var \phpbb\config\config */
	protected $config;

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/* @var \phpbb\user */
	protected $user;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config		$config
	 * @param \phpbb\controller\helper	$helper
	 * @param \phpbb\template\template	$template
	 * @param \phpbb\user				$user
	 */
	public function __construct(\phpbb\config\config $config, \phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user)
	{
		$this->config = $config;
		$this->helper = $helper;
		$this->template = $template;
		$this->user = $user;

        $this->predefineConfig();
	}

	private function predefineConfig()
    {

        if (!isset($this->config['symptoma_covid19_introttext'])) {
            $this->config['symptoma_covid19_introttext'] = "Hallo, hier schreibt Symptoma, Partner vom Magazin Seltene Krankheiten.";
        }
        if (!isset($this->config['symptoma_covid19_elevation'])) {
            $this->config['symptoma_covid19_elevation'] = 1000;
        }
        if (!isset($this->config['symptoma_covid19_height'])) {
            $this->config['symptoma_covid19_height'] = 600;
        }
        if (!isset($this->config['symptoma_covid19_width'])) {
            $this->config['symptoma_covid19_width'] = 450;
        }
    }
}
