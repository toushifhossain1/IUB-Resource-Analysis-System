<!-- Include navbar -->
<?php include('navbar.php') ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include CSS  -->
    <?php include('CSS/style.php') ?>
    <!-- Include Table CSS -->
    <?php include('CSS/Table_css.php') ?>
    <title>SEAS</title>
</head>

<body>

    <!-- Animation of the page -->
    <section class="home-section">
        <!-- Admin nav add  -->
        <?php include('AdminNav.php') ?>

        <!-- Titale of the page -->
        <div class="home-content">
            <div class="titlel">
                <H2>IUB Available Resources</H2>
            </div> 
        </div>

        <!-- Table showing  -->
        <div class="home-content">
            <!-- add table -->
            <table class="button4">
                <tr>
                    <th>Class size</th>
                    <th>IUB resource</th>
                    <th>Capacity</th>
                </tr>
                <?php

                //Connect with the database
                include('DataBase/connection.php');

                if ($conn->connect_errno) {
                    die("Error connecting" . $conn->connect_error);
                }


                $class_size=array(15,20,25,30,35,40,45,50,60,65);
                $capacity=array();
                $recourses=array();
                $sum_recourses=0;
                $sum_capacity=0;
                //USE the SQL query Here
                // SELECT roomcapacity, COUNT(*) FROM classroom_t AS c, section_t AS s WHERE c.room_id=s.room_id AND
                //  semester_name='spring' AND semester_year='2010' AND roomcapacity=15;

                for($i = 0; $i < count($class_size); $i++){
                    $sql="SELECT COUNT(*) FROM classroom_t AS c, section_t AS s WHERE c.room_id=s.room_id AND
                        semester_name='spring' AND semester_year='2010' AND roomcapacity= $class_size[$i];";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $recourses[] = implode(" ", $row);
                        }
                    }
                }

                for($j=0;$j<count($class_size);$j++){
                    $capacity[$j]=($class_size[$j]*$recourses[$j]);
                }

                for($p=0;$p<count($class_size);$p++){
                    $sum_recourses=($sum_recourses+$recourses[$p]);
                    $sum_capacity=($sum_capacity+$capacity[$p]);
                }

                for($k=0;$k<count($class_size);$k++){
                    echo"<tr><td>".$class_size[$k]."</td><td>".$recourses[$k]."</td><td>".$capacity[$k]."</td></tr>";
                }

                echo"<tr><td>".'<b>Total</b>'."</td><td>" .$sum_recourses."</td><td>" .$sum_capacity."</td></tr>";
                $six_slot= $sum_capacity*12;
                $seven_slot=$sum_capacity*14;
                echo"<tr><td>".'<b>Total Capacity with 6 slot 2 days</b>'."</td><td>" ."</td><td>" .$six_slot."</td></tr>";
                echo"<tr><td>".'<b>Total Capacity with 7 slot 2 days</b>'."</td><td>" ."</td><td>" .$seven_slot."</td></tr>";
                // echo"<tr><td>".'<b>Considering 3.5 average course load (6 slot)</b>'."</td><td>" ."</td><td>" ."</td></tr>";
                // echo"<tr><td>".'<b>Total Capacity withConsidering 3.5 average course load (7 slot)</b>'."</td><td>" ."</td><td>" ."</td></tr>";
                // echo"<tr><td>".'<b>Considering free % for 6 slots capacity</b>'."</td><td>" ."</td><td>" ."</td></tr>";
                // echo"<tr><td>".'<b>Considering free % for 7 slots capacity</b>'."</td><td>" ."</td><td>" ."</td></tr>";

                echo "</table>";
                $conn->close();
                ?>
            </table>
        </div>
    </section>

    <!-- JavaScript add -->
    <?php include('javascript/javascript.php') ?>

</body>

</html>