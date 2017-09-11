<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Story_model');
	}

	public function index() {
		$this->data['stories'] = $this->Story_model->get_user_stories($this->data['user_id']);
		$this->data['shared'] = $this->Story_model->get_shared_stories($this->data['user_id']);
		$this->render('dashboard','profile', 'Dashboard');
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
			$cover   = $this->input->post('cover');
			$type    = $this->input->post('type');
			$genre   = $this->input->post('genre');
			$rating  = $this->input->post('rating');
			$desc    = $this->input->post('desc');

			$data = array(
				'title'     => $title,
				'status_id' => $status,
				'cover'     => $cover,
				'type_id'   => $type,
				'genre_id'  => $genre,
				'rating_id' => $rating,
				'desc'      => $desc,
				'author_id' => $user_id,
				);

			$id = $this->Basic_model->insert('stories', $data);
			redirect('dashboard/story/'.$id);
		}
	}


	public function edit_story($id = null) {
		
		$this->data['id'] = $id;

		$this->load->helper('form');
		$this->load->library(array(
			'form_validation'
			));
		$this->form_validation->set_rules('title', 'Title', 'required');
		if (!$this->ion_auth->logged_in()) {
			show_404();
		} else {
			if($this->form_validation->run()) {
				$user_id = $this->ion_auth->user()->row()->id;
				$title   = $this->input->post('title');
				$status  = $this->input->post('status');
				$cover  = $this->input->post('cover');
				$type    = $this->input->post('type');
				$genre   = $this->input->post('genre');
				$rating  = $this->input->post('rating');
				$desc    = $this->input->post('desc');
				$id    = $this->input->post('id');


				$where = array('id' => $id);

				$data = array(
					'title'     => $title,
					'status_id' => $status,
					'cover'     => $cover,
					'type_id'   => $type,
					'genre_id'  => $genre,
					'rating_id' => $rating,
					'desc'      => $desc,
					'user_up'   => $user_id
					);

				$this->Basic_model->update('stories', $data, $where);
				redirect('dashboard/edit_story/'.$id);

			} else {
				$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $id));
				$this->render('edit_story','basic', 'Dashboard');
			}
		}
	}

	public function story($id) {
		$this->data['id'] = $id;
		$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $id));
		if($this->data['story'][0]->author_id != $this->ion_auth->user()->row()->id) {
			show_404();
		} else {
			$this->data['chapters']   = $this->Basic_model->simple_select('chapters', array('story_id' => $id), 'id, title');
			$this->data['characters'] = $this->Basic_model->simple_select('characters', array('story_id' => $id), 'id, name');
			$this->data['resources']  = $this->Basic_model->simple_select('resources', array('story_id' => $id));
			$this->render('story','basic', 'Dashboard');
		}
	}

	public function chapter($id) {

		$this->data['id'] = $id;
		$this->data['chapter'] = $this->Basic_model->simple_select('chapters', array('id' => $id));
		$story_id = $this->data['chapter'][0]->story_id;
		$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $story_id));

		if($this->data['story'][0]->author_id != $this->ion_auth->user()->row()->id) {
			show_404();
		} else {
			$this->data['sections']   = $this->Basic_model->simple_select('sections', array('chapter_id' => $id), 'id, desc');

			$this->data['comments']   = $this->Story_model->get_story_comments($id, 4);
			$this->render('chapterdashboard','basic', 'Dashboard');
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

			$data = array(
				'title'    => $title,
				'status'   => $status,
				'content'  => $content,
				'story_id' => $story_id,
				'user_up'  => $user_id,
				);

			$id = $this->Basic_model->insert('chapters', $data);
			redirect('dashboard/story/'.$story_id);
		}
	}

	public function save_chapter() {

		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$user_id = $this->ion_auth->user()->row()->id;
			$id      = $this->input->post('id');
			$title   = $this->input->post('title');
			$status  = $this->input->post('status');
			$content = $this->input->post('desc');

			$where = array(
				'id'    => $id
				);
			
			$data = array(
				'title'    => $title,
				'status'   => $status,
				'content'  => $content,
				'user_up'  => $user_id,
				);

			$id = $this->Basic_model->update('chapters', $data, $where);
			redirect('dashboard/chapter/'.$id);
		}
	}



	public function get_characters($id) {

		$this->data['id'] = $id;
		$characters = $this->Basic_model->simple_select('characters', array('story_id' => $id), 'id, name');
		$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $id));

		if($this->data['story'][0]->author_id != $this->ion_auth->user()->row()->id) {
			show_404();
		} else {
			echo json_encode($characters);
		}
	}

	public function character($id) {

		$this->data['id'] = $id;
		$this->data['character'] = $this->Basic_model->simple_select('characters', array('id' => $id));
		$story_id = $this->data['character'][0]->story_id;
		$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $story_id));

		if($this->data['story'][0]->author_id != $this->ion_auth->user()->row()->id) {
			show_404();
		} else {
			$this->data['relations'] = $this->Story_model->get_relations($id);
			$this->render('character','basic', 'Dashboard');
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

			$data = array(
				'name'     => $name,
				'story_id' => $story_id,
				'user_up'  => $user_id,
				);

			$id = $this->Basic_model->insert('characters', $data);
			redirect('dashboard/story/'.$story_id);
		}
	}


	public function save_character() {
		$user        = $this->ion_auth->user()->row();
		$user_id     = $user->id;

		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$id          = $this->input->post('id');
			$name        = $this->input->post('name');
			$gender      = $this->input->post('gender');
			$age         = $this->input->post('age');
			$physical    = $this->input->post('physical');
			$personality = $this->input->post('personality');
			$background  = $this->input->post('background');
			$face        = $this->input->post('face');
			$other       = $this->input->post('other');

			$where = array(
				'id'    => $id
				);

			$data = array(
				'name'        => $name, 
				'gender'      => $gender, 
				'age'         => $age, 
				'physical'    => $physical, 
				'personality' => $personality, 
				'background'  => $background, 
				'face'        => $face, 
				'other'       => $other, 
				'user_up'     => $user_id, 
				);

			$res = $this->Basic_model->update('characters', $data, $where);
			if($res == 0) {
				echo json_encode(array("status" => "error"));
			} else {
				echo json_encode(array("status" => "ok"));
			}
		}
	}


	public function relation($id) {
		$this->data['id'] = $id;
		$this->data['relation'] = $this->Basic_model->simple_select('character_relations', array('id' => $id));
		$char = $this->Basic_model->simple_select('characters', array('id' => $this->data['relation'][0]->char1));
		$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $char[0]->story_id));
		if($this->data['story'][0]->author_id != $this->ion_auth->user()->row()->id) {
			show_404();
		} else {
			$this->render('relation','basic', 'Dashboard');
		}
	}

	public function new_relation() {
		
		if (!$this->ion_auth->logged_in()) {
			show_404();
		} else {
			$user_id   = $this->ion_auth->user()->row()->id;
			$id        = $this->input->post('char1');
			$character = $this->input->post('char2');
			$desc      = $this->input->post('desc');

			$data = array(
				'char1' => $id,
				'char2' => $character,
				'desc'  => $desc,
				);

			$this->Basic_model->insert('character_relations', $data);
			echo json_encode(array("id" => $id));
		}
	}

	public function update_relation() {
		
		if (!$this->ion_auth->logged_in()) {
			show_404();
		} else {
			$id        = $this->input->post('id');
			$character = $this->input->post('char2');
			$desc      = $this->input->post('desc');

			$where = array('id' => $id);

			$data = array(
				'char2' => $character,
				'desc'  => $desc,
				);

			$this->Basic_model->update('character_relations', $data, $where);
			echo json_encode(array("id" => $id));
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

			$data = array(
				'name'        => $title,
				'link'        => $link,
				'description' => $desc,
				'story_id'    => $story_id,
				);

			$id = $this->Basic_model->insert('resources', $data);
			redirect('dashboard/story/'.$story_id);
		}
	}


	public function update_resource($id) {
		
		$this->load->helper('form');
		$this->load->library(array(
			'form_validation'
			));
		$this->form_validation->set_rules('title', 'Title', 'required');

		$this->data['id'] = $id;
		$this->data['resource'] = $this->Basic_model->simple_select('resources', array('id' => $id));
		$story_id = $this->data['resource'][0]->story_id;
		$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $story_id));

		if (!$this->ion_auth->logged_in()) {
			show_404();
		} else {
			if($this->form_validation->run() == FALSE) {
				$this->render('resources', 'basic', 'dashboard');
			} else {
				$user_id  = $this->ion_auth->user()->row()->id;
				$id    	  = $this->input->post('id');
				$title    = $this->input->post('title');
				$link     = $this->input->post('link');
				$desc     = $this->input->post('desc');

				$where = array('id' => $id);

				$data = array(
					'name'        => $title,
					'link'        => $link,
					'description' => $desc
					);

				$id = $this->Basic_model->update('resources', $data, $where);
				redirect('dashboard/story/'.$story_id);
			}
		}
	}

	public function new_section() {
		
		$this->load->helper('form');
		$this->load->library(array(
			'form_validation'
			));
		$this->form_validation->set_rules('desc', 'Desc', 'required');
		if (!$this->ion_auth->logged_in() || $this->form_validation->run() == FALSE) {
			show_404();
		} else {
			$user_id  = $this->ion_auth->user()->row()->id;
			$desc     = $this->input->post('desc');
			$chapter_id = $this->input->post('chapter_id');

			$data = array(
				'desc'        => $desc,
				'chapter_id'    => $chapter_id,
				);

			$id = $this->Basic_model->insert('sections', $data);
			redirect('dashboard/chapter/'.$chapter_id);
		}
	}

	public function section($id) {
		$this->data['id'] = $id;
		$this->data['section'] = $this->Basic_model->simple_select('sections', array('id' => $id));
		$this->data['chapter'] = $this->Basic_model->simple_select('chapters', array('id' => $this->data['section'][0]->chapter_id));
		$story_id = $this->data['chapter'][0]->story_id;
		$this->data['story'] = $this->Basic_model->simple_select('stories', array('id' => $story_id));
		if($this->data['story'][0]->author_id != $this->ion_auth->user()->row()->id) {
			show_404();
		} else {
			$this->data['characters'] = $this->Basic_model->simple_select('characters', array('story_id' => $story_id));

			$this->render('section','basic', 'Dashboard');
		}
	}

	public function save_section() {

		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$user       = $this->ion_auth->user()->row();
			$user_id    = $user->id;
			$id         = $this->input->post('id');
			$content    = $this->input->post('content');
			$desc       = $this->input->post('desc');
			$characters = $this->input->post('characters');
			$word_count = $this->input->post('word_count');

			$where = array(
				'id'    => $id
				);

			$data = array(
				'content'     => $content, 
				'desc'        => $desc, 
				'characters'  => $characters, 
				'words_count' => $word_count, 
				'user_up'     => $user_id, 
				);

			$res = $this->Basic_model->update('sections', $data, $where);
			if($res == 0) {
				echo json_encode(array("status" => "error"));
			} else {
				echo json_encode(array("status" => "ok"));
			}
		}
	}


	public function delete_story() {
		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$id = $this->input->post('id');
			$this->Basic_model->delete('stories', array('id'=> $id));
			$this->Basic_model->delete('chapters', array('story_id'=> $id));
			$this->Basic_model->delete('resources', array('story_id'=> $id));
			$this->Basic_model->delete('characters', array('story_id'=> $id));
			echo json_encode(array("url" => base_url('dashboard')));
		}
	}

	public function delete_chapter() {
		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$id = $this->input->post('id');
			$this->Basic_model->delete('chapters', array('id'=> $id));
			$this->Basic_model->delete('sections', array('chapter_id'=> $id));
			echo json_encode(array("status" => "ok"));
		}
	}

	public function delete_character() {
		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$id = $this->input->post('id');
			$this->Basic_model->delete('characters', array('id'=> $id));
			$this->Basic_model->delete('character_relations', array('char1'=> $id));
			$this->Basic_model->delete('character_relations', array('char2'=> $id));
			echo json_encode(array("status" => "ok"));
		}
	}

	public function delete_resource() {
		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$id = $this->input->post('id');
			$this->Basic_model->delete('resources', array('id'=> $id));
			echo json_encode(array("status" => "ok"));
		}
	}

	public function delete_section() {
		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$id = $this->input->post('id');
			$this->Basic_model->delete('sections', array('id'=> $id));
			echo json_encode(array("status" => "ok"));
		}
	}

	public function delete_relation() {
		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$id = $this->input->post('id');
			$this->Basic_model->delete('character_relations', array('id'=> $id));
			echo json_encode(array("status" => "ok"));
		}
	}

}