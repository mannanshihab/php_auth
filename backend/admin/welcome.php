<?php
	include ('../element/header.php');
?>
<?php
	include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

	use PHP\Admin;
    $_admin = new Admin();
    $admins = $_admin->index();
?>
<section>
	<div class=" row justify-content-center text-success mt-5">
		<h1 style=" margin-bottom: 20px;">
			<?php
				echo $_SESSION['message'];
				$_SESSION ['message']= " ";
			?>
		</h1>    
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
            </div>
        <?php endforeach;?>
    </div>
	
</section>
<?php
	include ('../element/footer.php');
?>
