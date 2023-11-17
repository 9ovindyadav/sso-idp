<?php require("./meta-data.php");
	require_once(__DIR__."/../db/admin.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    if (isset($_POST['add_user'])) {
        addUser($_POST['full-name'], $_POST['email'], $_POST['dob'],$_POST['country']);
        header("location: /profile");
        exit();
    } elseif (isset($_POST['update_user'])) {

        updateUser($_POST['full_name'], $_POST['email'],$_POST['country'],$_POST['user_id']);
        header("location: /profile");
        exit();
    } elseif (isset($_POST['delete_user'])) {
        deleteUser($_POST['user_id']);
    }
}

// Get users for display
$users = getUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Profile</title>
	<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="./views/css/bootstrap-4.6.2/css/bootstrap.min.css">
	<script defer src="./views/css/bootstrap-4.6.2/js/bootstrap.bundle.min.js"></script>	

	<link rel="stylesheet" href="./views/css/index.css">
	<script defer src="./views/js/app.js"></script>		
</head>
<body>
	<?php require("./views/header.php");
			// session_start();
			$name = $_SESSION['full_name'];
	 ?>
	 <div class="container">
	 	<div class="row">
	 		<div class="col-md-6 mx-auto my-5">
	 			 <h1 class="mb-5">Welcome <?php echo $name ?></h1>
	 			<a class="btn btn-primary" href="/reset">Reset Password</a>
	 			<a class="btn btn-secondary" href="/delete-account">Delete Account</a>
	 			<!-- Button trigger modal -->
	 			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-new-user">
	 			  Add user
	 			</button>

	 			
	 			</div>
	 		</div>
	 	</div>

	 	<div class="row">
	 		<div class="col">
	 			<table class="table">
	 			  <thead class="thead-dark">
	 			    <tr>
	 			      <th scope="col">Sr no</th>
	 			      <th scope="col">Name</th>
	 			      <th scope="col">Email</th>
	 			      <th scope="col">Date of Birth</th>
	 			      <th scope="col">Country</th>
	 			      <th scope="col"></th>
	 			    </tr>
	 			  </thead>
	 			  <tbody>

	 			  	<?php foreach ($users as $user): ?>
	 			  	    <tr>
	 			  	        <td><?= $user['user_id'] ?></td>
	 			  	        <td><?= $user['full_name'] ?></td>
	 			  	        <td><?= $user['email'] ?></td>
	 			  	        <td><?= $user['date_of_birth'] ?></td>
	 			  	        <td><?= $user['country'] ?></td>
	 			  	        <td>
	 			  	            <!-- Button to trigger the modal -->
	 			  	            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#update-user-modal-<?= $user['user_id'] ?>">
	 			  	                Update
	 			  	            </button>

	 			  	            <form method="post" style="display: inline;">
	 			  	                           <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
	 			  	                           <button type="submit" name="delete_user" class="btn btn-danger">Delete</button>
	 			  	                       </form>

	 			  	            <!-- Modal -->
	 			  	            <div class="modal fade" id="update-user-modal-<?= $user['user_id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	 			  	                <div class="modal-dialog">
	 			  	                    <div class="modal-content">
	 			  	                        <div class="modal-header">
	 			  	                            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
	 			  	                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	 			  	                                <span aria-hidden="true">&times;</span>
	 			  	                            </button>
	 			  	                        </div>
	 			  	                        <div class="modal-body">
	 			  	                            <!-- Update form with pre-filled values -->
	 			  	                            <form method="post">
	 			  	                                <input type="hidden" name="user_id" value="<?= $user['user_id'] ?>">
	 			  	                                <div class="form-group">
	 			  	                                    <label for="full_name">Full Name</label>
	 			  	                                    <input type="text" class="form-control" id="full_name" name="full_name" value="<?= $user['full_name'] ?>" required>
	 			  	                                </div>
	 			  	                                <div class="form-group">
	 			  	                                    <label for="email">Email</label>
	 			  	                                    <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
	 			  	                                </div>
	 			  	                                <div class="form-group">
	 			  	                                    <label for="date_of_birth">Date of Birth</label>
	 			  	                                    <input type="date" class="form-control" id="date_of_birth" name="date_of_birth" value="<?= $user['date_of_birth'] ?>" required>
	 			  	                                </div>
	 			  	                                <div class="form-group">
	 			  	                                    <label for="country">Country</label>
	 			  	                                    <select 
	 			  	                                    	class="form-control" 
	 			  	                                    	name="country" 
	 			  	                                    	id="country">
	 			  	                                       <option>Select your country...</option>
	 			  	                                       <?php 
	 			  	                                       $newArr = array_map(function($country){
	 			  	                                       	return "<option>".$country."</option>";
	 			  	                                       }, $countries);

	 			  	                                       echo(implode("", $newArr));
	 			  	                                       ?>
	 			  	                                     </select>
	 			  	                                </div>
	 			  	                                <button type="submit" name="update_user" class="btn btn-primary">Update</button>
	 			  	                            </form>
	 			  	                        </div>
	 			  	                    </div>
	 			  	                </div>
	 			  	            </div>
	 			  	        </td>
	 			  	    </tr>
	 			  	<?php endforeach; ?>

	 			    
	 			  </tbody>
	 			</table>

	 		</div>
	 	</div>
	 </div>


	 <!-- Modal -->
	 <div class="modal fade" id="add-new-user" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	   <div class="modal-dialog">
	     <div class="modal-content">
	       <div class="modal-header">
	         <h5 class="modal-title" id="exampleModalLabel">Add new user</h5>
	         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
	           <span aria-hidden="true">&times;</span>
	         </button>
	       </div>
	       <div class="modal-body">
	         <form method="POST">
	         	<div class="row">
	         		<div class="col-6 form-group">
	         		    <label for="full-name">Full name</label>
	         		    <input 
	         		    	type="text" 
	         		    	class="form-control" 
	         		    	id="full-name"
	         		    	name="full-name" 
	         		    	placeholder="Enter your full name">
	         		</div>
	         		<div class="col-6 form-group">
	         		      <label for="email">Email address</label>
	         		      <input 
	         		      	type="email" 
	         		      	class="form-control" 
	         		      	name="email" 
	         		      	id="email" 
	         		      	placeholder="name@example.com">
	         		</div>
	         	</div>
	         	<div class="row">
	         		<div class="col-6 form-group">
	         		    <label for="date-of-birth">Date of birth</label>
	         		    <input 
	         		    	type="date" 
	         		    	class="form-control" 
	         		    	name="dob" 
	         		    	id="date-of-birth" 
	         		    	placeholder="Enter your full name">
	         		</div>
	         		<div class="col-6 form-group">
	         		    <label for="country">Country</label>
	         		    <select 
	         		    	class="form-control" 
	         		    	name="country" 
	         		    	id="country">
	         		       <option>Select your country...</option>
	         		       <?php 
	         		       $newArr = array_map(function($country){
	         		       	return "<option>".$country."</option>";
	         		       }, $countries);

	         		       echo(implode("", $newArr));
	         		       ?>
	         		     </select>
	         		</div>
	         	</div>
	         	
	         	<div class="row my-3">
	         		<div class="col">
	         			<button type="reset" class="btn btn-secondary w-100">Cancel</button>
	         		</div>
	         		<div class="col">
	         			<button type="submit" name="add_user" class="btn btn-primary w-100">Sign up</button>
	         		</div>
	         	</div>
	         </form>
	       </div>

	     </div>
	   </div>

	   
</body>
</html>