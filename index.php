

 <!DOCTYPE html>
 <html>
 <head>
 	<link rel="stylesheet" type="text/css" href="style.css">
 	<title> Sample Todo App</title>
 	<!-- Bootstrap CSS -->
 	<!-- <link rel="stylesheet" href="dist/css/bootstrap.css"> -->
 	<script type="text/javascript" src="dist/js/bootstrap.js"></script>
 	
 	<style type="text/css">
 	body{
 		background-color: #b0e0e6;
 		font-family: "Roboto", sans-serif;
		color:#222;
 	}	
 	.wrapper{
		max-width: 300px;
		margin: 0 auto;
		align-content: center;
		padding: 20px 14px;
		text-align: center;
		background-color: #fff;
		border: solid 1px #4eaae0;
		border-radius: 5px;
		box-shadow: 3px 3px 3px #3b9db3;

 	}
 	.txt{

 		text-align: center;
 	}

 	.report{
 		padding:7px;
 		color: #fff;
 		background-color: #b0e0e6;
 		
 	}
		.report3{
		padding:7px;
		background-color: pink;
		color:#fff;
	}
	.report2{
	
		background-color: #b91c39fa;
		padding:7px;
 		color: #fff;
	}

	ul.list{
		text-align: left;
	}

	ul.list li {
		line-height: 25px;
		display: flex;
		justify-content:space-between;
		margin-bottom: 5px;
		font-size: .8em;
		font-weight: bold

		}
	.input {
		background-color: #3b9db3;
	    padding: 5px;
	    color: #fff;
	    text-decoration: none;
	    border-radius: 3px;
	    font-size: .8em;
		border: solid 1px #3b9db3
		}
	input[type="text"]{
			padding: 5px;
			border:solid 1px #3b9db3
		}
	.done{
		display: inline-block;
		margin-left:30px;
	}

	.done a{
		background-color: #b0e0e6;
	    padding: 5px;
	    color: #5a5757;
	    text-decoration: none;
	    border-radius: 4px;
	    font-size: .8em;
		border: solid 1px #3b9db3
	}

	.done a:hover{
		box-shadow: 3px 3px 5px #ddd;
	}
 	</style>
 </head>
 <body>
 <div class="wrapper">

	<?php 

		if (!empty($_GET)) {
		# code...

			if ($_GET['err'] == 'none') {
			# code...
			echo "<div class='report'><b>Your input has been added!</b></div>";
		}else if($_GET['err'] == 'item_exist'){
			echo "<div class='report3'><b>Your item already exist!</b></div>";
		}else if($_GET['err'] == 'remove'){
			echo "<div class='report2'><b>You just removed an item!</b></div>";
		}
	}
		
	?>
 	<div class="txt">
	 	<h1> Todo App</h1>
	 	<form action="todo.php" method="POST">
	 		<input type="text" placeholder="Enter todo item..." name="todo_item" />
	 		<input type="submit" value="Add Item" name="add_item" class="input" />
	 	</form>
	 
	 	<div class="todo-items">
	 	<ul class="list">

	 		<?php
	 			$file = file_get_contents("./todo.json");
				
				$json_content = json_decode($file);
				
				for ($i=0; $i < sizeof($json_content->items); $i++) { 
					if ($json_content->items[$i]->status=="open") {
					
					echo "<li>".$json_content->items[$i]->title."<span class='done'> <a href='edit.php?id=".$json_content->items[$i]->title."'>Done</a> </span></li>";
				
					
					}
					

					}



	 		?>
	 
	 	</ul>
	 	</div>

	 	</div>
 </div>
 </body>


 </html>