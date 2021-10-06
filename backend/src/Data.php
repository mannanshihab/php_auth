<?php
	namespace PHP;
	use PDO;

	class Data 
	//Start of class
	{
		public function __construct()
	    {
	        //database connection useing pdo
			$this-> conn = new PDO ("mysql:host = localhost; dbname=php_db","root","");
			//PDO
			$this-> conn-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	    }
		public function index()
		{
			// session_start();

			$query = "SELECT * FROM `boy` ORDER BY `boy`.`id` DESC";

			$products = $this-> conn-> prepare($query);
			$products -> bindParam('title',$_title);
			$products -> bindParam('code',$_code);
			$products -> bindParam('picture',$_picture);
			$products -> bindParam('size',$_size);

			$result = $products->execute();
			return $products;
		}

		public function getindex()
		{
			// session_start();

			$query = "SELECT * FROM `boy` ORDER BY `boy`.`id` DESC";

			$products = $this-> conn-> prepare($query);
			$products -> bindParam('title',$_title);
			$products -> bindParam('code',$_code);
			$products -> bindParam('picture',$_picture);
			$products -> bindParam('size',$_size);

			$result = $products->execute();
			return $products;
		}
	 	
	 	public function store() 
	 	{
	 		session_start();

			$_title = $_POST['title'];
			$_code = $_POST['code'];
			$_picture = $this-> img_upload();
			$_size = $_POST['size'];
			$_created_at = date('Y-m-d h:i:s', time());
			

			$query = "INSERT INTO 
						`boy`  (`title`,`code`,`picture`, `size`, `created_at` ) 
						VALUES (:title , :code , :picture, :size, :created_at);";

			$products = $this-> conn-> prepare($query);
			$products -> bindParam('title',$_title);
			$products -> bindParam('code',$_code);
			$products -> bindParam('picture',$_picture);
			$products -> bindParam('size',$_size);
			$products -> bindParam('created_at', $_created_at);

			$result = $products->execute();
			
			// start session 
				if ($result){
				    $_SESSION ['message']= "Product is added successfully.";
				}
				else{
				    $_SESSION['message']= "Product is not added successfully.";
				}
			// end session 

			header("location:index.php");
	 	}

	 	public function show()
	 	{
	 		$_id =$_GET['id'];

			$query = "SELECT * FROM `boy` WHERE id = :id";

			$products = $this-> conn-> prepare($query);
			$products -> bindParam('id',$_id);
			$result = $products->execute();
			$product = $products->fetch();

			return $product;
	 	}

	 	public function getshow()
	 	{
	 		$_id =$_GET['id'];

			$query = "SELECT * FROM `boy` WHERE id = :id";

			$products = $this-> conn-> prepare($query);
			$products -> bindParam('id',$_id);
			$result = $products->execute();
			$product = $products->fetch();

			return $product;
	 	}

	 	public function edit()
	 	{
	 		// session_start();
	
		    $_id =$_GET['id'];

			$query = "SELECT * FROM `boy` WHERE id = :id";

			$products = $this-> conn-> prepare($query);
			$products -> bindParam('id',$_id);
			$result = $products->execute();
			$product = $products->fetch();

			return $product;
	 	}

	 	public function update()
	 	{
	 		session_start();

			$_id = $_POST ['id'];
			$_title = $_POST['title'];
			$_code = $_POST['code'];
			$_size = $_POST['size'];
			$_picture = $this-> img_upload();


			$query = "UPDATE 
						`boy`  
						SET 
						`title` = :title ,
						 `code` = :code ,
						 `size` = :size ,
						 `picture` = :picture
						WHERE `boy`.`id`=:id; ";

			$products = $this-> conn-> prepare($query);
			$products -> bindParam('id',$_id);
			$products -> bindParam('title',$_title);
			$products -> bindParam('code',$_code);
			$products -> bindParam('size',$_size);
			$products -> bindParam('picture',$_picture);

			$result = $products -> execute();

			// start session 
				if ($result){
				    $_SESSION ['message']= "Product is edit successfully.";
				}
				else{
				    $_SESSION['message']= "Product is not edit";
				}
			// end session

			header("location:index.php");
	 	}

	 	public function delete()
	 	{
	 		session_start();
	 		$_id = $_GET['id'];

		    $query = "DELETE FROM `boy` WHERE `boy`.`id` = :id";

		    //prepare a statement
		    $products =  $this-> conn->prepare($query);
		    $products->bindParam(':id',$_id);

		    $result = $products->execute();

		    // start session 
		        if ($result){
		            $_SESSION ['message']= "Product is delete successfully.";
		        }
		        else{
		            $_SESSION['message']= "Product is deleted";
		        }
	    	// end session
		    
		    header("location:index.php");
	 	}
	 	private function img_upload()
		{
			//Strat image upload Code.........*
			$approot = $_SERVER ['DOCUMENT_ROOT']."/PHP/backend/";
			$webroot = "http://localhost/PHP/backend/";
			$_picture =null;

			if ($_FILES ['picture'] ['name']!="") {
			$target = $_FILES['picture']['tmp_name'];
			$destination = $approot.'uploads/' . $_FILES['picture']['name'];
			$is_file_moved = move_uploaded_file($target, $destination);

			if($is_file_moved){
			    $_picture =$_FILES['picture']['name'];
			}
			}
			else
			{
				if($_POST ['old_picture'])
				{
					$_picture =$_POST ['old_picture'];
				}
			}
			return $_picture;
		}
	}//End of class 
	
?>
