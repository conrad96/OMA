<?php include("admin-nav.php"); ?>
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
<li class="list-group-item"><a href='#'  data-toggle="modal" data-target="#myModal_view"  data-backdrop='static'><span class='fa fa-group'></span>&nbsp;&nbsp;View Farmers</a></li>
<li class="list-group-item"><a href='#' data-toggle="modal" data-target="#myModal_post"  data-backdrop='static'><span class='fa fa-group'></span>&nbsp;&nbsp;View Buyers</a></li>
<li class="list-group-item"><a href='#' data-toggle="modal" data-target="#myModal_sold"  data-backdrop='static'><span class='fa fa-dollar'></span>&nbsp;&nbsp;Add Market</a></li>
<li class="list-group-item"><a href='#' data-toggle="modal" data-target="#myModal_complain"  data-backdrop='static' ><span class='fa fa-apple'></span>&nbsp;&nbsp;Add Product Category</a></li>
<li class="list-group-item"><a href='#'  data-toggle="modal" data-target="#myModal_profile" data-backdrop='static' ><span class='fa fa-user'></span>&nbsp;&nbsp;Profile</a></li>
</ul>
<p />
<!-- sold modal-->
<div id="myModal_sold" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Market</h4>
      </div>
      <div class="modal-body" >
<form action="<?php echo $assets['base_url'].'Market/add_Market/'.$id.'/'.$name; ?>" method="POST" class="form-horizontal">
<div class="form-group">
<label class="col-md-3">Name:</label>
<div class="col-md-6">
<input type="text" name="market_name" class="form-control" placeholder="Type name of Market" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">Address:</label>
<div class="col-md-6">
<input type="text" name="market_address" class="form-control" placeholder="Type Address of Market" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">&nbsp;</label>
<div class="col-md-6">
<input type="submit" value="Add Market" class="btn btn-primary" />
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
<!-- end sold modal-->
<!-- Start Modals-->
<div id="myModal_post" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Buyers<span class='badge'>
<?php
$ini=0;
if(!empty($buyers)){
foreach($buyers as $r) $ini++;
echo $ini;
}else{
  echo $ini;
}
?>
        </span></h4>
      </div>
      <div class="modal-body" style='height:450px;overflow:auto;'>
        <form  method="POST" class='form-horizontal' enctype="multipart/form-data">
        <?php
        if(!empty($buyers)){
          $p=1;
          foreach($buyers as $r ){
            ?>

            <ul class='list-group'>
              <li class='list-group-item'><b class='label label-primary'>Surname:</b>
                <span class="text-muted pull-right"><?php echo $r->surname; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Othername:</b>
                <span class="text-muted pull-right"><?php echo $r->othername; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Contact:</b>
                <span class="text-muted pull-right"><?php echo $r->teleno." UGX"; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Market Operated:</b>
                <span class="text-muted pull-right"><?php echo $r->marketoperated; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Product Sold:</b>
                <span class="text-muted pull-right"><?php echo $r->product_sold; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>District:</b>
                <span class="text-muted pull-right"><?php echo $r->district; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>NINnumber:</b>
                <span class="text-muted pull-right"><?php echo $r->NINnumber; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Username:</b>
                <span class="text-muted pull-right"><?php echo $r->username; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Email:</b>
                <span class="text-muted pull-right"><?php echo $r->email; ?></span>
              </li>
            </ul>

            <hr />
            <?php
          $p++;  }
          }else{
            echo "<div class='row alert alert-warning'><i class='fa fa-exclamation-triangle'></i>No Buyers Registered yet...</div>";
          }

        ?>
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
        <h4 class="modal-title">Farmers<span class='badge'>
<?php
$ina=0;
if(!empty($farmers)){
foreach($farmers as $r) $ina++;
echo $ina;
}else{
  echo $ina;
}
?>
        </span></h4>
      </div>
      <div class="modal-body">
        <form  method="POST" class='form-horizontal' enctype="multipart/form-data">
        <?php
        if(!empty($farmers)){
          $m=1;
          foreach($farmers as $r ){
            ?>

            <ul class='list-group'>
              <li class='list-group-item'><b class='label label-primary'>Surname:</b>
                <span class="text-muted pull-right"><?php echo $r->surname; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Othername:</b>
                <span class="text-muted pull-right"><?php echo $r->othername; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Contact:</b>
                <span class="text-muted pull-right"><?php echo $r->teleno." UGX"; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Product:</b>
                <span class="text-muted pull-right"><?php echo $r->natureofproduct; ?></span>
              </li>

              <li class='list-group-item'><b class='label label-primary'>District:</b>
                <span class="text-muted pull-right"><?php echo $r->district; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>NINnumber:</b>
                <span class="text-muted pull-right"><?php echo $r->NINnumber; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Username:</b>
                <span class="text-muted pull-right"><?php echo $r->username; ?></span>
              </li>
              <li class='list-group-item'><b class='label label-primary'>Email:</b>
                <span class="text-muted pull-right"><?php echo $r->emailaddress; ?></span>
              </li>
            </ul>

            <hr />
            <?php
          $m++;  }
          }else{
            echo "<div class='row alert alert-warning'><i class='fa fa-exclamation-triangle'></i>No Farmers Registered yet...</div>";
          }

        ?>
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
        <h4 class="modal-title">Add product Category</h4>
      </div>
      <div class="modal-body">
        <form action=<?php echo $assets['base_url'].'Market/add_product/'.$id.'/'.$name; ?> method="POST" class='form-horizontal'>
<div class="form-group">
<label class="col-md-3">Product Category:</label>
<div class="col-md-6">
<input type="text" name="product_name" class="form-control" placeholder="Type Product Category" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">Category Description</label>
<div class="col-md-6">
<textarea class="form-control" name="description" style='width:300px;height:200px;' placeholder="Type More about category" ></textarea>
</div>
</div>
<div class="form-group">
<label class="col-md-3">&nbsp;</label>
<div class="col-md-6">
<input type="submit" value="send" class="btn btn-primary" id="login_btn" />
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
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">View Profile</h4>
      </div>
      <div class="modal-body">
<?php
if(!empty($profile)){
foreach($profile as $r){
?>
<ul class='list-group'>
<li class='list-group-item'><b class='label label-primary'>NINnumber:</b><span class='text-muted pull-right'><?php echo $r->NINnumber; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>Firstname:</b><span class='text-muted pull-right'><?php echo $r->fname; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>Lastname:</b><span class='text-muted pull-right'><?php echo $r->lastname; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>telephonenumber:</b><span class='text-muted pull-right'><?php echo $r->telephonenumber; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>username:</b><span class='text-muted pull-right'><?php echo $r->username; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>Email Address:</b><span class='text-muted pull-right'><?php echo $r->email; ?></span></li>
<li class='list-group-item'><a data-toggle='modal' data-target='#myModal_pwd' >Click Here to Edit Password</a></li>
</ul>
<div id="myModal_pwd" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Change Password</h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal" action=<?php echo $assets['base_url'].'Market/edit_pwd_admin/'.$id.'/'.$name; ?> method="POST">
<div class="form-group">
<label class="col-md-3">New Password:</label>
<div class="col-md-6">
<input type="password" name="pwd" class="form-control" placeholder="Type New Password" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">Confirm Password:</label>
<div class="col-md-6">
<input type="password" name="cpwd" class="form-control" placeholder="Confirm Password" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">&nbsp;</label>
<div class="col-md-6">
<input type="submit" class="btn btn-primary" value="Change" />
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
<?php
}
}else{
  echo "<i class='alert alert-danger'>Error .your profile doesnot exist</i>";
}
?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- end profile modal-->
<!-- <form class='form-horizontal' method="POST" action=<?php echo $assets['base_url'].'Market/post_broadcast/'.$id.'/'.$name; ?>>
<div class="form-group" style="padding-left:10px;">
<textarea name="post" placeholder="What's on Your Mind ??  Send broadcast message to All " style='width:400px;height:150px;' class="form-control"></textarea>
</div>
<div class="form-group" style="padding-left:10px;padding-bottom:20px;padding-right:10px;">
<button class='btn btn-info form-control' type='submit' >POST</button>
</div>
</form> -->
</div>
  </div>
</div>
<div class="col-md-8">
<div class="panel panel-primary">
<div class="panel-heading">
<h3 class="panel-title"><b style='padding-left:300px;'>NEWS FEED</b><span class='pull-right' style='color:red;padding-bottom:5px;'><span class='fa fa-envelope'><span class='badge'><?php ?></span></span></span></h3>
</div>
<div class="panel-body" id="right_panel_f">
<?php

if(isset($feed)){
  if(!empty($feed)){
    echo "<ul class='list-group'>";
$i=0;
$x=0;
    foreach($feed as $r){
      if(!empty($r->prod_photo)){
        if($r->NINnumber == $id){
          echo "<li class='list-group-item'><b>".$r->surname." ".$r->othername."</b>:&nbsp;&nbsp;&nbsp;&nbsp;posted &nbsp;&nbsp;&nbsp;<a data-target='#myModal_product_details_".$x."' data-backdrop='static' data-toggle='modal' >".$r->prod_title."</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class='fa fa-caret-square-o-right'><a data-target='#myModal_update_".$i."' data-toggle='modal' data-backdrop='static'>&nbsp;Update</a></span><span class='pull-right badge'>".$r->dtime_post."</span></li>";
        }else{
          echo "<li class='list-group-item'><b>".$r->surname." ".$r->othername."</b>:&nbsp;&nbsp;&nbsp;&nbsp;posted &nbsp;&nbsp;&nbsp;<a data-target='#myModal_product_details_".$x."' data-backdrop='static' data-toggle='modal' >".$r->prod_title."</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class='pull-right badge'>".$r->dtime_post."</span></li>";
        }

?>
<div id="myModal_update_<?php echo $x; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $r->prod_title; ?><span class='pull-right'><?php $r->dtime_post; ?></span></h4>
      </div>
      <div class="modal-body">
<form action=<?php echo $assets['base_url']."Market/edit_product/".$id.'/'.$name; ?> method="POST" class="form-horizontal">
<div class="form-group">
<label class="col-md-3">Product Status:</label>
<input type="hidden" name="prod_id" value="<?php echo $r->prod_id; ?>" />
<div class="col-md-6">
<select class="form-control" name="prod_status">
<option selected disabled>--Choose--</option>
<option>sold</option>
<option>pending</option>
</select>
</div>
</div>
<div class="form-group">
<label class="col-md-3">&nbsp;</label>
<div class="col-md-6">
<input type="submit" class="btn btn-primary" value="Update" />
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
<!-- modal details-->
<div id="myModal_product_details_<?php echo $x; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $r->prod_title; ?><span class='pull-right'><?php $r->dtime_post; ?></span></h4>
      </div>
      <div class="modal-body">
<form class="form-horizontal">
  <div class="row">
    <div class="col-md-5">
    <img src='<?php echo $r->prod_photo; ?>' class="form-control img-responsive img-thumbnail" style='width:500px;height:300px;'/>
    </div>
    <div class="col-md-7">
<ul class='list-group'>
    <li class='list-group-item'><b class='label label-primary'>Title:</b>
      <span class="text-muted pull-right"><?php echo $r->prod_title; ?></span>
    </li>
    <li class='list-group-item'><b class='label label-primary'>Description:</b>
      <span class="text-muted pull-right"><?php echo $r->prod_description; ?></span>
    </li>
    <li class='list-group-item'><b class='label label-primary'>Price:</b>
      <span class="text-muted pull-right"><?php echo $r->prod_price." UGX"; ?></span>
    </li>
    <li class='list-group-item'><b class='label label-primary'>Status:</b>
      <span class="text-muted pull-right"><?php echo $r->prod_status; ?></span>
    </li>
</ul>
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
<?php
    }else{ continue; }
$i++;
$x++;
    }
    echo "</ul>";
  }else{
    echo "<div class='row alert alert-info'><i class='fa fa-exclamation-triangle'></i>No Products Posted yet. Please wait...</div>";
  }
}
?>
</div>
</div>
</div>
  </div>
</div>
<?php include("shared/footer.php"); ?>
