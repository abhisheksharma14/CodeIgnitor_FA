<h2 style="margin-left:30px;"><?=$action?></h2>
<div class="well col-md-8" style="margin:10px;">
<?=form_open('admin/users/edit')?>
<!--USERPROFILE DATA-->
<div class="userprofile">
<fieldset>
<legend>User profile</legend>
<?php if ($this->config->item('FAL_create_user_profile') AND !empty($fields))
{
	foreach ($fields as $field=>$label)
	{?>
	<div class="form-group">
	<label for="<?=$field?>" class="col-sm-2 control-label"><?=$label?>:</label>
    <?=form_input(array('name'=>$field, 
	                    'id'=>$field,
	                    'maxlength'=>'45', 
	                    'size'=>'25',
	                    'value'=>(isset($user_prof[$field]) ? $user_prof[$field] : $this->fal_validation->{$field})))?>
	  <?=(isset($this->fal_validation) ? $this->fal_validation->{$field.'_error'} : '')?>
	</div>

<?php }
}
elseif($this->config->item('FAL_create_user_profile') AND empty($user_profile)) {?> 
<p class="error"><?=$this->lang->line('FAL_no_DB_data');?></p>
<?php } else {?><p class="error">Userprofile disabled in config</p><?php }?>
</fieldset>
</div>
<!-- END USERPROFILE DATA-->
<fieldset>

<legend>User main</legend>
       <?=form_hidden('id', (isset($user['id']) ? $user['id'] : $this->fal_validation->{'id'}));?>
	<div class="form-group">
       <label for="user_name" class="col-sm-2 control-label">Username:</label>
       <?=form_input(array('name'=>'user_name', 
	                       'id'=>'user_name',
	                       'maxlength'=>'45', 
	                       'size'=>'35',
	                       'value'=>(isset($user['user_name']) ? $user['user_name'] : $this->fal_validation->{'user_name'})))?>
	  <?=(isset($this->fal_validation) ? $this->fal_validation->{'user_name'.'_error'} : '')?>
	</div>
	<div class="form-group">
      <label for="email" class="col-sm-2 control-label">E-mail:</label>
      <?=form_input(array('name'=>'email', 
	                       'id'=>'email',
	                       'maxlength'=>'120', 
	                       'size'=>'35',
	                       'value'=>(isset($user['email']) ? $user['email'] : $this->fal_validation->{'email'})))?>
    	<?=(isset($this->fal_validation) ? $this->fal_validation->{'email'.'_error'} : '')?>

      </div>
      
      <div class="form-group">
      <label for="password" class="col-sm-2 control-label">Password:</label>
      <?=form_password(array('name'=>'password', 
	                         'id'=>'password',
	                         'maxlength'=>'16', 
	                         'size'=>'16',
	                         'value'=>(isset($this->fal_validation->{'password'}) ? $this->fal_validation->{'password'} : '')))?>
    	<?=(isset($this->fal_validation) ? $this->fal_validation->{'password'.'_error'} : '')?>

      </div>
      <div class="form-group">
      <label for="password_confirm" class="col-sm-2 control-label">Retype password:</label>
      <?=form_password(array('name'=>'password_confirm', 
	                       'id'=>'password_confirm',
	                       'maxlength'=>'16', 
	                       'size'=>'16',
	                       'value'=>(isset($this->fal_validation) ? $this->fal_validation->{'password_confirm'} : '')))?>
      <?=(isset($this->fal_validation) ? $this->fal_validation->{'password_confirm'.'_error'} : '')?>
      
     </div>
     
    <?php if ($this->config->item('FAL_use_country'))
        {?>
     <br/>
	<div class="form-group">
      <label for="country_id" class="col-sm-2 control-label">Country:</label>
      <?=form_dropdown('country_id',
	                 $countries,
	                 (isset($user['country_id']) ? $user['country_id'] :  $this->fal_validation->country_id))?>
	<?=(isset($this->fal_validation) ? $this->fal_validation->{'country_id'.'_error'} : '')?>
    </div>
    <?php } ?>
    
	<div class="form-group">
    	<label for="role" class="col-sm-2 control-label">Role:</label>
         <select name="role" id="role" >
         <option value="">-------------</option>
         <?php foreach ($role_options as $value)
         {?>
         	<option value="<?=$value?>" <?php if(isset($user['role']) AND $user['role'] == $value){echo 'selected';} else   echo $this->fal_validation->set_select('role', $value); ?> ><?=$value?></option>
         <?php 
         }
         ?>
         </select>
         <?=(isset($this->fal_validation) ? $this->fal_validation->{'role'.'_error'} : '')?>
	</div>
	<div class="form-group">
    <label for="country_id" class="col-sm-2 control-label">Is banned?</label>
         <?=form_checkbox(array( 'name'      => 'banned',
					              'id'       => 'banned',
					              'value'    => 1,
					              'checked'  => ($this->fal_validation->{'banned'}==1 OR (isset($user['banned']) AND $user['banned']==1) ? TRUE : FALSE),
					            )
					        )?>
	</div>

</fieldset>
     <input type="button" name="back" class="submit btn btn-warning" value="back" style="margin-left:20px;" onclick="location.href = '<?=site_url('admin/'.$controller)?>'"/>
     <input type="submit" name="Submit" value="save" class="btn btn-success" style="margin-left:120px;" />

</form>
</div>