<?php include("shared/header.php"); ?>
<div class="container">
<?php if(isset($msg)) echo $msg; ?>
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
</form>
</div>
</div>

<?php include("shared/footer.php"); ?>
