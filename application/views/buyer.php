<?php include("farmer-nav.php"); ?>
<div class='container-fluid'>
  <h4>Welcome. <?php echo !empty($name)? $name:""; ?></h4>
  <p />
  <div class='row'>
<div class='col-md-4'>
  <div class='panel panel-primary'>
<div class='panel-heading'>
<h3 class='panel-title'>What Do you want to Do ?</h3>
</div>
<div class='panel-body' id="left_panel_f">
<ul class="list-group">
<li class="list-group-item"><a href='#'><span class='fa fa-camera-retro'></span>Post product</a></li>
<li class="list-group-item"><a href='#'><span class='fa fa-wechat'></span>Complain</a></li>
<li class="list-group-item"><a href='#'><span class='fa fa-user'></span>Profile</a></li>
</ul>
<p />
<form class='form-horizontal'>
<div class="form-group" style="padding-left:10px;">
<textarea name="post" placeholder="What's on Your Mind ??" style='width:400px;height:150px;' class="form-control"></textarea>
</div>
<div class="form-group" style="padding-left:10px;padding-bottom:20px;padding-right:10px;">
<button class='btn btn-info form-control' type='submit' >POST</button>
</div>
</form>
</div>
  </div>
</div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><b style='padding-left:300px;'>NEWS FEED</b><span class='pull-right' style='color:red;padding-bottom:5px;'><span class='fa fa-envelope'><span class='badge'>5</span></span></span></h3>
</div>
<div class="panel-body" id="right_panel_f">

</div>
</div>
</div>
  </div>
</div>
<?php include("shared/footer.php"); ?>
