<html>
<head> <title> Stellar Technology </title> </head>
<body>
<?php
	$json_string = 'http://www.stellarbiotechnologies.com/media/press-releases/json';

	$jsondata = file_get_contents($json_string);
	$obj = json_decode($jsondata,true);
	if (!$_GET["id"])
	{
		echo "Missing 'id'";
		return;
	}
	$id = $_GET["id"] - 1;
	if (!$_GET["range"])
		$range = 1;
	else
		$range = $_GET["range"];
	
	if ($id < 0 || $id >= count($obj['news']))
	{
		echo "Invalid 'id'";
		return;
	}
	else if ($id + $range >= count($obj['news']))
	{
		echo "Invalid 'range'";
		return;
	}
	
	echo "<table border=\"1\" width=\"1000\">";
	echo "<tr>";
	echo "<td>";
	echo "<table border'\"1\" width=\"975\">";
	echo "<tr>";
	echo "<th width=\"190\">Published</th><th>Title</th>";
	echo "</tr>";
	echo "</table>";
	echo "</td>";
	echo "</tr>";
	echo "<tr>";
	echo "<td>";
	echo "<div style=\"width:1000px; height:400px; overflow:auto;\">";
	echo "<table border=\"1\" width=\"975\">";
	
	for ($i=$id; $i<$id+$range; $i++)
		echo "<tr><td>" . $obj['news'][$i]['published'] . "</td><td>" . $obj['news'][$i]['title'] . "</td></tr>";
	echo "</table></div></td></tr></td></tr></table>";



?>

</body>

</html>
