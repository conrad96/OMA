<?php include("shared/header.php"); ?>
<div class="container-fluid">
<ul class="nav nav-pills">
<li class='active'><a href='<?php echo $assets["base_url"]."Market/admin/".$id."/".$name; ?>'><span class='fa fa-user'></span><?php echo $name; ?></a></li>
<li class='pull-right'><a href='<?php echo $assets['base_url']."market/logout"; ?>'><span class='fa fa-sign-out'></span>Logout</a></li>
</ul>
