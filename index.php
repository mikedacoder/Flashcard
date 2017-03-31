<?php
	session_start();
			
	if (!empty($_POST['sideA']))
		$_SESSION['sideA'] = $_POST['sideA'];
	if (!empty($_POST['sideB']))
		$_SESSION['sideB'] = $_POST['sideB'];	
	
	if (!is_array(@$_SESSION['flashcardsSideA'])){
	  $_SESSION['flashcardsSideA'] = array();
	}
	if (!is_array(@$_SESSION['flashcardsSideB'])){
	  $_SESSION['flashcardsSideB'] = array();
	}
	
	@$_SESSION['flashcardsSideA'][] = $_SESSION['sideA'];
	@$_SESSION['flashcardsSideB'][] = $_SESSION['sideB'];	

?>
<!doctype html>
<html lang="en">
<head>
<!--Set the standard character set -->
<meta charset="utf-8">
<!--Force the viewport to render at 100% on most devices-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Michael Dryburgh">
<title>Flashcard Builder</title>
</head>

<body>

	<form action="" method="post" style="width: 90%">
    <label for="sideA">Enter value to go on the front side of the fashcard:</label><br>
    <textarea name="sideA" id="sideA" rows="10" cols="40"></textarea><br>
    <label for="sideB">Enter value to go on the  rear side of the fashcard:</label><br>
    <textarea name="sideB" id="sideB" rows="10" cols="40"></textarea>
    <input type="hidden" name="PHPSESSID" value='<?php echo session_id() ?>' /><br>
    <p style="margin-top: 1%; margin-bottom: 1%;"><button type="submit" style="width: 100%; height: 50px; padding: 10px;">Add this flashcard to the set</button></p>	
    </form>
    
    <form action="cardset.php" method="post">
    <p style="margin-top: 1%; margin-bottom: 1%;"><button type="submit" style="width: 90%; height: 50px; padding: 10px;" />Quiz Me</button></p>
    </form>
    
    <form action="clear.php" method="post">
    <p style="margin-top: 1%; margin-bottom: 1%;"><button type="submit" style="width: 25%; height: 50px; padding: 10px;"/>Clear Card Set</button><br>Warning! Pressing this will delete all of the cards!</p>
    </form>    

</body>
</html>