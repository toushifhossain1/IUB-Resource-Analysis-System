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
                <H2>Usage of Resources</H2>
            </div>
        </div>

        <!-- semester_select  -->
        <div class="container">
            <div class="semester_select">
                <form class="form-horizontal" action="03_button2.php" method="get">
                    <h3>Input Semester For Comparison</h3>
                    <p>First Semester</p>
                    <input type="text" placeholder="SEMESTER" name="semester1" id="semester1" required>
                    <br>
                    <p>Second Semester</p>
                    <input type="text" placeholder="SEMESTER" name="semester2" id="semester1" required>
                    <br>
                    <button type="submit" class="submit_button">Submit</button>
                </form>
            </div>
        </div>
        <!-- Table showing  -->
        <div class="home-content">
            <div>
                <!-- add table -->
                <table class="center">
                    <tr>
                        <th>school</th>
                        <th>total enrolled</th>
                        <th>Avg Enroll</th>
                        <th>Avg Room</th>
                        <th>Difference</th>
                        <th>Unused %</th>
                        <th></th>
                    </tr>
                    <?php

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

                    $school_name = array("SBE", "SELS", "SETS", "SLASS");
                    $row_need = array();
                    $sum_room_capacity = array();
                    $sum_total_enrolled = 0;
                    $sum_avg_enrolled = 0;
                    $sum_avg_room = 0;
                    $sum_deef = 0;
                    $sum_unused = 0;

                    for ($i = 0; $i < count($school_name); $i++) {
                        //sum of enrolled students
                        $sql = "SELECT  SUM(std_enrolled) AS total_enrolled  FROM `section_t` WHERE school_title = '$school_name[$i]' AND semester_name ='spring';";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $total_enrolled[] = implode(" ", $row);
                            }
                        }

                        //number of rows that have school
                        $sql2 = "SELECT COUNT(*) FROM `section_t` WHERE school_title='$school_name[$i]' AND semester_name='spring';";
                        $result2 = $conn->query($sql2);
                        if ($result->num_rows > 0) {
                            while ($row = $result2->fetch_assoc()) {
                                $row_need[] = implode(" ", $row);
                            }
                        }
                        //sum of room capacity
                        $sql3 = "SELECT SUM(roomcapacity)  FROM `section_t` AS s, classroom_t As c WHERE s.room_id=c.room_id AND school_title='$school_name[$i]' AND semester_name='spring';";
                        $result3 = $conn->query($sql3);
                        if ($result->num_rows > 0) {
                            while ($row = $result3->fetch_assoc()) {
                                $sum_room_capacity[] = implode(" ", $row);;
                            }
                        }
                    }

                    for ($i = 0; $i < count($school_name); $i++) {
                        echo "<tr><td>" . $school_name[$i] . "</td><td>" . $total_enrolled[$i] . "</td><td>" .
                            round(($total_enrolled[$i] / $row_need[$i]), 2) . "</td><td>" . round(($sum_room_capacity[$i] / $row_need[$i]), 2) . "</td><td>" .
                            round((($sum_room_capacity[$i] / $row_need[$i]) - ($total_enrolled[$i] / $row_need[$i])), 2) .
                            "</td><td>" . round((((($sum_room_capacity[$i] / $row_need[$i]) - ($total_enrolled[$i] / $row_need[$i])) / ($sum_room_capacity[$i] / $row_need[$i]) * 100)), 2) . "</td></tr>";
                    }

                    for ($i = 0; $i < count($row_need); $i++) {
                        $sum_total_enrolled = ($sum_total_enrolled + $total_enrolled[$i]);
                        $sum_avg_enrolled = ($sum_avg_enrolled + ($total_enrolled[$i] / $row_need[$i]));
                        $sum_avg_room = ($sum_avg_room + ($sum_room_capacity[$i] / $row_need[$i]));
                        $sum_deef = ($sum_deef + ($sum_room_capacity[$i] / $row_need[$i]) - ($total_enrolled[$i] / $row_need[$i]));
                        $sum_unused = ($sum_unused + ((($sum_room_capacity[$i] / $row_need[$i]) - ($total_enrolled[$i] / $row_need[$i])) / ($sum_room_capacity[$i] / $row_need[$i]) * 100));
                    }
                    echo "<tr><td>" . '<b>SPRING</b>' . "</td><td>" . $sum_total_enrolled . "</td><td>" . round($sum_avg_enrolled, 2) . "</td><td>" .
                        round($sum_avg_room, 2) . "</td><td>" . round($sum_deef, 2) . "</td><td>" . round($sum_unused, 2) . "</td><td></tr>";

                    //SUMMER TABLE
                    $total_enrolled2 = array();
                    $row_need2 = array();
                    $sum_room_capacity2 = array();
                    $sum_total_enrolled2 = 0;
                    $sum_avg_enrolled2 = 0;
                    $sum_avg_room2 = 0;
                    $sum_deef2 = 0;
                    $sum_unused2 = 0;

                    for ($i = 0; $i < count($school_name); $i++) {
                        //sum of enrolled students
                        $sql = "SELECT  SUM(std_enrolled) AS total_enrolled  FROM `section_t` WHERE school_title = '$school_name[$i]' AND semester_name ='summer';";
                        $results = $conn->query($sql);
                        if ($results->num_rows > 0) {
                            while ($row = $results->fetch_assoc()) {
                                $total_enrolled2[] = implode(" ", $row);
                            }
                        }

                        //number of rows that have school
                        $sql2 = "SELECT COUNT(*) FROM `section_t` WHERE school_title='$school_name[$i]' AND semester_name='summer';";
                        $result2s = $conn->query($sql2);
                        if ($result->num_rows > 0) {
                            while ($row = $result2s->fetch_assoc()) {
                                $row_need2[] = implode(" ", $row);
                            }
                        }
                        //sum of room capacity
                        $sql3 = "SELECT SUM(roomcapacity)  FROM `section_t` AS s, classroom_t As c WHERE s.room_id=c.room_id AND school_title='$school_name[$i]' AND semester_name='summer';";
                        $result3s = $conn->query($sql3);
                        if ($result->num_rows > 0) {
                            while ($row = $result3s->fetch_assoc()) {
                                $sum_room_capacity2[] = implode(" ", $row);;
                            }
                        }
                    }

                    for ($i = 0; $i < count($school_name); $i++) {
                        echo "<tr><td>" . $school_name[$i] . "</td><td>" . $total_enrolled2[$i] . "</td><td>" .
                            round(($total_enrolled2[$i] / $row_need2[$i]), 2) . "</td><td>" . round(($sum_room_capacity2[$i] / $row_need2[$i]), 2) . "</td><td>" .
                            round((($sum_room_capacity2[$i] / $row_need2[$i]) - ($total_enrolled2[$i] / $row_need2[$i])), 2) .
                            "</td><td>" . round((((($sum_room_capacity2[$i] / $row_need2[$i]) - ($total_enrolled2[$i] / $row_need2[$i])) / ($sum_room_capacity2[$i] / $row_need2[$i]) * 100)), 2) . "</td></tr>";
                    }

                    // sum of all spring and summer
                    for ($i = 0; $i < count($row_need2); $i++) {
                        $sum_total_enrolled2 = ($sum_total_enrolled2 + $total_enrolled2[$i]);
                        $sum_avg_enrolled2 = ($sum_avg_enrolled2 + ($total_enrolled2[$i] / $row_need2[$i]));
                        $sum_avg_room2 = ($sum_avg_room2 + ($sum_room_capacity2[$i] / $row_need2[$i]));
                        $sum_deef2 = ($sum_deef2 + ($sum_room_capacity2[$i] / $row_need2[$i]) - ($total_enrolled2[$i] / $row_need2[$i]));
                        $sum_unused2 = ($sum_unused2 + ((($sum_room_capacity2[$i] / $row_need2[$i]) - ($total_enrolled2[$i] / $row_need2[$i])) / ($sum_room_capacity2[$i] / $row_need2[$i]) * 100));
                    }
                    echo "<tr><td>" . '<b>SUMMER</b>' . "</td><td>" . $sum_total_enrolled2 . "</td><td>" . round($sum_avg_enrolled2, 2) . "</td><td>" .
                        round($sum_avg_room2, 2) . "</td><td>" . round($sum_deef2, 2) . "</td><td>" . round($sum_unused2, 2) . "</td><td></tr>";
                    echo "</table>";

                    $conn->close();
                    ?>
                </table>

                <table class="button_3">
                    <tr>
                        <th></th>
                        <th>SPRING</th>
                        <th></th>
                        <th>SUMMER</th>
                        <th></th>
                    </tr>
                    <?php
                    echo "<tr><td>" . '<b>Average of ROOM CAPACITY</b>' . "</td><td>" . round($sum_avg_room, 2) . "</td><td>" . "</td><td>" . round($sum_avg_room2, 2) . "</td><td></tr>";
                    echo "<tr><td>" . '<b>Average of ENROLLED</b>' . "</td><td>" . round($sum_avg_enrolled, 2) . "</td><td>" . "</td><td>" . round($sum_avg_enrolled2, 2) . "</td><td></tr>";
                    echo "<tr><td>" . '<b>Average of Unused Space</b>' . "</td><td>" . round($sum_deef, 2) . "</td><td>" . "</td><td>" . round($sum_deef2, 2) . "</td><td></tr>";
                    echo "<tr><td>" . '<b>Unused Percent</b>' . "</td><td>" . round($sum_unused, 2) . "</td><td>" . "</td><td>" . round($sum_unused2, 2) . "</td><td></tr>";

                    echo "</table>";
                    ?>
                </table>
            </div>
    </section>

    <!-- JavaScript add -->
    <?php include('javascript/javascript.php') ?>

</body>

</html>