<?php
/*require_once './vendor/autoload.php';
$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);
echo $twig->render('Hello {{ name }}!', array('name' => 'Fabien'))."<br>";*/
echo "<ol>";
foreach ($data as $students){
	echo "<li>";
	echo "Name = ".$students[1]."<br>";
	echo "Age = ".$students[2]."<br>";
	echo '<a href="http://localhost/test/main/edit/'.$students[0].'-'.$students[1].'-'.$students[2].'">edit</a> | <a href="http://localhost/test/main/delete/'.$students[0].'">delete</a>';
	echo "</li>";
}
echo "</ol>";
echo '<a href="http://localhost/test/main/add">Add Student</a>';
