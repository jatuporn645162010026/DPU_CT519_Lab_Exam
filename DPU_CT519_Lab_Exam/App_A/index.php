<?php
if(isset($_GET['Hero_id'])) {
 $id = $_GET['Hero_id'];
}else{
  $id = null;
}

$mysql_hostname = "10.1.1.22";  //เครื่อง Docker
$mysql_user = "pk"; //ชื่อของเครื่องตัวเอง
$mysql_password = "P@ssw0rd";
$mysql_database = "0005_Lab_Exam";
$bd = mysqli_connect($mysql_hostname, $mysql_user, $mysql_password,$mysql_database) or die("Could not connect database");

if (!$bd) {
  die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully".'<br>';

if($id>0)
{
$sql_stmt = "select * from Hero Left Join Movie on Hero.Hero_id=Hero.Hero_id where Hero_id=".$id;

}else
{
$sql_stmt = "select * ,Hero.Hero_id as id from  Hero Left Join Hero_in_movie on Hero.Hero_id=Hero_in_movie.Hero_id";
}

$result=mysqli_query($bd,$sql_stmt);
if(!$result)
{
die("Database access failed".mysqli_error());
}

$rows=mysqli_num_rows($result);

if($rows){
echo '<!DOCTYPE html><html lang="en-US"><head><title>การแสดงรายชื่อ Hero โดย นายพูลศักดิ์ จันทรมณี รหัสนักศึกษา 645162010005 </title></head><body>';

 while($row = mysqli_fetch_array($result)){
   echo 'Image Hero : <img src="'.$row['Picture_link'].'" ><br>';
  echo 'Name: <a href="hero.php?/Hero_id="'.$row['id'].'"">"'.$row['Name'].'"</a><br>';

echo "<a href='hero.php?/Hero_id={$row['id']}'>{$row['Name']}</a>";


echo "<a href='hero.php?/Hero_id={$row['id']}'>asd</a>";

echo  $row['id'];
    }

echo  'Developed by <a href="about.php">JATUPORN SRISAARDRAK</a> ';     
     
echo '</body></html>';
}

//Free result set
mysqli_free_result($result);
mysqli_close($bd);
?>

<?php echo 'Hello'; ?>
