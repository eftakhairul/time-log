<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH . "controllers/BaseController.php";
class LogtimeController extends BaseController {

	public function __construct()
    {
		parent::__construct();

        $this->load->model('logtimes');
		$this->load->library('pagination');

        $this->load->model("projects");
        $this->load->model("teams");
        $this->load->model("statuses");
        $this->load->model("types");
        $this->load->model("activities");
        $this->load->model("users");

        $this->data['projects']     = $this->projects->findAll();
        $this->data['teams']        = $this->teams->findAll();
        $this->data['statuses']     = $this->statuses->findAll();
        $this->data['types']        = $this->types->findAll();
        $this->data['activities']   = $this->activities->findAll();
        $this->data['users']        = $this->users->findAll();
        $this->data['title']        = 'ALL ENTRIES';

    }

	/**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function index()
	{
        $this->processPegination();
		$this->layout->view('logtime/index', $this->data);
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
		$this->form_validation->setRulesForCreateEntry();

        if(!empty($_POST)) {

            if($this->form_validation->run()) {

                $_POST['user_id']                           = $this->_ensureLoggedIn();
                if(!empty($_POST['date']))  $_POST['date']  = DateHelper::humanToMysql($_POST['date']);
                $_POST['created_on']                        = date('Y-m-d');

                if($this->logtimes->insert($_POST)) {
                    echo true;
                    exit;
                } else {
                    $this->data['errorMessage'] = 'Something went wrong.';
                }
            } else {
                 $this->data['errorMessage'] = 'Please correct the following errors.';
            }
        }

		$this->layout->view('logtime/create', $this->data);
	}


    /**
	 * Edit one logtime entry by id
	 *
	 *
	 * return string
	 */
	public function edit($id)
	{
        $this->load->library('form_validation');
		$this->form_validation->setRulesForCreateEntry();


        if (!empty ($_POST)) {

            if ($this->form_validation->run()) {

                if ($this->logtimes->update($_POST, $id)) {
                     $this->_redirectForSuccess('logtime', 'Entry has been updated successfully');
                } else {
                    $this->data['error'] = 'Data is not save';
                }
            } else {
                $this->data['error']    = 'Enter required information.';
                $this->data['logtime']  = $_POST;
            }
        } else {

            $this->data['logtime'] = $this->logtimes->findById($id);
        }

		$this->layout->view('logtime/edit', $this->data);
	}



	/**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function filter()
	{
        $params = array();
        foreach($_POST as $key => $value)
        {
           if(!empty($value)) {
               if ($key == 'date') $value = DateHelper::humanToMysql($value);
               $params[$key] = $value;
           }
        }

        $this->data['title']    = "Filters";
        $this->data['filter']   = $params;
        $this->data['logtimes'] = $this->logtimes->getAll($params);

        $this->session->set_userdata('filter', $params);
		$this->layout->view('logtime/index', $this->data);
	}

    	/**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function clearFilter()
	{
      $this->layout->view('welcome_message');
      $this->_redirectForSuccess('logtime', "All filter's parameters has been cleared.");
	}

    /**
	 * Listing all logged Time
	 *
	 *
	 * return string
	 */
	public function export()
	{

	}



	public function user()
	{
		$userId = $this->_ensureLoggedIn();

        $this->data['title']    = "Dashboard (Weekly View)";
		$this->data['logtimes'] = $this->logtimes->getWeeklyData($userId);

		$this->layout->view('logtime/index', $this->data);
	}


    public function delete($id)
    {
        if (empty($id)) {
            return false;
        }

         $data = $this->uri->uri_to_assoc();

        if (empty ($data['id'])) {
            $this->_redirectForFailure('logtime', 'Entry is not found.');
        } else {
            $this->logtimes->remove($data['id']);
            $this->_redirectForSuccess('logtime', 'Entry deletion has been successful.');
        }

    }


	private function processPegination()
	{
        $options['page']        = empty ($options['page']) ? 0 : $options['page'];
        $this->data["logtimes"] = $this->logtimes->getAll($options);

        $paginationOptions = array(
            'baseUrl' 		=> 'page/',
            'segmentValue' 	=> $this->uri->getSegmentIndex('page') + 1,
            'numRows' 		=> $this->logtimes->findCount()
        );

        $this->pagination->setOptions($paginationOptions);
	}
}
