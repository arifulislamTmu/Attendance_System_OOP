<?php
  include 'inc/header.php';
  include 'lib/Student.php';
?>
<!-- //ekhane je page ke call korbo tar object 
//toyer korte hobe -->

<?php
//  error_reporting(0);
  $std = new Student();
  
?>
   <?php
      if(isset($attend_stu)){
         echo $attend_stu;
      }
    ?>

    <br>
 
     <a class="btn btn-primary" href="index.php">Back</a> 
     <a class="btn btn-success" href="add_student.php">Add Student</a> </button>
     <form action="" method="POST">
   <table class="table table-striped table-responsive">
     <thead>
       <tr>
         <th>S.l</th>
         <th>Date</th>
         <th>Action</th>
       </tr>
     </thead>
     <tbody>
     <?php
         $get_date = $std->getStudentsdate();
         if($get_date){
           $i = 0;
          while($value = $get_date->fetch_assoc()){
            $i++;
        ?>
       <tr>
       <td><?php echo $i; ?></td>
         <td><?php echo $value['date']?></td>
         <td><a class="btn btn-success" href="student_view.php?dt=<?php echo $value['date']?>">View</a></td>
       </tr>
      <?php } }?> 

     </tbody>
   </table>
  
   </form>
</div>
    


    <!-- Optional JavaScript -->
    <!-- Popper.js first, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
  </body>
</html>