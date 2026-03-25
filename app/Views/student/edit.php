<?php echo $this->extend('layouts/default.php'); ?>

<?php echo $this->section('content'); ?>

<div class="container">
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1 class="text-center">Create</h1><hr>
			<form action="<?php echo base_url().'student/update/' . base64_encode($student['id']); ?>" method="post" enctype="multipart/form-data">
				<input type="hidden" name="_method" value="PUT">
				<input type="hidden" name="id" value="<?= $student['id']; ?>">
			  <div class="form-group">
			    <label>First Name*</label>
			    <input type="text" name="fname" class="form-control" placeholder="First Name" value="<?= $student['first_name']; ?>">
			  </div>
			  <div class="form-group">
			    <label>Last Name*</label>
			    <input type="text" name="lname" class="form-control" placeholder="Last Name" value="<?= $student['last_name']; ?>">
			  </div>
			  <div class="form-group">
			    <label>Email*</label>
			    <input type="email" name="email" class="form-control" placeholder="Email" value="<?= $student['email']; ?>" readonly>
			  </div>
			  <div class="form-group">
			    <label>Phone</label>
			    <input type="text" name="phone" class="form-control" placeholder="Phone" value="<?= $student['phone']; ?>">
			  </div>
			  <div class="form-group">
			    <label>Image (jpg, png)</label>
			    <input type="file" name="image" class="form-control" placeholder="Phone">
			    <?php if ($student['image']): ?>
					<img src="<?php echo  base_url() . 'public/uploads/' . $student['image'] ?>" class="img img-thumbnail" width="100px">
				<?php endif ?>
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