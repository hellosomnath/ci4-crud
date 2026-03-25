<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="<?php echo base_url().'public/assets/css/bootstrap.min.css'; ?>">
	<title>CI4-CRUD <?php echo isset($page_title) ? esc($page_title) : ""; ?></title>
</head>
<body>
	<?php echo $this->renderSection('content'); ?>

	<script type="text/javascript" src="<?php echo base_url().'public/assets/js/jquery.min.js'; ?>"></script>
	<script type="text/javascript" src="<?php echo base_url().'public/assets/js/bootstrap.min.js'; ?>"></script>
</body>
</html>