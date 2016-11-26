<?php
	session_start();
?>

<html>
<head>
    <link rel="stylesheet" href="style.css">    
</head>    
    
<body>
    <div>
<?php
	$con = mysqli_connect("localhost", "root", "password", "dondershack");
	//session_destroy();
	if (!isset($_SESSION['unit_id'])){
		$_SESSION['unit_id'] = 0;
		echo "<form action = '' method='post'><input class='button' type='submit' name = 'startButton' value='Begin' /></form>";
	}else{
		if(isset($_POST["startButton"]) || isset($_POST["nextUnitButton"])){
					$_SESSION['unit_id'] ++;
					$myfile = fopen("".$_SESSION['unit_id'].".txt", "r") or die("Unable to open file!");
					echo fread($myfile,filesize("".$_SESSION['unit_id'].".txt"));
					fclose($myfile);
					echo "<form class='form' action = '' method='post'><input class='button' type='submit' name = 'startTestButton' value='Start Test' /></form>";

					$sql = "SELECT word FROM testWord where unit_id = ".$_SESSION['unit_id'].";";
					$result = mysqli_query($con,$sql);
					$help = mysqli_fetch_assoc($result);
					$array = array();
					while ($help != NULL) {
						array_push($array, htmlentities($help['word']));
						$help = mysqli_fetch_assoc($result);
					}
					$_SESSION['currentWords'] = $array;
		}
		
		if(isset($_POST["startTestButton"]) || isset($_POST["nextWordButton"])){
				echo $_SESSION['currentWords'][0];
				echo "<form class='form' action = '' method='post'><textarea name = 'word_input' rows='4' cols='50'></textarea>
					  <input class='button' type='submit' name = 'checkWordButton' value='Check Word' /></form>";
		}
		
		if(isset($_POST["checkWordButton"])){
			$sql = "SELECT translateTo FROM testWord where word = '".$_SESSION['currentWords'][0]."';";
			$result = mysqli_fetch_assoc(mysqli_query($con,$sql));
			$languageTo = htmlentities($result['translateTo']);
			$languageFrom = str_replace($languageTo, "", "ruseng");
					$word = $_POST["word_input"];
					$sql = "SELECT word_".$languageTo." FROM volcabulary where word_".$languageFrom." = '".$_SESSION['currentWords'][0]."';";
					$result = mysqli_fetch_assoc(mysqli_query($con,$sql));
					$translation = htmlentities($result['word_'.$languageTo]);
					if ($translation != $word){
						echo "Incorrect! Correct translation is ".$translation;
						
					} else{
						echo "Correct!";
					}
					if(count($_SESSION['currentWords']) > 1){
						array_shift($_SESSION['currentWords']);
						echo "<form action = '' method='post'><input class='button' type='submit' name = 'nextWordButton' value='Next Word' /></form>";
					} else{
						$sql = "SELECT count(distinct unit_id) FROM testWord;";
						$result = mysqli_fetch_assoc(mysqli_query($con,$sql));
						$amount = htmlentities($result['count(distinct unit_id)']);
						if ($_SESSION['unit_id'] < $amount){
							echo "<form action = '' method='post'><input class='button' type='submit' name = 'nextUnitButton' value='Next Unit' /></form>";
						} else{
							session_destroy();
							echo "Do you want to repeat?";
							echo "<form action = ''><input class='button' type='submit' name = 'repeatButton' value='Repeat!' /></form>";
						}
					}
		}
	}
?>

        </div>
    </body> 
</html>

			
