<div id="container">
	<div id="browse_crag">
		<div class="login">
			<?=loginAnchor();?>
		</div>
	</div>
<hr/>
<div id="mainContent">
<!--STAR FLASH MESSAGE-->

<?php 
$flash=$this->db_session->flashdata('flashMessage');
if (isset($flash) AND $flash!='')
{?>
	<div id="flashMessage" style="display:none; margin-left:20px; width:20%;" class="alert alert-warning">
		<?=$flash?>
	</div>
<?php }

if(!empty(getUserName())){
?>
<!--END FLASH-->

<div class="well col-md-4 alert alert-success" style="margin-left:30%; margin-right:30%;">
You are <b><?=getUserName()?></b> (role:<b><?=getUserProperty('role')?></b>),
<br/>your id is <b><?=getUserProperty('id')?></b>.<br />

Your first superadmin is <b><?=getUserPropertyFromId(1,'user_name')?></b>.
<br />
</div>


<?php }
if (isset($message) AND $message!='')
{
	echo $message;
}?>
<!--INSTALLER-->

<?php if (isset($installer) AND $installer!='')
{
	echo $installer;
}?>
<!--END INSTALLER-->
<!--START INCLUDED CONTENT-->
<?= isset($fal) ? $fal : null;?>
<?php isset($page) ? $this->load->view($page) : null;?>
<!--END INCLUDED CONTENT-->
</div>
</div>