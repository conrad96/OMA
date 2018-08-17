<?php include("shared/header.php"); ?>

<ul class="nav nav-pills">
<li class='active'><a href=<?php echo $assets['base_url']."market/buyer/".$id."/".$name; ?>><span class='fa fa-user'></span><?php echo $name; ?></a></li>
<li class='pull-right'><a href='<?php echo $assets['base_url']."market/logout"; ?>'><span class='fa fa-sign-out'></span>Logout</a></li>

</ul>
