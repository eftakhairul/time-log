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
        $this->layout->setLayout("layouts/ajax");
        $this->load->library('form_validation');
        $this->load->model("projects");
        $this->load->model("teams");
        $this->load->model("statuses");
        $this->load->model("types");
        $this->load->model("activities");

		$this->form_validation->setRulesForCreateEntry();


        $this->data['projects'] = $this->projects->findAll();
        $this->data['teams'] = $this->teams->findAll();
        $this->data['statuses'] = $this->statuses->findAll();
        $this->data['types'] = $this->types->findAll();
        $this->data['activities'] = $this->activities->findAll();



		$this->layout->view('logtime/create', $this->data);
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



	public function user()
	{
		$userId = $this->_ensureLoggedIn();
		$this->logtimes->getWeeklyData($userId);
		$this->layout->view('logtime/index');
	}


	private function processPegination()
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
