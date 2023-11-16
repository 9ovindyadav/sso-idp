<?php 
require("./meta-data.php"); 
session_start();
?>

<nav class="navbar navbar-expand-lg px-lg-5">
	<a class="navbar-brand" href="/">
	   <img src="./assets/logo.svg" width="30" height="30">
	   <?= $company ?>
	</a>
	<button 
		class="navbar-toggler" 
		type="button" 
		data-toggle="collapse" 
		data-target="#navbarNav" 
		aria-controls="navbarNav" 
		aria-expanded="false" 
		aria-label="Toggle navigation">
	    <img src="./assets/icons/menu.svg" alt="">
	</button>
	<div 
		class="collapse navbar-collapse" 
		id="navbarNav">
		<ul class="navbar-nav ml-auto">
			<li class="nav-item">
			  	<a class="nav-link"
			  		href="/">
			  		Home
			  	</a>
			</li>
			<li class="nav-item">
			  	<a class="nav-link"
			  		href="/about">
			  		About
			  	</a>
			</li>
			    
		</ul>
	    <?php 
	    	if(isset($_SESSION['email'])){
	    		echo '<ul class="navbar-nav ml-auto">
	      	<li class="nav-item">
	        	<a class="nav-link"
	        		href="/profile">
	        		Profile
	        	</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link"
	        		href="/logout">
	        		Logout
	        	</a>
	      	</li>
	    </ul>';
	    	}else{
	    		echo '<ul class="navbar-nav ml-auto">
	      	<li class="nav-item">
	        	<a class="nav-link"
	        		href="/login">
	        		Login
	        	</a>
	      	</li>
	      	<li class="nav-item">
	        	<a class="nav-link"
	        		href="/signup">
	        		Sign up
	        	</a>
	      	</li>
	    </ul>';
	    	}
	    ?>
	    
	</div>
</nav>
