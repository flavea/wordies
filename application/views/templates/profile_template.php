<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/parts/header'); ?>
<?php $this->load->view('templates/parts/basic_header'); ?>
<?php $this->load->view('templates/parts/profile_header'); ?>
<?php echo $the_view_content;?>
<footer>
  <p>&copy; 2001-2016 Web Corporation | <a href="#">About</a> | <a href="#">Terms of use</a></p>
</footer>
<?php $this->load->view('templates/parts/footer');?>