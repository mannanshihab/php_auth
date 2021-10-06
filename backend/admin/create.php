<?php
	include ('../element/header.php');
?>
<section>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
               <form method="post" action="store.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="input-name" class="h4">User Name</label>
                        <input
                            type="text"
                            class="form-control"
                            id="input-name"
                            name="name"
                            value=""
                        	aria-describedby="emailHelp"
                        	placeholder="Enter User Name" required>
                    </div>
                    <div class="form-group">
                        <label for="input-email" class="h4">Email</label>
                        <input
                            type="email"
                            class="form-control"
                            id="input-email"
                            name="email"
                            value=""
                        	aria-describedby="emailHelp"
                        	placeholder="Enter email" required>
                    </div>
                     <div class="form-group">
                        <label for="input-password" class="h4">Password</label>
                        <input
                            type="password"
                            class="form-control"
                            id="input-password"
                            name="password"
                            value=""
                            aria-describedby="emailHelp"
                            placeholder="Enter password" required>
                    </div>
                    <div>
                        <label for="input-img" class="h4">Picture</label>
                        <input
                                type="file"
                                class="form-control-file"
                                id="input-img"
                                name="picture"
                                value="">
                    </div>
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
<?php
	include ('../element/footer.php');
?>
