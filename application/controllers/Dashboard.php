<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Story_model');
	}

	public function index() {
		$this->data['id'] = $this->ion_auth->user()->row()->id;
		$this->data['profile'] = $this->Basic_model->simple_select('profile_view', array('id' => $this->data['user_id']));
		$this->data['stories'] = $this->Basic_model->simple_select('stories_view', array('author_id' => $this->data['user_id']));
		$this->data['shared'] = $this->Story_model->get_shared_stories($this->data['user_id']);
		$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'dashboard', 'target' => $this->data['user_id']));
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
			$user_id  = $this->ion_auth->user()->row()->id;
			$title    = $this->input->post('title');
			$status   = $this->input->post('status');
			$cover    = $this->input->post('cover');
			$language = $this->input->post('language');
			$type     = $this->input->post('type');
			$genre    = $this->input->post('genre');
			$rating   = $this->input->post('rating');
			$desc     = $this->input->post('desc');

			$data = array(
				'title'       => $title,
				'status_id'   => $status,
				'cover'       => $cover,
				'type_id'     => $type,
				'language_id' => $language,
				'genre_id'    => $genre,
				'rating_id'   => $rating,
				'desc'        => $desc,
				'author_id'   => $user_id,
				);


			$id = $this->Basic_model->insert('stories', $data);


			if($status == 1) {
				$subscribers = $this->Basic_model->simple_select("subscriptions",  array('author_id' => $user_id));

				if(isset($subscribers) && $subscribers != null) {
					foreach ($subscribers as $sub) {
						$this->Basic_model->insert("notifications", 
							array(
								'target' => $sub->subscriber_id, 
								'type' => 2, 
								'message' => $this->ion_auth->user()->row()->username." posted a new story: ".$title, 
								'url' => 'story/'.$id));
					}
				}
			}

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

		if($id == null || !$this->ion_auth->logged_in()) {
			show_404();
		} else {
			$sdata = $this->Basic_model->simple_select('stories_view', array('id' => $id));
			if(empty($sdata) || count($sdata) == 0) {
				show_404();
			} else {
				if($this->form_validation->run()) {
					$user_id  = $this->ion_auth->user()->row()->id;
					$title    = $this->input->post('title');
					$status   = $this->input->post('status');
					$cover    = $this->input->post('cover');
					$language = $this->input->post('language');
					$type     = $this->input->post('type');
					$genre    = $this->input->post('genre');
					$rating   = $this->input->post('rating');
					$desc     = $this->input->post('desc');
					$id       = $this->input->post('id');

					$det = $this->Basic_model->simple_select('stories_view', array('id' => $id), 'status_id');

					$where = array('id' => $id);

					$data = array(
						'title'       => $title,
						'status_id'   => $status,
						'cover'       => $cover,
						'type_id'     => $type,
						'language_id' => $language,
						'genre_id'    => $genre,
						'rating_id'   => $rating,
						'desc'        => $desc,
						'user_up'     => $user_id
						);

					$this->Basic_model->update('stories', $data, $where);
					if($det[0]->status_id == 0 && $status == 1) {
						$subscribers = $this->Basic_model->simple_select("subscriptions",  array('author_id' => $user_id));

						if(isset($subscribers) && $subscribers != null) {
							foreach ($subscribers as $sub) {
								$this->Basic_model->insert("notifications", 
									array(
										'target' => $sub->subscriber_id, 
										'type' => 2, 
										'message' => $this->ion_auth->user()->row()->username." posted a new story: ".$title, 
										'url' => 'story/'.$id));
							}
						}
					}
					redirect('dashboard/edit_story/'.$id);

				} else {

					$uid  = $this->ion_auth->user()->row()->id;
					$permission = $this->Basic_model->simple_select('share_mapping', array('story_id' => $id, 'user_id' => $uid));
					if($uid == $sdata[0]->author_id || $permission[0]->permission >= 1) {
						$this->data['story'] = $sdata;
						if($uid == $sdata[0]->author_id) $this->data['permission'] = 5;
						else $this->data['permission']  = $permission[0]->permission;
						$this->render('edit_story','basic', 'Dashboard');
					} else {
						show_404();
					}
				}
			}
		}
	}

	public function story($id = null) {
		if($id == null || !$this->ion_auth->logged_in()) {
			show_404();
		} else {
			$sdata = $this->Basic_model->simple_select('stories_view', array('id' => $id));
			if(empty($sdata) || count($sdata) == 0) {
				show_404();
			}

			$uid  = $this->ion_auth->user()->row()->id;
			$permission = $this->Basic_model->simple_select('share_mapping', array('story_id' => $id, 'user_id' => $uid));
			if($uid == $sdata[0]->author_id || $permission[0]->permission >= 1) {
				$this->data['chapters']   = $this->Basic_model->simple_select('chapters', array('story_id' => $id), 'id, title');
				$this->data['story']   = $sdata;
				$this->data['id']   = $id;
				$this->data['tags']   = $this->Basic_model->simple_select('tag_views', array('story_id' => $id));
				$this->data['shares']   = $this->Basic_model->simple_select('share_views', array('story_id' => $id));
				$this->data['characters'] = $this->Basic_model->simple_select('characters', array('story_id' => $id), 'id, name');
				$this->data['resources']  = $this->Basic_model->simple_select('resources', array('story_id' => $id));
				if($uid == $sdata[0]->author_id) $this->data['permission'] = 5;
				else $this->data['permission']  = $permission[0]->permission;
				$this->render('story','basic', 'Dashboard');
			} else {
				show_404();
			}
		}
	}

	public function chapter($id = null) {
		if($id == null || !$this->ion_auth->logged_in()) {
			show_404();
		} else {
			$this->data['id'] = $id;
			$this->data['chapter'] = $this->Basic_model->simple_select('chapters', array('id' => $id));
			$story_id = $this->data['chapter'][0]->story_id;
			$sdata = $this->Basic_model->simple_select('stories_view', array('id' => $story_id));
			if(empty($sdata) || count($sdata) == 0) {
				show_404();
			}

			$uid  = $this->ion_auth->user()->row()->id;
			$permission = $this->Basic_model->simple_select('share_mapping', array('story_id' => $story_id, 'user_id' => $uid));
			if($uid == $sdata[0]->author_id || $permission[0]->permission >= 1) {
				$this->data['story'] = $sdata;
				$this->data['sections']   = $this->Basic_model->simple_select('sections', array('chapter_id' => $id), 'id, desc');
				$this->data['comments'] = $this->Story_model->get_comments($id);
				if($uid == $sdata[0]->author_id) $this->data['permission'] = 5;
				else $this->data['permission']  = $permission[0]->permission;
				$this->render('chapterdashboard','basic', 'Dashboard');
			} else {
				show_404();
			}
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
			$story = $this->Basic_model->simple_select('stories_view', array('id' => $story_id), 'title');

			if($status == 1) {
				$subscribers = $this->Basic_model->simple_select("subscriptions",  array('story_id' => $story_id));

				if(isset($subscribers) && $subscribers != null) {
					foreach ($subscribers as $sub) {
						$this->Basic_model->insert("notifications", 
							array(
								'target' => $sub->subscriber_id, 
								'type' => 2, 
								'message' => $story[0]->title." has a new chapter: ".$title, 
								'url' => 'story/'.$story_id));
					}
				}
			}
			redirect('dashboard/story/'.$story_id);
		}
	}

	public function add_tag() {
		
		$tag    = $this->input->post('tag');
		$story_id = $this->input->post('story_id');

		$tag_search = $this->Basic_model->simple_select('tag', array('tag' => $tag));

		if(count($tag_search) == 0) {
			$data = array(
				'tag'    => $tag
				);

			$id = $this->Basic_model->insert('tag', $data);
		} else {
			$id = $tag_search[0]->id;
		}
		$tagID = $this->Basic_model->insert('tag_mapping', array('story_id' => $story_id, 'tag_id' => $id));
		echo json_encode(array("tagID" => $tagID));
	}

	public function share() {
		$username    = $this->input->post('username');
		$permission    = $this->input->post('permission');
		$story_id = $this->input->post('story_id');

		$user = $this->Basic_model->simple_select('users', array('username' => $username));
		$this->Basic_model->delete('share_mapping', array('user_id' => $user[0]->id, 'story_id' => $story_id));
		$story = $this->Basic_model->simple_select('stories_view', array('id' => $story_id), 'title');

		$this->Basic_model->insert("notifications", 
			array(
				'target' => $user[0]->id, 
				'type' => 2, 
				'message' => $this->ion_auth->user()->row()->username." shared a story with you: ".$story[0]->title, 
				'url' => 'dashboard'));

		$shareID = $this->Basic_model->insert('share_mapping', array('user_id' => $user[0]->id, 'story_id' => $story_id, 'permission' => $permission));
		echo json_encode(array("shareID" => $shareID));
	}

	public function remove_tag() {
		$tag    = $this->input->post('tag');
		$story_id = $this->input->post('story_id');

		$this->Basic_model->delete('tag_mapping', array('tag_id' => $tag, 'story_id' => $story_id));
		echo json_encode(array("status" => "ok"));
	}

	public function remove_share() {
		$id = $this->input->post('id');
		$this->Basic_model->delete('share_mapping', array('id' => $id));
		echo json_encode(array("status" => "ok"));

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


			$chapter = $this->Basic_model->simple_select('chapters', array('id' => $id), 'story_id, status');
			$story = $this->Basic_model->simple_select('stories_view', array('id' => $chapter[0]->story_id), 'title');


			if($chapter[0]->status == 0 && $status == 1) {
				$subscribers = $this->Basic_model->simple_select("subscriptions",  array('story_id' => $chapter[0]->story_id));

				if(isset($subscribers) && $subscribers != null) {
					foreach ($subscribers as $sub) {
						$this->Basic_model->insert("notifications", 
							array(
								'target' => $sub->subscriber_id, 
								'type' => 2, 
								'message' => $story[0]->title." has a new chapter: ".$title, 
								'url' => 'story/'.$chapter[0]->story_id));
					}
				}
			}

			$id = $this->Basic_model->update('chapters', $data, $where);
			redirect('dashboard/chapter/'.$id);
		}
	}

	public function get_characters($id) {

		$this->data['id'] = $id;
		$characters = $this->Basic_model->simple_select('characters', array('story_id' => $id), 'id, name');
		$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $id));

		if($this->data['story'][0]->author_id != $this->ion_auth->user()->row()->id) {
			show_404();
		} else {
			echo json_encode($characters);
		}
	}

	public function get_tags() {
		$tags = $this->Basic_model->simple_select('tag');
		echo json_encode($tags);
	}

	public function get_authors() {
		$authors = $this->Basic_model->simple_select('profile_view');
		echo json_encode($authors);
	}

	public function character($id = null) {

		if($id == null || !$this->ion_auth->logged_in()) {
			show_404();
		} else {
			$this->data['id'] = $id;
			$this->data['character'] = $this->Basic_model->simple_select('characters', array('id' => $id));
			$story_id = $this->data['character'][0]->story_id;
			$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $story_id));
			$uid  = $this->ion_auth->user()->row()->id;
			$permission = $this->Basic_model->simple_select('share_mapping', array('story_id' => $story_id, 'user_id' => $uid));
			if($this->data['story'][0]->author_id == $uid || $permission[0]->permission >= 1) {
				if($uid == $this->data['story'][0]->author_id) $this->data['permission'] = 5;
				else $this->data['permission']  = $permission[0]->permission;
				$this->data['relations'] = $this->Story_model->get_relations($id);
				$this->render('character','basic', 'Dashboard');
			} else {
				show_404();
			}
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
			redirect("auth/login");
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


	public function relation($id = null) {
		if ($id == null || !$this->ion_auth->logged_in()) {
			show_404();
		} else {
			$this->data['id'] = $id;
			$this->data['relation'] = $this->Basic_model->simple_select('character_relations', array('id' => $id));
			$char = $this->Basic_model->simple_select('characters', array('id' => $this->data['relation'][0]->char1));
			$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $char[0]->story_id));
			$uid  = $this->ion_auth->user()->row()->id;
			$permission = $this->Basic_model->simple_select('share_mapping', array('story_id' => $char[0]->story_id, 'user_id' => $uid));
			if($this->data['story'][0]->author_id == $uid || $permission[0]->permission >= 1) {
				if($uid == $this->data['story'][0]->author_id) $this->data['permission'] = 5;
				else $this->data['permission']  = $permission[0]->permission;
				$this->render('relation','basic', 'Dashboard');
			} else {
				show_404();
			}
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
		if ($id == null || !$this->ion_auth->logged_in()) {
			show_404();
		} else {
			
			$this->load->helper('form');
			$this->load->library(array(
				'form_validation'
				));
			$this->form_validation->set_rules('title', 'Title', 'required');

			$this->data['id'] = $id;
			$this->data['resource'] = $this->Basic_model->simple_select('resources', array('id' => $id));
			$story_id = $this->data['resource'][0]->story_id;
			$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $story_id));
			$uid  = $this->ion_auth->user()->row()->id;
			$permission = $this->Basic_model->simple_select('share_mapping', array('story_id' => $story_id, 'user_id' => $uid));
			if($this->data['story'][0]->author_id == $uid || $permission[0]->permission >= 1) {
				if($uid == $this->data['story'][0]->author_id) $this->data['permission'] = 5;
				else $this->data['permission']  = $permission[0]->permission;
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
					redirect('manage/'.$story_id);
				}
			} else {
				show_404();
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
			redirect('chapter/'.$chapter_id);
		}
	}

	public function section($id = null) {

		if($id == null || !$this->ion_auth->logged_in()) {
			show_404();
		} else {
			$this->data['id'] = $id;
			$this->data['section'] = $this->Basic_model->simple_select('sections', array('id' => $id));
			$this->data['chapter'] = $this->Basic_model->simple_select('chapters', array('id' => $this->data['section'][0]->chapter_id));
			$story_id = $this->data['chapter'][0]->story_id;
			$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $story_id));
			$uid  = $this->ion_auth->user()->row()->id;
			$permission = $this->Basic_model->simple_select('share_mapping', array('story_id' => $story_id, 'user_id' => $uid));
			if($this->data['story'][0]->author_id == $uid || $permission[0]->permission >= 1) {
				if($uid == $this->data['story'][0]->author_id) $this->data['permission'] = 5;
				else $this->data['permission']  = $permission[0]->permission;
				$this->data['characters'] = $this->Basic_model->simple_select('characters', array('story_id' => $story_id));
				$this->render('section','basic', 'Dashboard');
			} else {
				show_404();
			}
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
	public function delete_comment() {
		if (!$this->ion_auth->logged_in()) {
			redirect("login");
		} 
		else {
			$id = $this->input->post('id');
			$this->Basic_model->delete('comments', array('id'=> $id));
			echo json_encode(array("status" => "ok"));
		}
	}

}