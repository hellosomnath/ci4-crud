<?= $this->extend('layouts/default.php'); ?>


<?= $this->section('content'); ?>
<div class="container">
	<?php if (session()->getFlashdata('status')): ?>
		<div class="row alert alert-success">
			<?php echo session()->getFlashdata('status'); ?>
		</div>
	<?php endif ?>
	<h1>List</h1>
	<a href="<?= base_url('student/register'); ?>" class="btn btn-success btn-sm pull-right">Create</a>
	<table class="table table-hover">
	 	<thead>
		    <tr>
		      <th>#</th>
		      <th>Image</th>
		      <th>Name</th>
		      <th>Email</th>
		      <th>Phone</th>
		      <th>Action</th>
		    </tr>
	  	</thead>
	  	<tbody>
	  		<?php if (empty($students[0])): ?>
	  			<tr><td colspan="6"><h4 class="text-center">No data found</h4><td><tr>
	  		<?php else: ?>
		  		<?php foreach ($students as $key => $student): ?>
		  			<tr>
		  				<td>
		  					<?php if ($student['image']): ?>
			  					<img src="<?php echo  base_url() . 'public/uploads/' . $student['image'] ?>" class="img img-circle" width="50px">
		  					<?php endif ?>
		  				</td>
		  				<td><?php echo $key+1 ?></td>
			  			<td><?php echo $student['first_name'] . " " . $student['last_name']; ?></td>
			  			<td><?php echo $student['email']; ?></td>
			  			<td><?php echo ($student['phone'] != 0) ? $student['phone'] : ""; ?></td>
			  			<td>
			  				<!-- <a href="<?= base_url('student/view' . $student['id']); ?>" class="btn btn-info btn-sm">View</a> -->
			  				<a href="<?= base_url('student/edit/' . base64_encode($student['id'])); ?>" class="btn btn-primary btn-sm">Edit</a>
			  				<a href="<?= base_url('student/delete/' . base64_encode($student['id'])); ?>" class="btn btn-danger btn-sm">Delete</a>
			  			</td>
		  			</tr>
		  		<?php endforeach ?>		
	  		<?php endif ?>
	 	</tbody>
	</table>
</div>
<?= $this->endSection('content'); ?>