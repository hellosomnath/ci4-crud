<?php echo $this->extend('layouts/default.php'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="text-center">Create</h1><hr>
			<form action="<?php echo base_url().'student/register'; ?>" method="post" enctype="multipart/form-data">
			  <div class="form-group">
			    <label>First Name*</label>
			    <input type="text" name="fname" class="form-control" placeholder="First Name">
			  </div>
			  <div class="form-group">
			    <label>Last Name*</label>
			    <input type="text" name="lname" class="form-control" placeholder="Last Name">
			  </div>
			  <div class="form-group">
			    <label>Email*</label>
			    <input type="email" name="email" class="form-control" placeholder="Email">
			  </div>
			  <div class="form-group">
			    <label>Phone</label>
			    <input type="text" name="phone" class="form-control" placeholder="Phone">
			  </div>
			  <div class="form-group">
			    <label>Image (jpg, png)</label>
			    <input type="file" name="image" class="form-control" placeholder="Phone">
			  </div>
			  <em>* fields are mandatory field</em>
			  <div class="btn-group pull-right">
			  <a href="<?= base_url('/student/list'); ?>" class="btn btn-primary">Back</a>
			  <button type="submit" class="btn btn-success pull-right">Submit</button>
			  </div>
			</form>
		</div>
	</div>


	<?php if (isset($validator)): ?>
		<div class="row">
			<div class="col-md-6 col-md-offset-3 alert alert-danger" style="margin-top: 10px;">
				<?php echo $validator->listErrors(); ?>
			</div>
		</div>
	<?php endif ?>
</div>

<?php echo $this->endSection('content'); ?>