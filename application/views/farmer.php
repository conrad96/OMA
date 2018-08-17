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
<li class="list-group-item"><a href='#'><span class='fa fa-list-ul'></span>View Wall</a></li>
<li class="list-group-item"><a href='#' data-toggle="modal" data-target="#myModal_post" ><span class='fa fa-camera-retro'></span>Post product</a></li>
<li class="list-group-item"><a href='#'><span class='fa fa-wechat'></span>Complain</a></li>
<li class="list-group-item"><a href='#'><span class='fa fa-user'></span>Profile</a></li>
</ul>
<p />
<!-- Start Modals-->
<div id="myModal_post" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Post a product</h4>
      </div>
      <div class="modal-body">
        <form action=<?php echo $assets['base_url'].'Market/post_product/'.$id.'/'.$name; ?> method="POST" class='form-horizontal'>
<div class="form-group">
<label class="col-md-3">Title</label>
<div class="col-md-5">
<input type="text" class="form-control" placeholder="Type title of product" name="title"  required />
</div>
</div>
<div class="form-group">
<label class="col-md-3">Description</label>
<div class="col-md-5">
<textarea name="description" placeholder="Type Description about product" class="form-control" style="height:250px;width:300px;"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-md-3">Price</label>
<div class="col-md-5">
<input type="number" class="form-control" required placeholder="Type price of product" name="price" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">&nbsp;</label>
<div class="col-md-5">
<input type="submit" value="Post" class="btn btn-primary" style="width:100px;"/>
</div>
</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End modals-->
<!-- view wall modal-->
<div id="myModal_view" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Wall</h4>
      </div>
      <div class="modal-body">
        <form action=<?php echo $assets['base_url'].'Market/post_product/'.$id.'/'.$name; ?> method="POST" class='form-horizontal'>
<div class="form-group">
<label class="col-md-3">Title</label>
<div class="col-md-5">
<input type="text" class="form-control" placeholder="Type title of product" name="title"  required />
</div>
</div>
<div class="form-group">
<label class="col-md-3">Description</label>
<div class="col-md-5">
<textarea name="description" placeholder="Type Description about product" class="form-control" style="height:250px;width:300px;"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-md-3">Price</label>
<div class="col-md-5">
<input type="number" class="form-control" required placeholder="Type price of product" name="price" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">&nbsp;</label>
<div class="col-md-5">
<input type="submit" value="Post" class="btn btn-primary" style="width:100px;"/>
</div>
</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end view modal-->
<!-- complain modal-->
<div id="myModal_complain" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Post a Complaint</h4>
      </div>
      <div class="modal-body">
        <form action=<?php echo $assets['base_url'].'Market/post_product/'.$id.'/'.$name; ?> method="POST" class='form-horizontal'>
<div class="form-group">
<label class="col-md-3">Title</label>
<div class="col-md-5">
<input type="text" class="form-control" placeholder="Type title of product" name="title"  required />
</div>
</div>
<div class="form-group">
<label class="col-md-3">Description</label>
<div class="col-md-5">
<textarea name="description" placeholder="Type Description about product" class="form-control" style="height:250px;width:300px;"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-md-3">Price</label>
<div class="col-md-5">
<input type="number" class="form-control" required placeholder="Type price of product" name="price" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">&nbsp;</label>
<div class="col-md-5">
<input type="submit" value="Post" class="btn btn-primary" style="width:100px;"/>
</div>
</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end complain modal-->
<!-- profile modal-->
<div id="myModal_profile" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Profile</h4>
      </div>
      <div class="modal-body">
        <form action=<?php echo $assets['base_url'].'Market/post_product/'.$id.'/'.$name; ?> method="POST" class='form-horizontal'>
<div class="form-group">
<label class="col-md-3">Title</label>
<div class="col-md-5">
<input type="text" class="form-control" placeholder="Type title of product" name="title"  required />
</div>
</div>
<div class="form-group">
<label class="col-md-3">Description</label>
<div class="col-md-5">
<textarea name="description" placeholder="Type Description about product" class="form-control" style="height:250px;width:300px;"></textarea>
</div>
</div>
<div class="form-group">
<label class="col-md-3">Price</label>
<div class="col-md-5">
<input type="number" class="form-control" required placeholder="Type price of product" name="price" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">&nbsp;</label>
<div class="col-md-5">
<input type="submit" value="Post" class="btn btn-primary" style="width:100px;"/>
</div>
</div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end profile modal-->
<form class='form-horizontal'>
<div class="form-group" style="padding-left:10px;">
<textarea name="post" placeholder="What's on Your Mind ??  Send broadcast message to All " style='width:400px;height:150px;' class="form-control"></textarea>
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
