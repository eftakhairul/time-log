<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH . "controllers/BaseController.php";
class LogTimeController extends BaseController {

	public function __construct()
    {
        $this->load->model("logtimes");
    }

	/**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function index()
	{

		$this->layout->view('log');
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


	public function processPegination()
	{
		$this->load->library('pagination');
        $options['page'] = empty ($options['page']) ? 0 : $options['page'];

        $this->data["logtimes"] = $this->logtimes->getAll($options);

        $paginationOptions = array(
            'baseUrl' 		=> $options['url'] . '/page/',
            'segmentValue' 	=> $this->uri->getSegmentIndex('page') + 1,
            'numRows' 		=> $this->logtimes->findCount()
        );

        $this->pagination->setOptions($paginationOptions);
	}
}