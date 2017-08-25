<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller {

    protected $data = array();
    function __construct()
    {
        parent::__construct();
    }

    protected function render($the_view = NULL, $template = 'basic', $folder = '')
    {
      if(is_null($template))
      {
        $this->load->view($the_view,$this->data);
      }
      else
      {
          $this->data['title'] = "Wordies";
          $this->data['explanation'] = "Manage and publish your stories online.";
          $this->data['image'] = "";
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