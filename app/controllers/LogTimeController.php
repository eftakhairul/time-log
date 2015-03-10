<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH . "controllers/BaseController.php";
class LogTimeController extends BaseController {

	/**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function index()
	{

		$this->layout->view('welcome_message');
	}


	/**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function filter()
	{

		$this->layout->view('welcome_message');
	}
}