<?php
  include 'inc/header.php';
  include 'lib/Student.php';
?>
<!-- //ekhane je page ke call korbo tar object 
//toyer korte hobe -->

<?php
  $std = new Student();

 $dt = $_GET['dt'];
?>
   <?php
      if(isset($attend_stu)){
         echo $attend_stu;
      }
    ?>

    <br>
 
     <a class="btn btn-primary" href="view_all.php">Back</a> 
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
         $get_date_STUDENT = $std->getStudentssDate($dt);
         if($get_date_STUDENT){
           $i = 0;
          while($value = $get_date_STUDENT->fetch_assoc()){
            $i++;
        ?>
       <tr>
          <td><?php echo $i; ?></td>
         <td ><?php echo $value['name']?></td>
         <td><?php echo $value['roll']?></td>
         <td><input type="radio" name="absent[<?php echo $value['roll']?>]" value="present" <?php if($value['attend']=="present"){echo "checked";}?> >P
         <input type="radio" name="absent[<?php echo $value['roll']?>]" value="absent" <?php if($value['attend']=="absent"){echo "checked";}?>>A</td>
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