<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Basic extends MY_Controller {

    protected $data = array();

    function __construct()
    {
      parent::__construct();
    }

    public function notifications() {
      if($this->ion_auth->logged_in()) {
        echo json_encode($this->Basic_model->get_counts($this->data['user_id']));
      } else {
        echo json_encode($arrayName = array('message' => 0));
      }
    }
}