<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<? $this->load->view('templates/header_logged'); ?>


<div class="container animated fadeIn">

	<h1>Form Page</h1>

  	<h5>Here you get result about your project.</h5>



  	<?php echo $this->session->flashdata('msg'); ?> 
</div>


<!-- START OF FOOTER -->
<? $this->load->view('templates/footer'); ?>
<!-- END OF IT  -->

</body>
</html>