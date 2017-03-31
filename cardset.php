<?php
session_start();

// Capture data the user input for the session
$flashcardsSideA = array();
$flashcardsSideA = $_SESSION['flashcardsSideA'];

$flashcardsSideB = array();
$flashcardsSideB = $_SESSION['flashcardsSideB'];

// Get a number to use that is the same length as the arrays
$cardCount = count($flashcardsSideA);

// Create an array and store the numbers from 1 to $cardCount in that array
$randomArray = array();

for($i = 1; $i < $cardCount; $i++) {
	$randomArray[] = $i;
}

// Shuffle the array
shuffle($randomArray);

// Arrays to store the randomized values
$front = array();
$rear = array();

for($i = 0; $i < $cardCount-1; $i++) {
	$front[$i] = $flashcardsSideA[intval($randomArray[$i])];
	$rear[$i] = $flashcardsSideB[intval($randomArray[$i])];	
}
?>


<!doctype html>
<html lang="en">
<head>
<!--Set the standard character set -->
<meta charset="utf-8">
<!--Force the viewport to render at 100% on most devices-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Michael Dryburgh">
<title>Flashcards</title>
<script type="text/javascript">
    function buildcards() {
		count = 0;
		front = <?php echo '["' . implode('", "', $front) . '"]' ?>;
		console.log(front);
		rear = <?php echo '["' . implode('", "', $rear) . '"]' ?>;
		console.log(rear);
		
		console.log(typeof(front[0]));
		
			currentClue = document.getElementById("clue");
			currentClue.innerHTML = front[0];
			
			currentSolution = document.getElementById("solution");
			currentSolution.innerHTML = rear[0];
			currentSolution.style.display = "none";
	};
	
	function revealSolution() {
		currentSolution.style.display = "inline";
	};
	
	function nextCard() {
		
		if(count < front.length-1) {
			count++;
		} else {
			count = 0;
		}
		
		currentClue.innerHTML = front[count];
		
		currentSolution.innerHTML = rear[count];
		currentSolution.style.display = "none";		
		
	};
</script>
</head>

<body onload="buildcards()" style="width: 100%">

<h5 style="margin-top: 0; margin-bottom: 0;">Clue:</h5>
<div style="width: 90%; height: 175px; padding: 10px; margin-top: 0; border: 1px solid black; overflow: scroll;">
<p id="clue"></p>
</div>

<h5 style="margin-top: 5px; margin-bottom: 0;">Solution (Click box to reveal):</h5>
<div onclick="revealSolution()" style="width: 90%; height: 175px; padding: 10px; border: 1px solid black; overflow: scroll;">
<p id="solution"></p>
</div>

<p>
<button onclick="nextCard()" style="width: 90%; height: 55px; padding: 10px;">Next Card</button></p>
<p><button onclick="location.href = 'index.php';" style="width: 125px; height: 55px; padding: 10px;">Add more cards to set</button>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<button onclick="location.href = 'cardset.php';" style="width: 125px; height: 55px; padding: 10px;">Shuffle<br> Cards</button>
</p>

</body>
</html>