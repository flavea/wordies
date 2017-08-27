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
	public function login() {
		$this->render('login','basic', 'masters');
	}
	public function page() {
		$this->render('page','basic', 'masters');
	}
	public function profile() {
		$this->render('profile','profile', 'profiles');
	}
	public function comments() {
		$this->render('comments','profile', 'profiles');
	}
	public function story() {
		$this->render('index','story', 'story');
	}
	public function chapter() {
		$this->render('chapter','story', 'story');
	}
	public function people() {
		$this->render('people','story', 'story');
	}
}