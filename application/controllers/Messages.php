<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Messages extends MY_Controller {
	function __construct()
	{
		parent::__construct();
		$this->load->model('Basic_model');
		$this->load->model('Story_model');

	}

	public function index() {
		if($this->data['logged_in']) {
			$user_id                = $this->ion_auth->user()->row()->id;
			$this->data['messages'] = $this->Basic_model->simple_select('messages', array('user_id' => $user_id), '*', null, 0, 'latest_reply');
			$this->render('messages', 'basic', 'messages');
		} else {
			show_404();
		}		
	}

	public function message($id = null) {

		if(!$this->data['logged_in']) {
			show_404();
		}

		if($id != null) {
			$count = $this->Basic_model->count('message_mapping', array('user_id' => $this->data['user_id'], 'message_id' => $id));

			if($count == 0) show_404();
		}

		if($this->data['logged_in']) {
			$this->data['id']   = $id;
			$this->data['head'] = $this->Basic_model->simple_select('messages_header', array('id' => $id));
			$this->Basic_model->update('notifications', array('flag' => 1), array('url' => 'message/'.$id, 'target' => $this->data['user_id']));

			if ($id != null) {
				$user_id                = $this->ion_auth->user()->row()->id;
				$this->data['messages'] = $this->Basic_model->simple_select('messages_replies', array('message_id' => $id), '*', null, 0, 'date');
				$this->render('message', 'basic', 'messages');
			} else {
				$id        = $this->input->post('id');
				$message   = $this->input->post('message');
				$receivers = $this->Basic_model->simple_select('message_mapping', array('message_id' => $id));

				$this->Basic_model->insert('message_replies', array('message_id' => $id, 'reply' => $message, 'sender' => $this->data['user_id']));

				foreach ($receivers as $r) {
					if($r->user_id != $this->ion_auth->user()->row()->id) $receiver = $r->user_id;
				}

				if($receiver != null) {
				$this->Basic_model->insert("notifications", 
					array(
						'target'  => $receiver, 
						'type'    => 3, 
						'message' => $this->ion_auth->user()->row()->username." replied to".$this->data['head'][0]->title, 
						'url'     => 'message/'.$id
						)
					);
			}

				redirect('message/'.$id);
			}
		} else {
			show_404();
		}
	}

	public function new_message($user_id = null) {
		if(!$this->data['logged_in']) {
			show_404();
		} else {
			$this->data['users'] = $this->Basic_model->simple_select('users', array('id' => $user_id), 'id, username');

			if ($user_id != null) {
				$this->render('new', 'basic', 'messages');
			} else {
				$id      = $this->input->post('id');
				$title   = $this->input->post('title');
				$message = $this->input->post('message');

				$message_id = $this->Basic_model->insert('messages_header', array('title' => $title, 'sender' => $this->data['user_id']));
				$this->Basic_model->insert('message_mapping', array('user_id' => $id, 'message_id' => $message_id));
				$this->Basic_model->insert('message_mapping', array('user_id' => $this->data['user_id'], 'message_id' => $message_id));
				$this->Basic_model->insert('message_replies', array('message_id' => $message_id, 'reply' => $message, 'sender' => $this->data['user_id']));


				$this->Basic_model->insert("notifications", 
					array(
						'target'  => $id, 
						'type'    => 3, 
						'message' => $this->ion_auth->user()->row()->username." send a message: ".$title, 
						'url'     => 'message/'.$message_id
						)
					);

				redirect('message/'.$message_id);
			}
		}
	}

}