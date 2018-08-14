<?php include("farmer-nav.php"); ?>
<div class='container-fluid'>
  <h4>Welcome. <?php echo !empty($name)? $name:""; ?></h4>
  <p />
  <div class='row'>
<div class='col-md-5'>
  <div class='panel panel-primary'>
<div class='panel-heading'>
<h3 class='panel-title'>What Do you want to Do ?</h3>
</div>
<div class='panel-body'>
<ul>
<li><a href='#'><span class='fa fa-camera-retro'></span>Post product</a></li>
<li><a href='#'><span class='fa fa-wechat'></span>Complain</a></li>
<li><a href='#'><span class='fa fa-user'></span>Profile</a></li>
</ul>
</div>
  </div>
</div>
  </div>
</div>
<?php include("shared/footer.php"); ?>
