<?php
/**
 * Created by PhpStorm.
 * User: ravikiranpathade
 * Date: 3/25/16
 * Time: 4:11 AM
 */

ini_set('display_errors','On');

try{
    $db = new PDO('mysql:host=127.0.0.1;dbname=pdo','root','root');
}catch(PDOException $e){
var_dump($e->getMessage());//echo "Error Connecting Database";
}
//$db = new PDO('mysql:host=127.0.0.1;dbname=pdo','root','root');
$a="'rrp'";
$s = $db -> query("update pdo.table set name=".$a."where id=2");

$b = $db -> query("select * from pdo.table");

$st = $b->fetchAll(PDO::FETCH_ASSOC);
//echo "<pre>",var_dump($st),"</pre>";


/*
foreach ( $st as $item) {
    echo $item['name'],'<a href="redirect.php"><<?php echo $item;?>></a>','<input type="button" onclick="alert(\'Hello World!\')" value="View Profile">','<br>';
}
echo "<html><form>
  Add your homepage:
  <input type=\"url\" name=\"homepage\">
</form></html>>";

ini_set("display_errors",'On');
$db-> new PDO('mysql:host=127.0.0.1;dbname=pdo','root','root');
$st = $db->query("select * from pdo.table");

$b= $st->fetchAll();

var_dump($b);
*/
<!doctype html>
<body>
    <?php foreach ($st as $item): ?>
    <div>
       
    </div>
    <?php endforeach;?>
</body>