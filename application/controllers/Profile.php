<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Basic_model');
		$this->load->model('Story_model');

	}

	public function index($id = null) {
		if($id == null && $this->data['logged_in']) $id = $this->data['user_id'];
		else if($id == null && !$this->data['logged_in']) show_404();

		if($this->ion_auth->logged_in()) {
			$user_id = $this->ion_auth->user()->row()->id;
			$this->data['subscribed'] = $this->Basic_model->count('subscriptions', array('author_id' => $id, 'subscriber_id' => $user_id));
			$this->data['voted'] = $this->Basic_model->count('votes', array('author_id' => $id, 'subscriber_id' => $user_id));
		}
		$this->data['id'] = $id;
		$this->data['profile'] = $this->Basic_model->simple_select('profile_view', array('id' => $id));
		$this->data['stories'] = $this->Basic_model->simple_select('stories_view', array('author_id' => $id));
		$this->data['heading'] = "Stories";
		$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'author.'.$id, 'target' => $this->data['user_id']));
		$this->render('profile', 'profile', 'profiles');
	}

	public function followers($id = null) {
		if(($id == null && $this->data['logged_in']) || $id = $this->data['user_id']) {
			$id = $this->data['user_id'];
			$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'author.'.$id.'/followers', 'target' => $this->data['user_id']));
		}
		else if($id == null && !$this->data['logged_in']) show_404();

		if($this->ion_auth->logged_in()) {
			$user_id = $this->ion_auth->user()->row()->id;
			$this->data['subscribed'] = $this->Basic_model->count('subscriptions', array('author_id' => $id, 'subscriber_id' => $user_id));
			$this->data['voted'] = $this->Basic_model->count('votes', array('author_id' => $id, 'subscriber_id' => $user_id));
		}

		$this->data['id'] = $id;
		$this->data['profile'] = $this->Basic_model->simple_select('profile_view', array('id' => $id));
		$this->data['users'] = $this->Basic_model->simple_select('followers', array('author_id' => $id));
		$this->data['heading'] = "Followers";
		$this->render('follows', 'profile', 'profiles');
	}

	public function following($id = null) {
		if(($id == null && $this->data['logged_in']) || $id = $this->data['user_id']) {
			$id = $this->data['user_id'];
			$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'author/'.$id.'/following', 'target' => $this->data['user_id']));
		}
		else if($id == null && !$this->data['logged_in']) show_404();

		if($this->ion_auth->logged_in()) {
			$user_id = $this->ion_auth->user()->row()->id;
			$this->data['subscribed'] = $this->Basic_model->count('subscriptions', array('author_id' => $id, 'subscriber_id' => $user_id));
			$this->data['voted'] = $this->Basic_model->count('votes', array('author_id' => $id, 'subscriber_id' => $user_id));
		}

		$this->data['id'] = $id;
		$this->data['profile'] = $this->Basic_model->simple_select('profile_view', array('id' => $id));
		$this->data['users'] = $this->Basic_model->simple_select('following', array('subscriber_id' => $id));
		$this->data['heading'] = "Following";
		$this->render('follows', 'profile', 'profiles');
	}

	public function recommendations($id = null) {
		if(($id == null && $this->data['logged_in']) || $id = $this->data['user_id']) {
			$id = $this->data['user_id'];
			$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'author/'.$id.'/recommendations', 'target' => $this->data['user_id']));
		}
		else if($id == null && !$this->data['logged_in']) show_404();

		if($this->ion_auth->logged_in()) {
			$user_id = $this->ion_auth->user()->row()->id;
			$this->data['subscribed'] = $this->Basic_model->count('subscriptions', array('author_id' => $id, 'subscriber_id' => $user_id));
			$this->data['voted'] = $this->Basic_model->count('votes', array('author_id' => $id, 'subscriber_id' => $user_id));
		}
		
		$this->data['id'] = $id;
		$this->data['profile'] = $this->Basic_model->simple_select('profile_view', array('id' => $id));
		$this->data['stories'] = $this->Basic_model->simple_select('story_profile_votes', array('subscriber_id' => $id));
		$this->data['heading'] = "Recommendations";
		$this->render('profile', 'profile', 'profiles');
	}

	public function subscriptions($id = null) {
		if(($id == null && $this->data['logged_in']) || $id = $this->data['user_id']) {
			$id = $this->data['user_id'];
			$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'author/'.$id.'/subscriptions', 'target' => $this->data['user_id']));
		}
		else if($id == null && !$this->data['logged_in']) show_404();

		if($this->ion_auth->logged_in()) {
			$user_id = $this->ion_auth->user()->row()->id;
			$this->data['subscribed'] = $this->Basic_model->count('subscriptions', array('author_id' => $id, 'subscriber_id' => $user_id));
			$this->data['voted'] = $this->Basic_model->count('votes', array('author_id' => $id, 'subscriber_id' => $user_id));
		}
		
		$this->data['id'] = $id;
		$this->data['profile'] = $this->Basic_model->simple_select('profile_view', array('id' => $id));
		$this->data['stories'] = $this->Basic_model->simple_select('story_profile_subscriptions', array('subscriber_id' => $id));
		$this->data['heading'] = "Subscriptions";
		$this->render('profile', 'profile', 'profiles');
	}

	public function comments($id = null) {
		if(($id == null && $this->data['logged_in']) || $id = $this->data['user_id']) {
			$id = $this->data['user_id'];
			$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'author/'.$id.'/comments', 'target' => $this->data['user_id']));
		}
		else if($id == null && !$this->data['logged_in']) show_404();

		if($this->ion_auth->logged_in()) {
			$user_id = $this->ion_auth->user()->row()->id;
			$this->data['subscribed'] = $this->Basic_model->count('subscriptions', array('author_id' => $id, 'subscriber_id' => $user_id));
			$this->data['voted'] = $this->Basic_model->count('votes', array('author_id' => $id, 'subscriber_id' => $user_id));
		}

		$this->data['id'] = $id;
		$this->data['profile'] = $this->Basic_model->simple_select('profile_view', array('id' => $id));
		$this->data['comments'] = $this->Basic_model->simple_select('profile_comments', array('user_id' => $id));
		$this->render('comments', 'profile', 'profiles');
	}

	function interact($interact) {
		$id = $this->input->post('author');
		if($interact == 1) {
			$this->Basic_model->insert('subscriptions', array('author_id' => $id, 'subscriber_id' => $this->ion_auth->user()->row()->id));
			$this->Basic_model->insert("notifications", 
							array(
								'target' => $id, 
								'type' => 1, 
								'message' => $this->ion_auth->user()->row()->username." followed you.", 
								'url' => 'profile/'.$id.'/followers'));
		} else if($interact == 2) {
			$this->Basic_model->delete('subscriptions', array('author_id' => $id, 'subscriber_id' => $this->ion_auth->user()->row()->id));
		} else if($interact == 3) {
			$this->Basic_model->insert('votes', array('author_id' => $id, 'subscriber_id' => $this->ion_auth->user()->row()->id));
			$this->Basic_model->insert("notifications", 
							array(
								'target' => $id, 
								'type' => 1, 
								'message' => $this->ion_auth->user()->row()->username." loved you.", 
								'url' => 'author/'.$id));
		} else if($interact == 4) {
			$this->Basic_model->delete('votes', array('author_id' => $id, 'subscriber_id' => $this->ion_auth->user()->row()->id));
		}
		echo json_encode(array("status" => "ok"));
	}

}