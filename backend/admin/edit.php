<?php
	include ('../element/header.php');
?>
<?php
    include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

    use PHP\Admin;
    $_admin = new Admin();
    $admin = $_admin->edit();
?>
<section>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
               <form method="post" action="update.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="input-id" class="h4"></label>
                        <input
                            type="hidden"
                            class="form-control"
                            id="input-id"
                            name="id"
                            value="<?= $admin ['id'];?>"
                            aria-describedby="emailHelp"
                            placeholder="Enter ID">
                    </div>
                    <div class="form-group">
                        <label for="input-name" class="h4">User Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="input-name"
                            name="name"
                            value="<?= $admin ['name'];?>"
                            aria-describedby="emailHelp"
                            placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                        <label for="input-email" class="h4">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="input-email"
                            name="email"
                            value="<?= $admin ['email'];?>"
                            aria-describedby="emailHelp"
                            placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="input-password" class="h4">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="input-password"
                            name="password"
                            value="<?= $admin ['password'];?>"
                            aria-describedby="emailHelp"
                            placeholder="Enter password">
                    </div>
                    <div class="form-group">
                        <label for="input-img">Picture</label>
                        <input
                            type="file"
                            class="form-control-file"
                            id="input-img"
                            name="picture"
                            value="<?= $product ['picture']; ?>">
                         <input
                            type="hidden"
                            name="old_picture"
                            value="<?= $product ['picture'];?>">
                        <img class="img-profile mt-2 img-fluid rounded-circle" src="<?php echo $webroot; ?>uploads/<?= $admin['picture']; ?>">
                    </div> 
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>

                </form>
            </div>
        </div>
    </div>
</section>
