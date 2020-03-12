<?php
/**
 * Custom_Cron_Schedule Class File
 *
 * This file contains custom recurrence schedules for cron jobs in WordPress.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 * @since      1.0.2
 */

namespace Plugin_Name_Name_Space\Includes\Hooks\Filters;

use Plugin_Name_Name_Space\Includes\Interfaces\Filter_Hook_Interface;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class Custom_Cron_Schedule.
 * This file contains custom recurrence schedules for cron jobs in WordPress.
 *
 * @package    Plugin_Name_Name_Space
 * @author     Mehdi Soltani <soltani.n.mehdi@gmail.com>
 * @link       https://github.com/msn60/oop-wordpress-plugin-boilerplate
 *
 * @see        https://developer.wordpress.org/reference/functions/wp_get_schedules/
 */
class Custom_Cron_Schedule implements Filter_Hook_Interface {

	/**
	 * Array of custom event recurrence schedules
	 *
	 * @var array $custom_cron_schedules Array of custom event recurrence schedules
	 */
	private $custom_cron_schedules;


	/**
	 * Custom_Cron_Schedule constructor.
	 *
	 * @param array $initial_values
	 */
	public function __construct( array $initial_values ) {
		$this->custom_cron_schedules = $initial_values;
	}

	/**
	 * Callable function for 'cron_schedule' filter to dd custom cron schedule.
	 *
	 * @access  public
	 * @return array
	 */
	public function add_custom_cron_schedule($schedules) {
		$schedules['weekly'] = $this->custom_cron_schedules['weekly'];
		$schedules['twiceweekly'] = $this->custom_cron_schedules['twiceweekly'];
		return $schedules;
	}

	/**
	 * Register filters that the object needs to be subscribed to.
	 *
	 */
	public function register_add_filter() {
		add_filter( 'cron_schedules', [ $this, 'add_custom_cron_schedule' ] );
	}
}
