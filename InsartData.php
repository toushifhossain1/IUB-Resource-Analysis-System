<?php
//Connect with the database
$conn=mysqli_connect("localhost","root","","webapp");

if(isset($_POST["Import"])){
    $fileName = $_FILES["file"]["tmp_name"];

    if($_FILES["file"]["size"]>0){
        $file = fopen($fileName,"r");

        while(($colum = fgetcsv($file,30000,",")) !== FALSE){

            $sqlInsert = ("INSERT INTO classroom_t(room_id,roomcapacity)
                VALUE('$colum[7]','$colum[8]')");

            $sqlInsert2 = ("INSERT INTO section_t(courseid,school_title,section_number,semester_name,std_enrolled,semester_year,room_id)
                VALUE('$colum[1]','$colum[0]','$colum[3]','$colum[19]','$colum[6]','$colum[18]','$colum[7]')");

            $sqlInsert3 = ("INSERT INTO semester_t(semester_name,semester_year)
                VALUE('$colum[19]','$colum[18]')");

            $sqlInsert4 = ("INSERT INTO course_t(courseid,Credit,school_title)
                VALUE('$colum[1]','$colum[4]','$colum[0]')");

            $sqlInsert5 = ("INSERT INTO school_t(school_title)
                VALUE('$colum[0]')");

            $sqlInsert6 =("INSERT INTO department_t(department_id,school_title)
                VALUE('$colum[15]','$colum[0]')");

            $result = mysqli_query($conn,$sqlInsert);
            $result2 = mysqli_query($conn,$sqlInsert2);
            $result3 = mysqli_query($conn,$sqlInsert3);
            $result4 = mysqli_query($conn,$sqlInsert4);
            $result5 = mysqli_query($conn,$sqlInsert5);
            $result6 =mysqli_query($conn,$sqlInsert6);
        }
        if(!empty($result)){
            echo "CSV Data Import into the database";
        }else{
            echo "Problem in Import CSV Data";
        }
    }
}
?>

<!-- // INSERT INTO summer21 (school_title,coffer_course_id, coffered_with,section,credit_houre,capacity,enrolled,
room_id,room_capacity,course_name,faculty_full_name
// VALUES($colum[0]-$colum[10]) -->