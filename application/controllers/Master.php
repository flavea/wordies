<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends MY_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->load->model('Story_model');
		$this->data['stories'] = $this->Story_model->get_all_stories();
		$this->render('homepage','basic', 'masters');
	}
}