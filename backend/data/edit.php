<?php
	include ('../element/header.php');
?>
<?php
    include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

    use PHP\Data;
    $_product = new Data();
    $product = $_product->edit();
?>
<section>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-6">
               <form method="post" action="update.php" enctype="multipart/form-data">
                     <div class="form-group">
                        <!-- <label for="input-id" class="h4">ID</label> -->
                        <input
                            type="hidden"
                            class="form-control"
                            id="input-id"
                            name="id"
                            value="<?= $product ['id'];?>"
                            aria-describedby="emailHelp"
                            placeholder="Enter ID">
                    </div>
                    <div class="form-group">
                        <label for="input-title" class="h4">TITLE</label>
                        <input
                            type="text"
                            class="form-control"
                            id="input-title"
                            name="title"
                            value="<?= $product ['title'];?>"
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
                            value="<?= $product ['code'];?>"
                        	aria-describedby="emailHelp"
                        	placeholder="Enter Product Code">
                    </div>
                    <div class="form-group">
                        <label for="input-size" class="h4">SIZE</label>
                        <input
                            type="text"
                            class="form-control"
                            id="input-size"
                            name="size"
                            value="<?= $product ['size'];?>"
                            aria-describedby="emailHelp"
                            placeholder="Enter Product Size">
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
                    </div> 
                    <button type="submit" class="btn btn-primary mt-5">Submit</button>
                </form>
            </div>
        </div>
    </div>
</section>
