<?php
	namespace PHP;
	use PDO;

	class Admin 
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

			$query = "SELECT * FROM `admin` ORDER BY `admin`.`id` DESC";

			$admins = $this-> conn-> prepare($query);
			$admins -> bindParam('name',$_name);
			$admins -> bindParam('email',$_email);
			$admins -> bindParam('password',$_password);

			$result = $admins->execute();
			
			return $admins;
		}
	 	public function store() 
	 	{
	 		session_start();

			$_name = $_POST['name'];
			$_email = $_POST['email'];
			$_password = $_POST['password'];
			$_picture = $this-> img_upload();			

			$query = "INSERT INTO 
						`admin`  (`name`,`email`,`password`,`picture`) 
						VALUES (:name , :email, :password, :picture);";

			$admins = $this-> conn-> prepare($query);
			$admins -> bindParam('name',$_name);
			$admins -> bindParam('email',$_email);
			$admins -> bindParam('password',$_password);
			$admins -> bindParam('picture',$_picture);

			$result = $admins->execute();
			
			// start session 
				if ($result){
				    $_SESSION ['message']= "Admin  is added successfully.";
				}
				else{
				    $_SESSION['message']= "Admin is not added successfully.";
				}
			// end session 

			header("location:index.php");
	 	}
	 	public function show()
	 	{
	 		$_id =$_GET['id'];

			$query = "SELECT * FROM `admin` WHERE id = :id";

			$admins = $this-> conn-> prepare($query);
			$admins -> bindParam('id',$_id);
			$result = $admins->execute();
			$admin = $admins->fetch();

			return $admin;
	 	}
	 	public function edit()
	 	{
	
		    $_id =$_GET['id'];

			$query = "SELECT * FROM `admin` WHERE id = :id";

			$admins = $this-> conn-> prepare($query);
			$admins -> bindParam('id',$_id);
			$result = $admins->execute();
			$admin = $admins->fetch();

			return $admin;
	 	}
	 	public function update()
	 	{
	 		session_start();

			$_id = $_POST ['id'];
			$_name = $_POST['name'];
			$_email = $_POST['email'];
			$_password = $_POST['password'];
			$_picture = $this-> img_upload();


			$query = "UPDATE 
						`admin`  
						SET 
						 `name` = :name,
						 `email` = :email,
						 `password` = :password,
						 `picture` = :picture
						WHERE `admin`.`id`=:id; ";

			$admins = $this-> conn-> prepare($query);
			$admins -> bindParam('id',$_id);
			$admins -> bindParam('name',$_name);
			$admins -> bindParam('email',$_email);
			$admins -> bindParam('password',$_password);
			$admins -> bindParam('picture',$_picture);


			$result = $admins -> execute();

			// start session 
				if ($result){
				    $_SESSION ['message']= "Admin  is edit successfully.";
				}
				else{
				    $_SESSION['message']= "Admin  is not edit";
				}
			// end session

			header("location:index.php");
	 	}
	 	public function delete()
	 	{
	 		session_start();
	 		$_id = $_GET['id'];

		    $query = "DELETE FROM `admin` WHERE `admin`.`id` = :id";

		    //prepare a statement
		    $admins =  $this-> conn->prepare($query);
		    $admins->bindParam(':id',$_id);

		    $result = $admins->execute();

		    // start session 
		        if ($result){
		            $_SESSION ['message']= "Admin is delete successfully.";
		        }
		        else{
		            $_SESSION['message']= "Admin  is deleted";
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
	 	public function login( $_name, $_password)
	 	{
	 		session_start();
	        $query = "SELECT COUNT(*)AS total FROM `admin` WHERE name LIKE :name AND password LIKE :password ";

	        $admins = $this->conn->prepare($query);

	        $admins->bindParam(':name',$_name);
	        $admins->bindParam(':password',$_password);

	        $result = $admins->execute();

	        $totalfound = $admins-> fetch();

	        if($totalfound['total'] > 0){
	            $_SESSION['is_authenticated']= true;

	            header("location:http://localhost/PHP/backend/admin/welcome.php");
	        }else{
	            $_SESSION['is_authenticated']= false;
	            header("location:http://localhost/PHP/backend/404.php?error=User Or Password doesn't match");
	        }
 			// start session msg
	         if ($result){
		            $_SESSION ['message']= "Welcome to admin Dashboard";
		        }
		        else{
		            $_SESSION['message']= "Welcome";
		        }
    	}
	 		
	    
	}//End of class 
	
?>
