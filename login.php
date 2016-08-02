
<html><form action="login.php" method="GET">
    GET METHOD
Name:<input type="text" name="name"><br>
Age:<input type="text" name="age" size="5"><br>
<input type="Submit" value="Submit here">
</form></html>

<html><form action="login.php" method="POST">
    <br><br>POST METHOD
    Name:<input type="text" name="names"><br>
    Age:<input type="text" name="ages" size="5"><br>
    <input type="Submit" value="Submit here">
</form></html>

<?php

$name = $_GET["name"];

$age = $_GET["age"];

echo 'Answer is '.$name.' and'.$age.'<br>';
$names = $_POST["names"];

$ages = $_POST["ages"];
print_r $names;
print_r  $ages;
$name= 'Ravi';
echo "Multi-Dimensional Array";
echo"<html></br></html>";
$a=array('11'=>10,'22'=>20,'33'=>30);
$b=array(
'20'=> array('Age'=>'Ravi'),
'30'=> array('Age'=>'A'),
'40'=> array('Age'=>'B'));

print_r($b);
echo"<html></br></html>";
echo"<html></br></html>";
echo $b['30']['Age'];

echo"<html></br></html>";
echo"<html></br></html>";
echo"For loop arrays";
for ($i=0;$i<3;$i++){
    echo"</br>";
    echo $a[$i];
}


echo"<html></br></html>";
echo"<html></br></html>";
echo"For each loop arrays";

foreach ($a as $value){
    echo '</br>'.$value.'</br>';
}
echo"used to remove keys and display values";

foreach ($a as $keys){
    echo '</br>'.$keys.'</br>';
}
echo"used to remove values and display keys";


echo"<html></br></html>";
echo"<html></br></html>";
echo"Functions in php";


function add($a,$b){
    return $a+$b;
}

$c = add('10','20');

echo "</br>".$c;

echo"<html></br></html>";
echo"<html></br></html>";
echo"Functions in php(Undefined Parameters)</br>";


function undefineds(){
    $d=0;
    foreach(func_get_args() as $arg){
        $d = $d+$arg;
    }//print_r (func_get_args());
return $d;
}
echo undefineds(1,2,3);



echo"<html></br></html>";
echo"<html></br></html>";
echo"Number formatting";
echo number_format('700000.34325353',4,',','.');

echo"<html></br></html>";
echo"<html></br></html>";
echo"Get Method";
