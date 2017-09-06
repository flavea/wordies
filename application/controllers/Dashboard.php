<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Story_model');
	}

	public function index() {
		$this->data['stories'] = $this->Story_model->get_user_stories($this->data['user_id']);
		$this->render('dashboard','profile', 'Dashboard');
	}
	public function chapter() {
		$this->render('chapter','story', 'story');
	}
	public function new_story() {
		
		$this->load->helper('form');
		$this->load->library(array(
			'form_validation'
			));
		$this->form_validation->set_rules('title', 'Title', 'required');
		if (!$this->ion_auth->logged_in() || $this->form_validation->run() == FALSE) {
			show_404();
		} else {
			$user_id = $this->ion_auth->user()->row()->id;
			$title   = $this->input->post('title');
			$status  = $this->input->post('status');
			$type    = $this->input->post('type');
			$genre   = $this->input->post('genre');
			$rating  = $this->input->post('rating');
			$desc    = $this->input->post('desc');

			$id = $this->Story_model->insert_stories($title, $status, $type, $genre, $rating, $desc, $user_id);
			redirect('dashboard/story/'.$id);
		}
	}
	public function story($id) {
		$this->data['id'] = $id;
		$this->data['story'] = $this->Story_model->get_story($id);
		if($this->data['story'][0]->author_id != $this->ion_auth->user()->row()->id) {
			show_404();
		} else {
			$this->data['chapters']   = $this->Story_model->get_chapters($id);
			$this->data['characters'] = $this->Story_model->get_characters($id);
			$this->data['resources']  = $this->Story_model->get_resources($id);
			$this->data['comments']   = $this->Story_model->get_story_comments($id, 4);
			$this->render('story','basic', 'Dashboard');
		}
	}
	public function new_chapter() {
		
		$this->load->helper('form');
		$this->load->library(array(
			'form_validation'
			));
		$this->form_validation->set_rules('title', 'Title', 'required');
		if (!$this->ion_auth->logged_in() || $this->form_validation->run() == FALSE) {
			show_404();
		} else {
			$user_id  = $this->ion_auth->user()->row()->id;
			$title    = $this->input->post('title');
			$status   = $this->input->post('status');
			$story_id = $this->input->post('story_id');
			$content  = $this->input->post('desc');

			$id = $this->Story_model->insert_chapter($title, $status, $content, $story_id, $user_id);
			redirect('dashboard/story/'.$story_id);
		}
	}
	public function new_character() {
		
		$this->load->helper('form');
		$this->load->library(array(
			'form_validation'
			));
		$this->form_validation->set_rules('name', 'Name', 'required');
		if (!$this->ion_auth->logged_in() || $this->form_validation->run() == FALSE) {
			show_404();
		} else {
			$user_id  = $this->ion_auth->user()->row()->id;
			$name     = $this->input->post('name');
			$story_id = $this->input->post('story_id');

			$id = $this->Story_model->insert_character($name, $story_id, $user_id);
			redirect('dashboard/story/'.$story_id);
		}
	}


	public function new_resource() {
		
		$this->load->helper('form');
		$this->load->library(array(
			'form_validation'
			));
		$this->form_validation->set_rules('title', 'Title', 'required');
		if (!$this->ion_auth->logged_in() || $this->form_validation->run() == FALSE) {
			show_404();
		} else {
			$user_id  = $this->ion_auth->user()->row()->id;
			$title    = $this->input->post('title');
			$link     = $this->input->post('link');
			$desc     = $this->input->post('desc');
			$story_id = $this->input->post('story_id');

			$id = $this->Story_model->insert_resource($title, $link, $desc, $story_id, $user_id);
			redirect('dashboard/story/'.$story_id);
		}
	}
}