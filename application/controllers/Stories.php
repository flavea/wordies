<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Stories extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Basic_model');
		$this->load->model('Story_model');
	}

	public function index($order = 1, $type = 0, $rating = 0, $genre = 0, $language = 0, $keyword = 0, $offset = 0) {
		$this->load->library("pagination");
		$this->load->model('Story_model');
		$like = null;
		$keyword2 = null;
		$order = "updated";
		$where = null;

		$this->data['order'] = $order;
		$this->data['type'] = $type;
		$this->data['rating'] = $rating;
		$this->data['genre'] = $genre;
		$this->data['language'] = $language;
		$this->data['keyword'] = $keyword;

		$this->load->helper('form');

		if($order != 1) {
			if($order == 2) $order = 'view_count';
			else if($order == 3) $order = 'subscribers';
			else if($order == 4) $order = 'votes';
			else if($order == 5) $order = 'comment_count';
		}


		$where = array();
		if($type != 0) $where['type_id'] = $type;
		if($rating != 0) $where['rating_id'] = $rating;
		if($genre != 0) $where['genre_id'] = $genre;
		if($language != 0 ) $where['language_id'] = $language;
		if($keyword != 0) $keyword2 = $keyword;

		$config = array();
		$config["base_url"] = base_url() . "stories/index/".$order.'/'.$type.'/'.$rating.'/'.$genre.'/'.$language.'/'.$keyword.'/';
		$config["total_rows"] = $this->Basic_model->count('stories_view', $where, $keyword2);
		$config["per_page"] = 10;
		$config["uri_segment"] = 9;
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

		$page = ($this->uri->segment(9)) ? $this->uri->segment(9) : 0;
		$this->data['stories'] = $this->Story_model->browse_stories($where, $config["per_page"], $page, $order, $keyword2);
		$this->data["links"] = $this->pagination->create_links();
		$this->render('stories','basic', 'masters');
	}

	public function story($id = null, $chapter_id = null) {
		$this->data['id'] = $id;
		$this->data['chid'] = $chapter_id;
		$status = 1;
		if($id == null) show_404();
		if($this->ion_auth->logged_in()) {
			$permission = $this->Basic_model->simple_select('share_mapping', array('story_id' => $id, 'user_id' => $this->ion_auth->user()->row()->id));
			if($permission >= 1 || $this->data['story'][0]->author_id == $this->ion_auth->user()->row()->id) {
				$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $id));
				$this->data['chapters'] = $this->Basic_model->simple_select('chapters', array('story_id' => $id), '*');
			}
			else {
				$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $id, 'status' => $status));
				$this->data['chapters'] = $this->Basic_model->simple_select('chapters', array('story_id' => $id, 'status' => $status), '*');
			}
		} else {
			
			$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $id, 'status' => $status));
			$this->data['chapters'] = $this->Basic_model->simple_select('chapters', array('story_id' => $id, 'status' => $status), '*');
		}
		
		$this->data['username'] = $this->ion_auth->user($this->data['story'][0]->author_id)->row()->username;
		$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'story/'.$id, 'target' => $this->data['user_id']));

		if($chapter_id == null) {
			$wc = 0;
			$cc = 0;
			if($this->ion_auth->logged_in()) {
				$user_id = $this->ion_auth->user()->row()->id;
				$this->data['subscribed'] = $this->Basic_model->count('subscriptions', array('story_id' => $id, 'subscriber_id' => $user_id));
				$this->data['voted'] = $this->Basic_model->count('votes', array('story_id' => $id, 'subscriber_id' => $user_id));
			}
			$this->render('index','story', 'story');
		} else {

			$this->data['chapter'] = $this->data['chapters'][$chapter_id-1];
			$this->data['words_count'] = $this->Basic_model->sum('sections', 'words_count', array('chapter_id' => $this->data['chapter']->id));
			$vc = $this->data['chapter']->view_count;
			$this->Basic_model->update('chapters', array('view_count' => ($vc+1)), array('id' => $this->data['chapter']->id));
			$this->data['sections'] = $this->Basic_model->simple_select('sections', array('chapter_id' => $this->data['chapter']->id));
			$this->data['comments'] = $this->Story_model->get_comments($this->data['chapter']->id);
			$this->render('chapter','story', 'story');
		}
	}

	public function followers($id) {
		$this->data['id'] = $id;
		$this->data['chid'] = $chapter_id;
		$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $id));
		$this->data['users'] = $this->Basic_model->simple_select('story_subscribers', array('story_id' => $id));
		$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'stories/story/followers/'.$id, 'target' => $this->data['user_id']));

	}

	public function recommenders($id) {
		$this->data['id'] = $id;
		$this->data['chid'] = $chapter_id;
		$this->data['story'] = $this->Basic_model->simple_select('stories_view', array('id' => $id));
		$this->data['users'] = $this->Basic_model->simple_select('story_voters', array('story_id' => $id));
		$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'stories/story/recommenders/'.$id, 'target' => $this->data['user_id']));

	}

	function comment($id = null) {
		$this->data['id'] = $id;
		if($id == null) {
			if($this->ion_auth->logged_in()) {
				$user_id = $this->ion_auth->user()->row()->id;
			} else {
				$user_id = 0;
			}
			$chapter = $this->input->post('chapter');
			$comment = $this->input->post('comment');
			$parent = $this->input->post('parent');

			$data = array(
				'chapter_id' => $chapter, 
				'comment'    => $comment, 
				'parent_id'    => $parent, 
				'user_id'    => $user_id
				);

			$res = $this->Basic_model->insert('comments', $data);
			$data = $this->Basic_model->simple_select('chapters', array('id' => $chapter), 'title, author_id, story_id');
			$data2 = $this->Basic_model->simple_select('stories', array('id' => $data[0]->story_id), 'title, author_id');

			if($user_id == 0 && $parent == null) {
				$on = array(
					'target' => $data2[0]->author_id, 
					'type' => 1, 
					'message' => "Guest commented on ".$data[0]->title, 
					'url' => 'comment/'.$comment);
			} else if($user_id == 0 && $parent != null) {
				$on = array(
					'target' => $data2[0]->author_id, 
					'type' => 1, 
					'message' => "Guest commented on ".$data[0]->title." in reply to comment #".$parent, 
					'url' => 'comment/'.$parent);

			} else if($user_id != 0 && $user_id != $this->ion_auth->user()->row()->id && $parent == null) {
				$on = array(
					'target' => $data2[0]->author_id, 
					'type' => 1, 
					'message' => $this->ion_auth->user()->row()->username." commented on ".$data[0]->title, 
					'url' => 'comment/'.$comment);
			} else if($user_id != 0 && $user_id != $this->ion_auth->user()->row()->id && $parent != null) {
				$on = array(
					'target' => $data2[0]->author_id, 
					'type' => 1, 
					'message' => $this->ion_auth->user()->row()->username." commented on ".$data[0]->title." in reply to comment #".$parent, 
					'url' => 'comment/'.$parent);
			}
			
			$this->Basic_model->insert("notifications", $on);
			if($res == 0) {
				echo json_encode(array("status" => "error"));
			} else {
				echo json_encode(array("status" => "ok"));
			}
		} else {
			$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'comment/'.$id, 'target' => $this->data['user_id']));
			$this->data['comments'] = $this->Story_model->get_parent_comments($id);
			$this->data['comments2'] = $this->Story_model->get_child_comments($id);
			$this->render('comment', 'story', 'story');
		}
	}

	function interact($interact) {
		$id = $this->input->post('story');
		if($interact == 1) {
			$this->Basic_model->insert('subscriptions', array('story_id' => $id, 'subscriber_id' => $this->ion_auth->user()->row()->id));
			$data = $this->Basic_model->simple_select('stories', array('$id' =>id), 'title, author_id');
			$this->Basic_model->insert("notifications", 
				array(
					'target' => $data[0]->author_id, 
					'type' => 1, 
					'message' => $this->ion_auth->user()->row()->username." followed ".$data[0]->title, 
					'url' => 'stories/story/followers/'.$id));
		} else if($interact == 2) {
			$this->Basic_model->delete('subscriptions', array('story_id' => $id, 'subscriber_id' => $this->ion_auth->user()->row()->id));
		} else if($interact == 3) {
			$this->Basic_model->insert('votes', array('story_id' => $id, 'subscriber_id' => $this->ion_auth->user()->row()->id));
			$data = $this->Basic_model->simple_select('stories', array('$id' =>id), 'title, author_id');
			$this->Basic_model->insert("notifications", 
				array(
					'target' => $data[0]->author_id, 
					'type' => 1, 
					'message' => $this->ion_auth->user()->row()->username." followed ".$data[0]->title, 
					'url' => 'stories/story/recommenders/'.$id));
		} else if($interact == 4) {
			$this->Basic_model->delete('votes', array('story_id' => $id, 'subscriber_id' => $this->ion_auth->user()->row()->id));
		}
		echo json_encode(array("status" => "ok"));
	}

}