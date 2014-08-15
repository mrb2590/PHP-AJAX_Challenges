<?php
	//Mike Buonomo
	//functions.php

	$button = $_POST['button'];
	
	//this function converts a binary string into an integer
	function binToInt($input) {
		$length = strlen($input);
		for ($i = 0; $i < $length; $i++) {
			$intOut += pow(2, $length - $i - 1) * $input[$i];
		}
		return $intOut;
	}
	
	//this function converts an integer into a binary string
	function intToBin($input) {
		$binOut = null;
		while ($input > 0) {
			$binOut = ($input % 2) . $binOut;
			$input = (int)($input / 2);
		}
		return $binOut;
	}
	
	//this function adds two binary numbers
	function addBins($input1, $input2) {
		//find larger string and add zero's to beginning of smaller
		// string to make them equal length
		$length1 = strlen($input1);
		$length2 = strlen($input2);
		if ($length1 > $length2) {
			$diff = $length1 - $length2;
			for ($i = 0; $i < $diff; $i++) {
				$input2 = "0" . $input2;
			}
		} else if ($length2 > $length1) {
				$diff = $length2 - $length1;
				for ($i = 0; $i < $diff; $i++) {
					$input1 = "0" . $input1;
				}
			}
		$length = strlen($input1);
		$carry = 0;
		for ($i = $length; $i >= 0; $i--) {
			$ans = $input1[$i-1] + $input2[$i-1] + $carry;
			if ($ans == 0) {
				$output = "0" . $output;
				$carry = 0;
			} else if ($ans == 1) {
					$output = "1" . $output;
					$carry = 0;
				} else if ($ans == 2) {
						$output = "0" . $output;
						$carry = 1;
					} else if ($ans == 3) {
							$output = "1" . $output;
							$carry = 1;
						}
		}
		return $output;
	}
	
	//this function returns true if the point lies within the 
	// rectangle, false otherwise.
	//bottom-left(x1, y1), top-right(x3, y2), point(x3, y3)
	function inRectangle($x1, $y1, $x2, $y2, $x3, $y3) {
		$flag = true;
		if ($x3 > $x2 || $x3 < $x1) {
			$flag = false;
		} else if ($y3 > $y2 || $y3 < $y1) {
				$flag = false;
			}
		return $flag;		
	}
	
	//this function prints FIZZ for multiples of 3, BUZZ for multiples of 5
	// and FIZZBUZZ for multiples of 3 and 5, or just the number for 1-100
	function multiples() {
		for ($i = 1; $i <= 100; $i++) {
			echo "<br>" . $i;
			if (($i % 3) == 0) {
				echo " FIZZ";
			}
			if (($i % 5) == 0) {
				echo " BUZZ";
			}
		}
		return $output;
	}
	
	//event handler - determines which function is executed based on
	// which button is pressed
	if ($button == 'bin') {
		echo binToInt($_POST['inputString']);
	} else if ($button == 'int') {
			echo intToBin($_POST['inputString']);
		} else if ($button == 'add') {
				echo addBins($_POST['inputString1'], $_POST['inputString2']);
			} else if ($button == 'rec'){
					$ans = inRectangle(
						$_POST['x1'], $_POST['y1'],
						$_POST['x2'], $_POST['y2'],
						$_POST['x3'], $_POST['y3']
						);
					if ($ans == true) {
						echo "Yes";
					} else {
							echo "No";
						}
				} else if ($button == 'mpl') {
						echo multiples();
					}
?>