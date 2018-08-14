<?php include("shared/header.php"); ?>
<ul class="nav nav-pills">
<li><a href=<?php echo $assets['base_url']."market/farmer/".$id."/".$name; ?>><?php $name=isset($name)?  "<i class='fa fa-user'>".$name."</i>":"<span class='fa fa-user-times'></span>"; echo $name; ?></a></li>
<li class='pull-right'><a href='<?php echo $assets['base_url']."market/logout"; ?>'><span class='fa fa-sign-out'></span>Logout</a></li>
</ul>
