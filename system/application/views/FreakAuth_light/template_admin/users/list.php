<div class="well col-md-6" style="margin-left:70px;"><h2><?=$action?></h2>

<?=$pagination_links;?>
<?php
//if no records in DB don't display the result table
if (isset($user)) 
  {?>
  <?=form_open('admin/'.$controller.'/add')?>
  <?=form_submit(array('class'=>'submit btn btn-primary',
					 'name'=>'Add', 
					 'id'=>'submit',
	                 'value'=> $controller=='admins' ? 'Add admin' : 'Add user'))?>

  <?=form_close()?>
<br/>
<table class="table">
  <tr>
    <th scope="col">id</th>
    <th scope="col">user name</th>
    <th scope="col">role</th>
    <th scope="col">Actions</th>
  </tr>

  <?php foreach($user as $key=>$value):?>
  <tr class="center">
    <td><?=$user[$key]['id'];?></td>
    <td><?=$user[$key]['user_name'];?></td>
    <td><?=$user[$key]['role']?></td>
    <td>
        <?=anchor('admin/'.$controller.'/show/'.$user[$key]['id'], '<img src="'.base_url().$this->config->item('FAL_assets_admin').'/'.$this->config->item('FAL_images').'/zoom.png" alt="view" title="view">', array('title' => 'view'));?>
        <?php
        if ($user[$key]['show_edit_link'])
            echo '&nbsp;&nbsp;&nbsp;',anchor('admin/'.$controller.'/edit/'.$user[$key]['id'], '<img src="'.base_url().$this->config->item('FAL_assets_admin').'/'.$this->config->item('FAL_images').'/pencil.png" alt="edit" title="edit">', array('title' => 'edit'));
        if ($user[$key]['show_delete_link'])
            echo '&nbsp;&nbsp;&nbsp;',anchor('admin/'.$controller.'/del/'.$user[$key]['id'], '<img src="'.base_url().$this->config->item('FAL_assets_admin').'/'.$this->config->item('FAL_images').'/cross.png" alt="delete" title="delete">', array('onCLick' => "return confirm('".$this->lang->line('FAL_confirm_delete')."')", 'title' => 'delete'));
        ?>
    </td>
  </tr>
  <?php endforeach;?>
</table>
<?php }?>
</div>