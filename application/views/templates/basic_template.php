<?php defined('BASEPATH') OR exit('No direct script access allowed');
$this->load->view('templates/parts/header'); ?>
<?php $this->load->view('templates/parts/basic_header'); ?>
<?php echo $the_view_content;?>
<footer>
  <p>&copy; Wordies
</footer>
<?php $this->load->view('templates/parts/footer');?>