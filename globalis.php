<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<title>Page Title</title>
</head>
<body>
	<?php foo(); ?><br>
</body>
</html>

<?php


function foo()
{
	//$input_value = array(array(0, 5), array(2, 4));

	//$input_value = array(array(0, 3), array(6, 10));

	//$input_value = array(array(0, 5), array(3, 10));

	//$input_value = array(array(7, 8), array(3, 6), array(2, 4));

	$input_value = array(array(3, 6), array(3, 4), array(15, 20), array(16, 17), array(1, 4), array(6, 10), array(3, 10));

	print_r($input_value);

	sort($input_value);

	echo "<br>";

	// on boucle sur chacunes des valeurs du tableau

	foreach ($input_value as $key => &$value) {

		$next_min = min($input_value[$key + 1]);
		$next_max = max($input_value[$key + 1]);
		$min = min($value);
		$max = max($value);
		
		// puis on pose les conditions

		if ($next_min >= $min && $next_max <= $max) {
			if ($input_value[$key + 1]) {
				$input_value[$key + 1] = $input_value[$key];
				unset($input_value[$key]);
			} else {
				unset($input_value[$key + 1]);
			}
		} elseif ($next_min <= $min && $next_max >= $max) {
			unset($input_value[$key]);
		} elseif ($next_min >= $min && $next_min <= $max && $next_max >= $max) {
			$input_value[$key + 1] = array($min, $next_max);
			unset($input_value[$key]);
		} elseif ($next_min <= $min && $next_max >= $min && $next_max <= $max) {
			$input_value[$key + 1] = array($next_min, $max);
			unset($input_value[$key]);
		}
	}

	echo "<br>";

	sort($input_value);

	print_r($input_value);
}

?>

<!-- il m'a fallu près de 5h pour terminer -->