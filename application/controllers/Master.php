<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Master extends MY_Controller {
	function __construct()
	{
		parent::__construct();
	}

	public function index() {
		$this->load->model('Basic_model');
		$this->data['stories'] = $this->Basic_model->simple_select('stories_view', null, '*', 10, 0, 'updated');
		$this->render('homepage','basic', 'masters');
	}

	public function authors($offset = 0) {
		$this->load->library("pagination");
		$config = array();
		$config["base_url"] = base_url() . "stories/index";
		$config["total_rows"] = $this->Basic_model->count('profile_view');
		$config["per_page"] = 10;
		$config["uri_segment"] = 3;
		$config['full_tag_open'] = '<ul class="uk-pagination" uk-margin>';
		$config['full_tag_close'] = '</ul>';
		$config['next_link'] = '<span uk-pagination-next></span>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_link'] = '<span uk-pagination-previous></span>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li class="uk-active">';
		$config['cur_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$page = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
		$this->data['authors'] = $this->Basic_model->simple_select('profile_view', null, '*', $config["per_page"], $page);
		$this->data["links"] = $this->pagination->create_links();
		$this->render('authors','basic', 'masters');
	}

	public function types() {
		$this->load->model('Basic_model');
		$this->data['types'] = $this->Basic_model->simple_select('categories');
		$this->render('page','basic', 'masters');
	}
	public function ratings() {
		$this->load->model('Basic_model');
		$this->data['ratings'] = $this->Basic_model->simple_select('ratings');
		$this->render('ratings','basic', 'masters');
	}
	public function genres() {
		$this->load->model('Basic_model');
		$this->data['genres'] = $this->Basic_model->simple_select('genres');
		$this->render('genres','basic', 'masters');
	}
	public function notifications() {
		$this->load->model('Basic_model');
		$this->data['notifications'] = $this->Basic_model->simple_select('notifications', array('target' => $this->data['user_id']));
		$this->render('notifications','basic', 'profile');
	}
	public function read_all($type) {
		$this->load->model('Basic_model');
		if($type == 0) $this->Basic_model->update('notifications', array('flag' => 1), array('target' => $this->data['user_id']));
		if($type != 0) $this->Basic_model->update('notifications', array('flag' => 1), array('target' => $this->data['user_id'], 'type' => $type));
		echo json_encode(array("status" => "ok"));
	}
}