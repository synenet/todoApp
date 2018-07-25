<?php 

$id = $_GET['id'];
//echo $id;
if (isset($_GET['id'])) {
	//run this block
	$file = file_get_contents("./todo.json");
	 
	$json_content = json_decode($file);
	
	$todoItem = $_GET["id"];
	$itemExist = false;

	for ($i=0; $i < sizeof($json_content->items); $i++) { 
		# code...
		if ($json_content->items[$i]->title == $todoItem) {
			$json_content->items[$i]->status = "done";
			
			file_put_contents("./todo.json", json_encode($json_content));
			header("Location: index.php?err=remove");
			break;
			
		}


	}



}

 ?>