<div id="register" class="well col-md-6" style="margin-left:20%; margin-right:20%;">
<legend accesskey="D" tabindex="1"><?=$heading?></legend>
<?=form_open($this->uri->uri_string(), array('id' => 'register_form', 'class'=>'form-horizontal'))?>
	<!--USERNAME-->
	<div class='form-group'>
	<label for="user_name" class="col-sm-2 control-lable"><?=$this->lang->line('FAL_user_name_label')?>:</label>
		<div class="col-sm-10">
			<?=form_input(array('name'=>'user_name', 
			                       'id'=>'user_name',
			                       'maxlength'=>'45', 
			                       'size'=>'45',
			                       'value'=>(isset($this->fal_validation) ? $this->fal_validation->{'user_name'} : '')))?>
		    <?=(isset($this->fal_validation) ? $this->fal_validation->{'user_name'.'_error'} : '')?>
		</div>
	</div>
    <!--PASSWORD-->
    <div class='form-group'>
    <label for="password" class="col-sm-2 control-lable"><?=$this->lang->line('FAL_user_password_label')?>:</label>
		<div class="col-sm-10">
			<?=form_password(array('name'=>'password', 
			                       'id'=>'password',
			                       'maxlength'=>'16', 
			                       'size'=>'16',
			                       'value'=>''))?>
		    <?=(isset($this->fal_validation) ? $this->fal_validation->{'password'.'_error'} : '')?>
    	</div>
    </div>
     <!--CONFIRM PASSWORD-->
    <div class='form-group'>
    <label for="password_confirm" class="col-sm-2 control-lable"><?=$this->lang->line('FAL_user_password_confirm_label')?>:</label>
		<div class="col-sm-10">
			<?=form_password(array('name'=>'password_confirm', 
			                       'id'=>'password_confirm',
			                       'maxlength'=>'16', 
			                       'size'=>'16',
			                       'value'=>''))?>
		    <?=(isset($this->fal_validation) ? $this->fal_validation->{'password_confirm'.'_error'} : '')?>
	    </div>
    </div>
    <!--EMAIL-->
    <div class='form-group'>
    <label for="email" class="col-sm-2 control-lable"><?=$this->lang->line('FAL_user_email_label')?>:</label>
		<div class="col-sm-10">	
			<?=form_input(array('name'=>'email', 
			                       'id'=>'email',
			                       'maxlength'=>'120', 
			                       'size'=>'45',
			                       'value'=>(isset($this->fal_validation) ? $this->fal_validation->{'email'} : '')))?>
		    <?=(isset($this->fal_validation) ? $this->fal_validation->{'email'.'_error'} : '')?>
    	</div>
    </div>
    <!--CAPTCHA (security image)-->
    <div class='form-group'>
	<?php
	if ($this->config->item('FAL_use_captcha_register'))
	{?>
	<label for="security" class="col-sm-2 control-lable"><?=$this->lang->line('FAL_captcha_label')?>:</label>
		<div class="col-sm-10">
			<?=form_input(array('name'=>'security', 
			                       'id'=>'security',
			                       'maxlength'=>'45', 
			                       'size'=>'45',
			                       'value'=>''))?>
		    <?=(isset($this->fal_validation) ? $this->fal_validation->{'security'.'_error'} : '')?>
		    <?=$this->load->view($this->config->item('FAL_captcha_img_tag_view'), null, true)?>
		    <?php }?>
    <!-- END CAPTCHA (security image)-->
    	</div>
    </div>
    <div class='form-group'>
<?php
if ($this->config->item('FAL_use_country'))
{?>    
	<label class="col-sm-2 control-lable"><?=$this->lang->line('FAL_user_country_label')?>:</label>
		<div class="col-sm-10">
			<?=form_dropdown('country_id',
			                 $countries,
			                 (isset($this->fal_validation) ? $this->fal_validation->country_id : 0))?>
		    <?=(isset($this->fal_validation) ? $this->fal_validation->{'country_id'.'_error'} : '')?>
		
		<?php
		}
		$buttonSubmit = $this->lang->line('FAL_register_label');
		$buttonCancel = $this->lang->line('FAL_cancel_label');
		$callConfirm = '';
		if ($this->lang->line('FAL_terms_of_service_message') != '')
		{
		    $buttonSubmit = $this->lang->line('FAL_agree_label');
		    $buttonCancel = $this->lang->line('FAL_donotagree_label');
		    $callConfirm = 'confirmDecline();';
		?>
		</div>
		<br/>
		<br/>
		<br/>
	</div>

	<div class='form-group'>
		<div class="col-sm-10">
			<textarea name="rules" class="textarea" rows="8" cols="50" readonly="readonly">
			<?=$this->lang->line('FAL_terms_of_service_message')?>
			</textarea>
			<?php    
			}?>
		</div>
	</div>

	<div class='form-group'>
    	<label class="col-sm-2 control-lable">
    
		<?=form_submit(array('name'=>'register',
							'class'=>'submit btn btn-success',  
		                     'value'=>$buttonSubmit))?>
	    
	    </label>

		<label class="col-sm-2 control-lable">
		
		<?=form_submit(array('type'=>'button',
		                     'name'=>'cancel',
		                     'class'=>'button btn btn-danger',
		                     'value'=>$buttonCancel,
		                     'onclick'=>$callConfirm))?>
	    </label>
	</div>
<?=form_close()?>
</div>
<script language="JavaScript" type="text/javascript">
<!--
function confirmDecline() 
{
    if (confirm('<?=$this->lang->line('FAL_register_cancel_confirm')?>')) 
		location = '<?=site_url()?>';
} 
//-->
</script>
<!--END REGISTER DIV-->