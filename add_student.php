<?php
  include 'inc/header.php';
  include 'lib/Student.php';
?>

<?php 
    $cur_date = date('Y-m-d');
?>

<p>Current Date: <?php echo $cur_date;?></p>
<?php
 $stu = new Student();
 if($_SERVER['REQUEST_METHOD']=='POST'){
  $name = $_POST['name'];
  $roll = $_POST['roll'];
  $add_stu = $stu->insertData($name, $roll);
 }
?>

<?php
  if(isset($add_stu)){
   echo $add_stu;
  }
?>
<br>
 <input type="submit" name="view" value="View"> 
 <a class="btn btn-success" href="index.php">Back</a>
 <br>
<form action="" method="post">
   <label for="">Student Name</label>
  <input  type="text" name="name">
  <label for="">Student rool</label>
  <input type="number" name="roll">
  <input type="submit" class="btn btn-success" value ="Add student">
</form>