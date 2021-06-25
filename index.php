<?php
  include 'inc/header.php';
  include 'lib/Student.php';
?>
<!-- //ekhane je page ke call korbo tar object 
//toyer korte hobe -->

<?php
 error_reporting(0);
  $std = new Student();
  $cur_date = date('Y-m-d');
  if($_SERVER['REQUEST_METHOD']=='POST'){
    $attend = $_POST['absent'];
    $attend_stu = $std->AtendenStudent($cur_date,$attend);
   }
?>
   <?php
      if(isset($attend_stu)){
         echo $attend_stu;
      }
    ?>


<p>Current Date: <?php echo $cur_date;?></p>

    <br>
 
     <a class="btn btn-primary" href="view_all.php">View All</a> 
     <a class="btn btn-success" href="add_student.php">Add Student</a> </button>
     <form action="" method="POST">
   <table class="table table-striped table-responsive">
     <thead>
       <tr>
         <th>S.l</th>
         <th>Name</th>
         <th>Roll</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
     <?php
         $get_student = $std->getStudents();
         if($get_student){
           $i = 0;
          while($value = $get_student->fetch_assoc()){
            $i++;
        ?>
       <tr>
       <td><?php echo $i; ?></td>
         <td ><?php echo $value['name']?></td>
         <td><?php echo $value['roll']?></td>
         <td><input type="radio" name="absent[<?php echo $value['roll']?>]" value="present">P
         <input type="radio" name="absent[<?php echo $value['roll']?>]" value="absent">A</td>
       </tr>
      <?php } }?> 

     </tbody>
   </table>
   
   <button class="btn btn-success">Save</button>
   </form>
</div>
    


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>