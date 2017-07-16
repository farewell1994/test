<p>ok</p>
<?php
require_once './vendor/autoload.php';

$loader = new Twig_Loader_String();
$twig = new Twig_Environment($loader);

echo $twig->render('Hello {{ name }}!', array('name' => 'Fabien'))."<br>";
echo "<ol>";
foreach($data as $students){
	echo "<li>";
	echo "Name = ".$students[1]."<br>";
	echo "Age = ".$students[2]."<br>";
	echo "</li>";
}
echo "</ol>";