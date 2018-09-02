<?php include("buyer-nav.php"); ?>
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
<li class="list-group-item"><a href='#'  data-toggle="modal" data-target="#myModal_view"  data-backdrop='static'><span class='fa fa-list-ul'></span>View Wall</a></li>
<li class="list-group-item"><a href='#' data-toggle="modal" data-target="#myModal_post"  data-backdrop='static'><span class='fa fa-envelope-o'></span>&nbsp;Inbox<span class="badge"><?php echo $inbox_count; ?></span></a></li>
<li class="list-group-item"><a href='#' data-toggle="modal" data-target="#myModal_sold"  data-backdrop='static'><span class='fa fa-envelope'></span>Sent Messages</a></li>
<li class="list-group-item"><a href='#' data-toggle="modal" data-target="#myModal_complain"  data-backdrop='static' ><span class='fa fa-wechat'></span>Product Request</a></li>
<li class="list-group-item"><a href='#'  data-toggle="modal" data-target="#myModal_profile" data-backdrop='static' ><span class='fa fa-user'></span>Profile</a></li>
</ul>
<p />
<!-- sold modal-->
<div id="myModal_sold" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Sent Messages<span class='pull-right badge'><?php echo $count_sent_buyer; ?>
        </span></h4>
      </div>
      <div class="modal-body" style="height:400px;overflow:auto;">
<form  method="POST" class='form-horizontal' enctype="multipart/form-data">
<?php
if(!empty($sent)){
  $p=1;
  foreach($sent as $r ){
    ?>

    <ul class='list-group'>
      <li class='list-group-item'><b class='label label-primary'>To:</b>
        <span class="text-muted pull-right"><?php echo $r->surname." ".$r->othername; ?></span>
      </li>
      <li class='list-group-item'><b class='label label-primary'>Subject:</b>
        <span class="text-muted pull-right"><?php echo $r->subject; ?></span>
      </li>
      <li class='list-group-item'><b class='label label-primary'>Body:</b>
        <span class="text-muted pull-right"><?php echo $r->body; ?></span>
      </li>

      <li class='list-group-item'><b class='label label-primary'>Date:</b>
        <span class="text-muted pull-right"><?php echo $r->dtime_posted; ?></span>
      </li>
    </ul>

    <hr />
    <?php
  $p++;  }
  }else{
    echo "<div class='row alert alert-warning'><i class='fa fa-exclamation-triangle'></i>No Sent Messages</div>";
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
<!-- end sold modal-->
<!-- Start Modals-->
<div id="myModal_post" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content modal-lg">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Inbox </h4>
      </div>
      <div class="modal-body" style="height:450px;overflow:auto;">
<form class='form-horizontal'>
  <?php
if(!empty($inbox)){
  foreach($inbox as $m){
?>
<ul class='list-group'>
  <li class='list-group-item'><b class='label label-primary'>From:</b>
    <span class="text-muted pull-right"><?php echo $m->surname." ".$m->othername; ?></span>
  </li>
  <li class='list-group-item'><b class='label label-primary'>Subject:</b>
    <span class="text-muted pull-right"><?php echo $m->subject; ?></span>
  </li>
  <li class='list-group-item'><b class='label label-primary'>Body:</b>
    <span class="text-muted pull-right"><?php echo $m->body; ?></span>
  </li>
  <li class='list-group-item'><b class='label label-primary'>Date:</b>
    <span class="text-muted pull-right"><?php echo $m->dtime_posted; ?></span>
  </li>

</ul>
<?php
 }
}else{
  echo "<div class='alert alert-warning'><center>No messages received yet...<span class='fa fa-twitter'></span></center></div>";
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
        <h4 class="modal-title">View Wall</h4>
      </div>
      <div class="modal-body">
        <?php
//code for viewing posts plus pictures
if(isset($wall)){
  if(!empty($wall)){
    echo "<ul class='list-group'>";
    foreach($wall as $r){
      if(!empty($r->post_body)){
      echo "<li class='list-group-item'><b>".$r->surname." ".$r->othername."</b>:&nbsp;&nbsp;&nbsp;&nbsp;".$r->post_body."<span class='pull-right badge'>".$r->post_dtime."</span></li>";
    }else{ continue; }

    }
    echo "</ul>";
  }else{
    echo "<div class='row alert alert-info'>No posts yet. Please wait...</div>";
  }
}

?>

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
        <h4 class="modal-title">Post Product Request</h4>
      </div>
      <div class="modal-body">
        <form action=<?php echo $assets['base_url'].'Market/post_complaint_buyer/'.$id.'/'.$name; ?> method="POST" class='form-horizontal'>
<input type="hidden" name="status" value="unread" />
<input type="hidden" name="buyer_NINnumber" value="<?php echo $id; ?>" />
<input type="hidden" name="farmer_NINnumber" value="open" />
<div class="form-group">
<label class="col-md-3">Title</label>
<div class="col-md-6">
<input type="text" name="subject" class="form-control" placeholder="Type Title of complaint Here" />
</div>
</div>
<div class="form-group">
<label class="col-md-3">Body</label>
<div class="col-md-6">
<textarea class="form-control" name="body" style='width:300px;height:200px;' placeholder="Type More about your Complaint Here" ></textarea>
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
<li class='list-group-item'><b class='label label-primary'>Surname:</b><span class='text-muted pull-right'><?php echo $r->surname; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>Othername:</b><span class='text-muted pull-right'><?php echo $r->othername; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>Telno:</b><span class='text-muted pull-right'><?php echo $r->teleno; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>Marketoperated:</b><span class='text-muted pull-right'><?php echo $r->marketoperated; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>Product Sold:</b><span class='text-muted pull-right'><?php echo $r->product_sold; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>District:</b><span class='text-muted pull-right'><?php echo $r->district; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>National ID:</b><span class='text-muted pull-right'><?php echo $r->NINnumber; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>Email Address:</b><span class='text-muted pull-right'><?php echo $r->email; ?></span></li>
<li class='list-group-item'><b class='label label-primary'>password:</b><span class='text-muted pull-right'><?php $x=strlen($r->password); for($i=0;$i<$x;$i++) echo "*"; ?></span></li>
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
<form class="form-horizontal" action=<?php echo $assets['base_url'].'Market/edit_buyer_pwd/'.$id.'/'.$name; ?> method="POST">
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
<!-- <form class='form-horizontal' method="POST" action=<?php //echo $assets['base_url'].'Market/post_broadcast/'.$id.'/'.$name; ?>>
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
<h3 class="panel-title"><b style='padding-left:300px;'>NEWS FEED</b><span class='pull-right' style='color:red;padding-bottom:5px;'><span class='fa fa-envelope'><span class='badge'><?php echo $count; ?></span></span></span></h3>
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
        //if($r->NINnumber == $id){
        //  echo "<li class='list-group-item'><b>".$r->surname." ".$r->othername."</b>:&nbsp;&nbsp;&nbsp;&nbsp;posted &nbsp;&nbsp;&nbsp;<a data-target='#myModal_product_details_".$x."' data-backdrop='static' data-toggle='modal' >".$r->prod_title."</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class='fa fa-caret-square-o-right'><a data-target='#myModal_update_".$i."' data-toggle='modal' data-backdrop='static'>&nbsp;Update</a></span><span class='pull-right badge'>".$r->dtime_post."</span></li>";
        //}else{
          echo "<li class='list-group-item'><b>".$r->surname." ".$r->othername."</b>:&nbsp;&nbsp;&nbsp;&nbsp;posted &nbsp;&nbsp;&nbsp;<a data-target='#myModal_product_details_".$x."' data-backdrop='static' data-toggle='modal' >".$r->prod_title."</a>&nbsp;&nbsp;&nbsp;&nbsp;<span class='pull-right'><a data-target='#myModal_update_".$i."' data-toggle='modal' data-backdrop='static'><span class='fa fa-envelope'>Contact</span></a>&nbsp;&nbsp;&nbsp;<span class='badge'>".$r->dtime_post."</span></span></li>";
      //  }

?>
<div id="myModal_update_<?php echo $x; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php echo $r->surname." ".$r->othername; ?><span class='pull-right'><?php $r->dtime_post; ?></span></h4>
      </div>
      <div class="modal-body">
<form action=<?php echo $assets['base_url']."Market/contact_farmer/".$id.'/'.$name.'/'.$r->prod_title; ?> method="POST" class="form-horizontal">
<input type="hidden" name="farmer_NINnumber" value="<?php echo $r->NINnumber; ?>"/>
<input  type="hidden" name="buyer_NINnumber" value="<?php echo $id; ?>" />
<div class="form-group">
<label class="col-md-3">Subject</label>
<div class="col-md-6">
<input type="text" class="form-control" placeholder="Subject of the Message" name="subject" />
</div>
</div>
<div class="form-group">
  <label class="col-md-3">Body:</label>
<div class="col-md-6">
<textarea class="form-control" name="body" placeholder="Type Message body here..." style="width:270px;height:210px;"></textarea>
</div>
</div>
<input type="hidden" name="status" value="unread" />
<div class="form-group">
  <label class="col-md-3">&nbsp;</label>
<div class="col-md-6">
<input type="submit" class="btn btn-primary" value="Send Message"/>
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
    <li class='list-group-item' style='height:100px;overflow:auto;'><b class='label label-primary'>Description:</b>
      <span class="text-muted pull-right"><?php echo $r->prod_description; ?></span>
    </li>
    <li class='list-group-item'><b class='label label-primary'>Price:</b>
      <span class="text-muted pull-right"><?php echo $r->prod_price." UGX"; ?></span>
    </li>
    <li class='list-group-item'><b class='label label-primary'>Status:</b>
      <span class="text-muted pull-right"><?php echo $r->prod_status."&nbsp;&nbsp;&nbsp;[On Sale]"; ?></span>
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
