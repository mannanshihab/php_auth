<?php
	include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

	use PHP\Admin;
	$_admin = new Admin();
	$admins = $_admin->index();
?>
<?php
	include ('../element/header.php');
?>

<section class="content">
	<div class="container">
		<div class="col-md-4 col-sm-8 col-xs-6"></div>
		<div class=" row justify-content-center text-center">
			<h4 style=" margin-bottom: 20px;">
				<?php
				echo $_SESSION['message'];
				$_SESSION ['message']= " ";
				?>
			</h4>
		</div>
		<div class="col-md-4 col-sm-8 col-xs-6">
			<?php foreach ($admins as $admin):?>
	            <div class="card text-center p-5">
	            	<img class="img-profile img-fluid rounded-circle" src="<?php echo $webroot; ?>uploads/<?= $admin['picture']; ?>">
	                <div class="card-body">
	                   UserName : <?= $admin ['name']?>
	                </div>
	                <div >
	                    Email : <?= $admin ['email']?>
	                </div>
	                <div class="mt-5">
		                <a href="edit.php?id=<?= $admin['id']?>">
						<button class="btn btn-danger">Setting</button>	
	                </div>
	            </div>
            <?php endforeach;?>
        </div>
	</div>
</section>

<?php
	include ('../element/footer.php');
?>
