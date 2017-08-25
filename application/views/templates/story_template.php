<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/parts/header'); ?>
<?php $this->load->view('templates/parts/story_header'); ?>
<?php echo $the_view_content;?>
<?php $this->load->view('templates/parts/footer');?>