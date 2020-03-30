<?php
/**
 *
 * Symptoma Covid19 Chatbot. An extension for the phpBB Forum Software package.
 *
 * @copyright (c) 2020, Helmuth Lammer, https://symptoma.com
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 */

namespace symptoma\covid19\event;

/**
 * @ignore
 */
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

/**
 * Symptoma Covid19 Chatbot Event listener.
 */
class main_listener implements EventSubscriberInterface
{
	static public function getSubscribedEvents()
	{
		return array(
			'core.display_forums_modify_template_vars'	=> 'display_forums_modify_template_vars',
			'core.user_setup'				=> 'load_language_on_setup',
			'core.page_header'				=> 'add_page_header_link',
            'core.acp_board_config_edit_add'        => 'add_options'
		);
	}

	/* @var \phpbb\controller\helper */
	protected $helper;

	/* @var \phpbb\template\template */
	protected $template;

	/* @var \phpbb\user */
	protected $user;

	/** @var string phpEx */
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\controller\helper	$helper		Controller helper object
	 * @param \phpbb\template\template	$template	Template object
	 * @param \phpbb\user               $user       User object
	 * @param string                    $php_ext    phpEx
	 */
	public function __construct(\phpbb\controller\helper $helper, \phpbb\template\template $template, \phpbb\user $user, $php_ext)
	{
		$this->helper   = $helper;
		$this->template = $template;
		$this->user     = $user;
		$this->php_ext  = $php_ext;
	}

	/**
	 * Load common language files during user setup
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function load_language_on_setup($event)
	{
		$lang_set_ext = $event['lang_set_ext'];
		$lang_set_ext[] = array(
			'ext_name' => 'symptoma/covid19',
			'lang_set' => 'common',
		);
		$event['lang_set_ext'] = $lang_set_ext;
	}

	/**
	 * Add a link to the controller in the forum navbar
	 */
	public function add_page_header_link()
	{

	    global $config;

		$this->template->assign_vars(array(

            'SC_INTROTEXT_OPTION'   => $config['symptoma_covid19_introttext'],
            'SC_ELEVATION_OPTION' => $config['symptoma_covid19_elevation'],
            'SC_HEIGHT_OPTION' => $config['symptoma_covid19_height'],
            'SC_WIDTH_OPTION' => $config['symptoma_covid19_width']
		));
	}


	/**
	 * A sample PHP event
	 * Modifies the names of the forums on index
	 *
	 * @param \phpbb\event\data	$event	Event object
	 */
	public function display_forums_modify_template_vars($event)
	{
		$forum_row = $event['forum_row'];
		$forum_row['FORUM_NAME'] .= ' :: Acme Event ::';
		$event['forum_row'] = $forum_row;
	}

	public function add_options($event){
        if ($event['mode'] == 'settings')
        {
            // Store display_vars event in a local variable
            $display_vars = $event['display_vars'];

            $max_legend_index = $this->get_max_legend_index($display_vars);

            // Define new config vars in legend box
            $sc_option_variables = array(
                'legend'.$max_legend_index => 'SC_OPTION_LEGEND',
                'symptoma_covid19_introttext' => array('lang' => 'SC_OPTION_INTROTEXT', 'validate' => 'text:40:255', 'type' => 'text:40:255', 'explain' => true),
                'symptoma_covid19_elevation' => array('lang' => 'SC_OPTION_ELEVATION', 'validate' => 'int:0:9999', 'type' => 'number:0:9999', 'explain' => true),
                'symptoma_covid19_height' => array('lang' => 'SC_OPTION_HEIGHT', 'validate' => 'int:0:9999', 'type' => 'number:0:9999', 'explain' => true, 'append'=> ' px'),
                'symptoma_covid19_width'  => array('lang' => 'SC_OPTION_WIDTH', 'validate' => 'int:0:9999', 'type' => 'number:0:9999', 'explain' => true, 'append'=> ' px')
            );

            $display_vars['vars'] = phpbb_insert_config_array($display_vars['vars'], $sc_option_variables, array('before' =>'legend2'));
            // Update the display_vars  event with the new array
            $event['display_vars'] = array('title' => $display_vars['title'], 'vars' => $display_vars['vars']);
        }
    }

    private function get_max_legend_index(array $displayVars){
	    $legendIndex  = 0;

        foreach($displayVars['vars'] as $key => $value)
        {
            if(substr($key,0,6) == "legend")
            {
                $legendIndex++;
            }
        }

        return $legendIndex+1;
    }

}
