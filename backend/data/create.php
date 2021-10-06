<?php
	include ('../element/header.php');
?>
<section>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
               <form method="post" action="store.php" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="input-title" class="h4">TITLE</label>
                        <input
                            type="text"
                            class="form-control"
                            id="input-title"
                            name="title"
                            value=""
                        	aria-describedby="emailHelp"
                        	placeholder="Enter Title">
                    </div>
                    <div class="form-group">
                        <label for="input-code" class="h4">CODE</label>
                        <input
                            type="text"
                            class="form-control"
                            id="input-code"
                            name="code"
                            value=""
                        	aria-describedby="emailHelp"
                        	placeholder="Enter Code">
                    </div>
                     <div class="form-group">
                        <label for="input-size" class="h4">SIZE</label>
                        <input
                            type="text"
                            class="form-control"
                            id="input-size"
                            name="size"
                            value=""
                            aria-describedby="emailHelp"
                            placeholder="Enter Size">
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
