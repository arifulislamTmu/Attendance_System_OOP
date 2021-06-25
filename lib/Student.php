<?php
  $filepath = realpath(dirname(__FILE__));
  include_once ($filepath.'/Database.php');
?>

<?php
  class Student{

      private $db;

     public function __construct() {
         
        $this->db = new Database();

     }
 public function getStudents(){
     $query = "SELECT * FROM tbl_student";
     $result = $this->db->select($query);
     return $result;
}

  public function insertData($name, $roll){
      $name = mysqli_real_escape_string($this->db->link, $name);
      $roll = mysqli_real_escape_string($this->db->link, $roll);
      if(empty($name)|| empty($roll)){
      $msg = "<div class=' alert alert-danger'>
                 <strong>Error :</strong> Field Must Not Be Empty
                </div>";
                return $msg;
      }else{
          $insert = "INSERT INTO tbl_student(name,roll) VALUES ('$name','$roll')";
          $resulr = $this->db->insert($insert);

          $insert_roll = "INSERT INTO tbl_attendnes(roll) VALUES ('$roll')";
          $resulroll = $this->db->insert($insert_roll);
     
          if($resulr){
            $msg = "<div class=' alert alert-success'>
            <strong>Success :</strong> Add student 
           </div>";
           return $msg;
          }
      }
    }

   public function AtendenStudent($cur_date, $attend = array()){
    $query = "SELECT DISTINCT date FROM tbl_attendnes";
    $getData = $this->db->select($query);
    while($result = $getData->fetch_assoc()){
       $dbDate = $result['date'];
 $dbDate;
       if($cur_date == $dbDate){
        $msg = "<div class=' alert alert-danger'>
                 <strong>Error :</strong> Date Alraedy Exist
                </div>";
         return $msg;
       }

   }
    foreach($attend as $atn_key => $atn_value){
       if($atn_value=="present"){
        $insert = "INSERT INTO tbl_attendnes(roll,attend,date) VALUES ('$atn_key','present','$cur_date')";
        $resulroll = $this->db->insert($insert);
        if($resulroll){
          $msg = "<div class=' alert alert-success'>
          <strong>Success :</strong> Student present Success 
         </div>";
         return $msg;
        }
       }elseif($atn_value=="absent"){
        $insert = "INSERT INTO tbl_attendnes(roll,attend,date) VALUES ('$atn_key','absent','$cur_date')";
        $resulroll = $this->db->insert($insert);
        if($resulroll){
          $msg = "<div class=' alert alert-success'>
          <strong>Success :</strong> Student present Success 
         </div>";
         return $msg;
        }
       }
    }
    
   }

   public function  getStudentsdate()
   {
    $query = "SELECT DISTINCT date FROM tbl_attendnes";
    $getData = $this->db->select($query);
    return $getData;
   }
   public function getStudentssDate($dt){
     $select = "SELECT * FROM tbl_student INNER join tbl_attendnes on tbl_student.roll = tbl_attendnes.roll where  tbl_attendnes.date='$dt'";
     $date_s = $this->db->select($select);
     return $date_s;
    }
}

?>