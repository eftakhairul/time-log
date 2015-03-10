<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH . "controllers/BaseController.php";
class LogtimeController extends BaseController {

	public function __construct()
    {
		parent::__construct();
        $this->load->model('logtimes');
		$this->load->library('pagination');
    }

	/**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function index()
	{

		$this->layout->view('logtime/index');
	}


	/**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function createLogtime()
	{

		$this->layout->view('logtime/index');
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