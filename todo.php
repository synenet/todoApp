<!-- #Process


#note
file handling
create a json file to handle the file
create a conditionals to check if form is submitted
 -->

<?php 
// check if form is submitted

//var_dump($_POST)
if (isset($_POST['add_item'])) {
	//run this block
	$file = file_get_contents("./todo.json");

	$json_content = json_decode($file);

	$todoItem = $_POST["todo_item"];
	$itemExist == false;

	for ($i=0; $i < sizeof($json_content->items); $i++) { 
		# code...
		if ($json_content->items[$i]->title == $todoItem) {
			//item exists ,dont save ,return
			$itemExist = true;
			break;
			header("Location: index.php?err=item_exist");

	}


	

}

if ($itemExist == false ) {
		array_push($json_content->items, [
		"title" => $todoItem,
		"date_created" => date('Y-m-d'),
		"status" => "open"
		]);
		//update and save file
		file_put_contents("./todo.json", json_encode($json_content));
		header("Location: index.php?err=none");

		echo "<h1>Todo item Added</h1>";
}else{

	header("Location: index.php?err=item_exist");
	return;
}

}

 ?>
