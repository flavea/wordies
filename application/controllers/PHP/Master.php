<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends MY_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->render('homepage','basic', 'masters');
	}
	public function stories() {
		$this->render('stories','basic', 'masters');
	}
	public function authors() {
		$this->render('authors','basic', 'masters');
	}
	public function page() {
		$this->render('page','basic', 'masters');
	}
}