<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Dropdown CSS  -->
    <?php include('CSS/dropdown.php') ?>
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="semester_select">
            <form class="form-horizontal" action="test.php" method="get">
                <h3>Input Semester For Comparison</h3>
                <p>First Semester</p>
                <input type="text" placeholder="SEMISTER" name="semester1" id="semester1" required>
                <input type="text" placeholder="YEAR" name="semester_year1" id="semester_year1" required><br>
                <p>Second Semester</p>
                <input type="text" placeholder="SEMISTER" name="semester2" id="semester1" required>
                <input type="text" placeholder="YEAR" name="semester_year2" id="semester_year1" required><br>
                <button type="submit" class="submit_button">Submit</button>
            </form>
        </div>
    </div>

    <?php 
    $semester1="";
    $semester2="";
    $semester_year1="";
    $semester_year2="";


    $semester1=$_GET["semester1"];
    $semester2=$_GET["semester2"];
    $semester_year1=$_GET["semester_year1"];
    $semester_year2=$_GET["semester_year2"];

    echo $semester1;
    echo $semester2;
    echo $semester_year1;
    echo $semester_year2;
    
    ?>
</body>

</html>