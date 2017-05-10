<?php

/**
* Initiates custom set up for Disney Debit Theme
*/
class DisneyDebitSetUp
{
	/**
	 * @var $rich_edit_flag
	 */
	static $rich_edit_flag = '__return_false';

	/**
	 * DisneyDebitSetUp constructor.
	 *
	 * @return void
	 */
	static function get_instance() {
		static $instance = array();

		if (!$instance) {
			$instance[0] = new DisneyDebitSetUp;
		}
		return $instance[0];
	}

	/**
	 * DisneyDebitSetUp constructor.
	 *
	 * @access private
	 */
	private function __construct()
	{
		// Remove rich editor
		add_filter( 'user_can_richedit' , self::$rich_edit_flag, 50 );

		add_action( 'wp_before_admin_bar_render', array( $this, 'disney_debit_remove_customizer') );
	}

	/**
	* Customizer gives too much frontend freedom to different users
	*
	* @return void
	*/
	function disney_debit_remove_customizer()
	{
	    global $wp_admin_bar;

	    $wp_admin_bar->remove_menu('customize');
	}
}

add_action('init', function(){
	DisneyDebitSetUp::get_instance();
});