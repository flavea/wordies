<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data = array();
    function __construct()
    {
      parent::__construct();
      $this->load->model('Basic_model');
      $this->data['logged_in'] = $this->ion_auth->logged_in();
      $this->data['username'] = "Guest";
      $this->data['user_id'] =null;
      $this->data['img'] = null;
      if($this->data['logged_in']) {
        $this->data['user'] = $this->ion_auth->user()->row();
        $this->data['user_id'] = $this->data['user']->id;
        $this->data['username'] = $this->data['user']->username;
        $this->data['img'] = $this->data['user']->profile_image;
        $this->data['messages'] = $this->Basic_model->simple_select('notifications', $data = array('target' => $this->data['user_id'], 'flag' => 0, 'type' => 3));
        $this->data['notifications'] = $this->Basic_model->simple_select('notifications', $data = array('target' => $this->data['user_id'], 'flag' => 0, 'type' => 1));
        $this->data['notifications2'] = $this->Basic_model->simple_select('notifications', $data = array('target' => $this->data['user_id'], 'flag' => 0, 'type' => 2));
      }
      $this->data['genres'] = $this->Basic_model->simple_select('genres');
      $this->data['types'] = $this->Basic_model->simple_select('categories');
      $this->data['ratings'] = $this->Basic_model->simple_select('ratings');
      $this->data['languages'] = $this->Basic_model->simple_select('languages');
      $this->data['message'] = null;
      $this->data['title'] = "Wordies";
      $this->data['explanation'] = "Manage and publish your stories online.";
      $this->data['image'] = "";
    }

    protected function render($the_view = NULL, $template = 'basic', $folder = '')
    {
      if(is_null($template))
      {
        $this->load->view($the_view, $this->data);
      }
      else
      {
          $this->data['the_view'] = $the_view;
          $this->data['folder'] = $folder;
          $this->data['the_view_content'] = (is_null($the_view)) ? '' : $this->load->view($folder.'/'.$the_view, $this->data, TRUE);
          $this->load->view('templates/'.$template.'_template', $this->data);
      }
  }

}

class Auth_Controller extends MY_Controller {
    function __construct() {
        parent::__construct();
        $this->load->library('ion_auth');
        if($this->ion_auth->logged_in()===FALSE)
        {
            redirect('users/login');
        }
    }
    protected function render($the_view = NULL, $template = 'admin_master', $folder = '')
    {
        parent::render($the_view, $template, '');
    }
}