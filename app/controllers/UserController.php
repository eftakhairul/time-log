<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include_once APPPATH . "controllers/BaseController.php";
class UserController extends BaseController
{

	public function  __construct()
	{
		parent::__construct();
		$this->load->model('users');
	}

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->setRulesForSignIn();

		if (!empty ($_POST)) {

			if ($this->form_validation->run()) {

				$result = $this->users->validateUser($_POST);
				if ($result) {

					$this->session->set_userdata('username', $result['username']);
					$this->session->set_userdata('user_id', $result['id']);

					$this->_redirectForSuccess('logtime', 'You have successfully logged in.');

				} else {
					$this->data['error'] = 'Enter correct Username & Password.';
				}

			} else {
				$this->data['error'] = 'Enter required information.';
			}
		}

		$this->load->view('user/index', $this->data);
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('user');
	}
}