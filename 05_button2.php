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
    <!-- Dropdown CSS  -->
    <?php include('CSS/dropdown.php') ?>
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
                <H2>Availability and Course Offering Comparison</H2>
            </div>
        </div>


        <!-- Table showing  -->
        <div class="home-content">
            <div>
                <!-- add table -->
                <table class="button5">
                    <?php

                    // Data get from form 
                    $semester1 = $_GET["semester1"];
                    $semester2 = $_GET["semester2"];
                    $semester_year1 = $_GET["semester_year1"];
                    $semester_year2 = $_GET["semester_year2"];
                    echo "<tr>
                            <th>Class size</th>
                            <th>IUB Resources</th>
                            <th>" . "$semester1" . " " . "$semester_year1" . "</th>
                            <th>Differance</th>
                            <th>" . "$semester2" . " " . "$semester_year2" . "</th>
                            <th>Difference</th>
                            <th></th>
                        </tr>";

                    //Connect with the database
                    include('DataBase/connection.php');

                    if ($conn->connect_errno) {
                        die("Error connecting" . $conn->connect_error);
                    }

                    // Number of rows that have school name == "" AND semester = "" 
                    // SELECT COUNT(*) AS row_need FROM `section_t` WHERE school_title='SBE' AND semester_name='spring';

                    // sum of enrolled students
                    // SELECT Sschool_title, SUM(std_enrolled) AS total_enrolled FROM `section_t` WHERE school_title='SBE' AND semester_name='spring';

                    // sum of room capacity
                    // SELECT SUM(roomcapacity) AS sum_room_capacity  FROM `section_t` AS s, classroom_t As c WHERE s.room_id=c.room_id AND school_title='SBE' AND semester_name='spring';

                    $class_sizes = array(15, 20, 25, 30, 35, 40, 45, 50, 60, 65);

                    $cls_size1 = array(1, 16, 21, 26, 31, 36, 41, 46, 51, 61);
                    $cls_size2 = array(15, 20, 25, 30, 35, 40, 45, 50, 60, 65);

                    $occarence = array();
                    $needed_spring = array();
                    $div_six_spring = array();
                    $diff_spring = array();
                    $needed_summer = array();
                    $div_six_summer = array();
                    $diff_summer = array();
                    $occarence_sum = array();
                    $spring_sum = array();
                    $diff_spring_sum = array();
                    $summer_sum = array();
                    $diff_summer_sum = array();

                    $resource_sum = 0;
                    $required_sum_spring = 0;
                    $diff_sum_spring = 0;
                    $required_sum_summer = 0;
                    $diff_sum_summer = 0;


                    for ($i = 0; $i < count($class_sizes); $i++) {
                        $sql = "SELECT COUNT(*) FROM classroom_t AS c, section_t AS s WHERE c.room_id=s.room_id AND
                        semester_name='$semester1' AND semester_year='$semester_year1' AND roomcapacity=$class_sizes[$i];";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $occarence[] = implode(" ", $row);
                            }
                        }
                    }


                    for ($i = 0; $i < count($cls_size1); $i++) {
                        //USE the SQL query Here
                        $sql = "SELECT COUNT(*) FROM section_t AS s, classroom_t AS c WHERE s.room_id=c.room_id AND
                        semester_name='$semester1' AND semester_year='$semester_year1' AND roomcapacity BETWEEN $cls_size1[$i] AND $cls_size2[$i];";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $needed_spring[] = implode(" ", $row);
                            }
                        }
                    }


                    for ($i = 0; $i < count($cls_size1); $i++) {
                        //USE the SQL query Here
                        $sql = "SELECT COUNT(*) FROM section_t AS s, classroom_t AS c WHERE s.room_id=c.room_id AND
                        semester_name='$semester2' AND semester_year='$semester_year2' AND roomcapacity BETWEEN $cls_size1[$i] AND $cls_size2[$i];";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $needed_summer[] = implode(" ", $row);
                            }
                        }
                    }


                    for ($i = 0; $i < count($needed_spring); $i++) {
                        $div_six_spring[$i] = ($needed_spring[$i] / 12);
                        $div_six_summer[$i] = ($needed_summer[$i] / 12);
                    }

                    for ($i = 0; $i < count($needed_spring); $i++) {
                        $diff_spring[$i] = $occarence[$i] - $div_six_spring[$i];
                        $diff_summer[$i] = $occarence[$i] - $div_six_summer[$i];
                    }


                    for ($i = 0; $i < count($class_sizes); $i++) {
                        echo "<tr><td>" . $class_sizes[$i] . "</td><td>" . $occarence[$i] . "</td><td>" .
                            round($div_six_spring[$i], 2) . "</td><td>" . round($diff_spring[$i], 2) . "</td><td>" .
                            round($div_six_summer[$i], 2) . "</td><td>" . round($diff_summer[$i], 2) . "</td></tr>";
                    }

                    for ($i = 0; $i < count($class_sizes); $i++) {
                        $resource_sum = $resource_sum + $occarence[$i];
                        $required_sum_spring = $required_sum_spring + $div_six_spring[$i];
                        $diff_sum_spring = $diff_sum_spring + $diff_spring[$i];
                        $required_sum_summer = $required_sum_summer + $div_six_summer[$i];
                        $diff_sum_summer = $diff_sum_summer + $diff_summer[$i];
                    }

                    echo "<tr><td>" . '<b>Total</b>' . "</td><td>" . $resource_sum . "</td><td>" . round($required_sum_spring, 2) . "</td><td>" .
                        round($diff_sum_spring, 2) . "</td><td>" . round($required_sum_summer, 2) . "</td><td>" . round($diff_sum_summer, 2) . "</td><td></tr>";

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