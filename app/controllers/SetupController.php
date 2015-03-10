<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH . "controllers/BaseController.php";
class SetupController extends BaseController {

	/**
	 * Run Migrations files
	 */
	public function index()
	{
		$this->load->library('migration');

			if ( ! $this->migration->latest()) {
				show_error($this->migration->error_string());
			}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */