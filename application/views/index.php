<?php include("shared/header.php"); ?>
<div class="container">
	<div class="login_form">
<form action='<?php echo $assets['base_url'].'Market/login'; ?>' method="POST" class="form-horizontal" >

	<div class="form-group">

		<div class="col-md-9">
			<input type="text" name="username" placeholder="Username" id="in_f" class='fom-control'>
		</div>
	</div>
	<div class="form-group">

		<div class="col-md-9">
			<input type="password" name="password" placeholder="Password" id="in_f" class='fom-control'>
		</div>
	</div>
	<div class="form-group">

		<div class="col-md-9">
			<input type="submit" value="Login" class="btn btn-success" id="login_btn">
		</div>
	</div>
</form><p />
<h3><a href='#'>Click Here to Signup&nbsp;&nbsp;&nbsp;<span class='fa fa-hand-o-left'></span></a></h3>
</div>
</div>

<?php include("shared/footer.php"); ?>
