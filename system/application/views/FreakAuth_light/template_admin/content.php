<!-- START CONTENT -->
<div id="content">
<?php
$flash=$this->db_session->flashdata('flashMessage');
if (isset($flash) AND $flash!='')
{?>
	<div id="flashMessage" style="display:none; margin-left:20px; width:20%;" class="alert alert-warning">
		<?=$flash?>
	</div>
<?php }?>


<?php isset($content) ? $content : null;?>
<?php isset($page) ? $this->load->view($page) : null;?>

</div>
<!-- END CONTENT -->
