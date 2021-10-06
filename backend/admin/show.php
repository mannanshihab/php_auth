<?php
	include ('../element/header.php');
?>
<?php
   include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

    use PHP\Admin;
    $_admin = new Admin();
    $admin = $_admin->show();
?>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <dl class="table table-bordered text-center">
                    <dt>ID</dt>
                    <dd><?= $admin['id']; ?></dd>

                    <dt>User Name</dt>
                    <dd><?= $admin['name']; ?></dd>
                    <dt>Email</dt>
                    <dd><?= $admin['email']; ?></dd>
                    <dt>Password</dt>
                    <dd><?= $admin['password']; ?></dd>
                </dl>
            </div>
        </div>
    </div>

</section>
<?php
	include ('../element/footer.php');
?>
