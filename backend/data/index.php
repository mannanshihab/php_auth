<?php
	include_once ($_SERVER ['DOCUMENT_ROOT']."/PHP/config.php");

	use PHP\Data;
	$_product = new Data();
	$products = $_product->index();
?>
<?php
	include ('../element/header.php');
?>

<section class="content">

	<div class="container-fluid">
	<!-- Responsive DataTales Example -->
	<div class="card shadow mb-4">
	  <div class="card-header py-3">
			<h5 class="text-center text-primary text-uppercase">Product</h5>
	    <div>
			<a href="create.php"><button class="btn btn-primary"> ADD </button></a>
		</div>
		<div class=" row justify-content-center text-success">
			<h4 style=" margin-bottom: 20px;">
			<?php
				
				echo $_SESSION['message'];
				$_SESSION ['message']= " ";
			?>
			</h4>
		</div>
	  </div>
	  <div class="card-body">
	    <div class="table-responsive">
	      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	        <thead class="text-center">
				<tr>
					<th scope="col">TITLE</th>
					<th scope="col">CODE</th>
					<th scope="col">SIZE</th>
					<th scope="col">PICTURE</th>
					<th scope="col">Action</th>
				</tr>						
			</thead>
			<tbody class="text-center">
					<?php foreach ($products as $product):?>
				<tr>
					<td><a><?= $product ['title']?></a></td>
					<td><?= $product ['code']?></td>
					<td><?= $product ['size']?></td>
					<td>
						<img src=" <?php echo $webroot; ?>uploads/<?= $product['picture']; ?>"width="50px">
					</td>	
					<td>
						<a class="btn btn-info" 
							href="show.php?id= <?= $product ['id']?>">
							<i class="fas fa-eye"></i>
						</a>
						<a class="btn btn-dark" 
							href="edit.php?id= <?= $product ['id']?>">
							<i class="fas fa-pencil-alt"></i>
						</a>
						<a class="btn btn-danger" 
							href="delete.php?id= <?= $product ['id']?>">
							<i class="fas fa-trash"></i>
						</a>
					</td>

				</tr>
				 	 <?php endforeach;?>
			</tbody> 
	      </table>
	    </div>
	  </div>
	</div>
	</div>
	<!-- Responsive DataTales Example -->
</section>

<?php
	include ('../element/footer.php');
?>
