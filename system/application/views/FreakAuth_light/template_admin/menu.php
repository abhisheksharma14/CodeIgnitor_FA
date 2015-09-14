<div id="wrapper">
 <nav class="navbar navbar-inverse">
	<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Admin</a>
    </div> 
  	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
 	<?php $ci_uri = trim($this->uri->uri_string(), '/'); $att = ' id="active"';?>
    	<div id="navlist">
 			<ul class="nav navbar-nav navbar-right">
 				<li<?= (preg_match('|^admin$|', $ci_uri) > 0)? $att: ''?>><?=anchor('admin/', 'home')?></li>	
 				<li<?= (preg_match('|^admin/admins|', $ci_uri) > 0)? $att: ''?>><?=anchor('admin/admins', 'administrators')?></li>
 				<li<?= (preg_match('|^admin/users|', $ci_uri) > 0)? $att: ''?>><?=anchor('admin/users', 'users')?></li>
 				<li><?= anchor('', 'back to website')?></li>
 				<li><?= anchor($this->config->item('FAL_logout_uri'),'Logout')?></li>
 				<!-- anchor($this->config->item('FAL_logout_uri')) -->
 			</ul>
 		</div>
  	</div>
 </nav>
</div>