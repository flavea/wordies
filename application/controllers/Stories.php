<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Basic_model');
	}

	public function index() {
		$this->load->model('Story_model');
		$this->data['stories'] = $this->Story_model->get_all_stories();
		$this->render('homepage','basic', 'masters');
	}

	public function story($id, $chapter_id = null) {
		$this->data['id'] = $id;
		$this->data['chid'] = $chapter_id;
		$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $id));
		$this->data['chapters'] = $this->Basic_model->simple_select('chapters', array('story_id' => $id, 'status' => 1), '*');

		if($chapter_id == null) {
			$this->render('index','story', 'story');
		} else {

			$this->data['chapter'] = $this->data['chapters'][$chapter_id-1];
			$this->data['sections'] = $this->Basic_model->simple_select('sections', array('chapter_id' => $this->data['chapter']->id));
			$this->data['comments'] = $this->Basic_model->simple_select('comments', array('chapter_id' => $this->data['chapter']->id));
			$this->render('chapter','story', 'story');
		}
	}
}