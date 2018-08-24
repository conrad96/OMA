<?php include("shared/header.php"); ?>
<div class="container">
	<div class="row">
    <form action='<?php echo $assets['base_url']."Market/add_buyer"; ?>'  method="POST" class="form-horizontal">
      <div class="form-group">
<label class="col-md-3">Surname:</label>
<div class="col-md-6">
<input type="text" class="form-control" name="surname"  placeholder="type Surname"/>
</div>
      </div>
      <div class="form-group">
<label class="col-md-3">Othernames:</label>
<div class="col-md-6">
<input type="text" class="form-control" name="othername"  placeholder="type Othernames"/>
</div>
      </div>
			<div class="form-group">
<label class="col-md-3">Username:</label>
<div class="col-md-6">
<input type="text" class="form-control" name="username"  />
</div>
			</div>
      <div class="form-group">
<label class="col-md-3">Teleno:</label>
<div class="col-md-6">
<input type="text" class="form-control" name="teleno"  />
</div>
      </div>
      <div class="form-group">
<label class="col-md-3">District:</label>
<div class="col-md-6">
<select name='district' class="form-control">
<option selected disabled>--choose--</option>
<?php
if(!empty($districts)){
foreach($districts as $r){
	echo "<option>".$r->district_name."</option>";
}
}else{
	echo "<option disabled> No Districts Registered</option>";
}
?>
</select>
</div>
      </div>
			<div class="form-group">
<label class="col-md-3">Market</label>
<div class="col-md-6">
<select name='marketoperated' class="form-control">
<option disabled selected>--Choose Market--<option>
	<?php
if(!empty($markets)){
	foreach($markets as $r){
		echo "<option>".$r->market_name."</option>";
	}
}else{
	echo "<option disabled> No Markets Registered</option>";
}
	?>
</select>
</div>
      </div>
      <div class="form-group">
<label class="col-md-3">Product Category Sold</label>
<div class="col-md-6">
<select name='product_sold' class="form-control">
<option disabled selected>--Choose category--<option>
	<?php
if(!empty($products)){
	foreach($products as $r){
		echo "<option>".$r->product_name."</option>";
	}
}else{
	echo "<option disabled> No Products Registered</option>";
}
	?>
</select>
</div>
      </div>
      <div class="form-group">
<label class="col-md-3">National ID:</label>
<div class="col-md-6">
<input type="text" class="form-control" name="NINnumber" required />
</div>
      </div>
			<div class="form-group">
<label class="col-md-3">Email:</label>
<div class="col-md-6">
<input type="email" class="form-control" name="email"  />
</div>
			</div>
      <div class="form-group">
<label class="col-md-3">Password:</label>
<div class="col-md-6">
<input type="password" class="form-control" name="password" required/>
</div>
      </div>

      <!-- <div class="form-group">
<label class="col-md-3">Confirm Password:</label>
<div class="col-md-6">
<input type="password" class="form-control" name="cpwd"  />
</div>
      </div> -->

      <div class="form-group">
				<label class="col-md-3">&nbsp;</label>
				<div class="col-md-6">
					<input type="submit" value="Register" class="btn btn-primary" />
				</div>
			</div>
    </form>
  </div>
</div>
<?php include("shared/footer.php"); ?>
