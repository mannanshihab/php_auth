<?php
	include ('../element/header.php');
?>
<?php
   include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

    use PHP\Data;
    $_product = new Data();
    $product = $_product->show();
?>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <dl class="table table-bordered text-center">
                    <dt>ID</dt>
                    <dd><?= $product['id']; ?></dd>

                    <dt>Title</dt>
                    <dd><?= $product['title']; ?></dd>
                    <dt>Code</dt>
                    <dd><?= $product['code']; ?></dd>
                    <dt>image</dt>
                    <dd><img class="img-fluid" 
                            src="<?php echo $webroot; ?>uploads/<?= $product['picture']; ?>" 
                            alt="card image"></dd>
                    <dd><?= $product['created_at']; ?></dd>
                </dl>
            </div>
        </div>
    </div>

</section>
<?php
	include ('../element/footer.php');
?>
