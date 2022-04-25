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
                <H2>Revenue of Engineering School</H2>
            </div>
        </div>

        <!-- Table showing  -->
        <div class="home-content">
            <!-- add table -->
            <table class="button8">
                <tr>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th>CSE</th>
                    <th>EEE</th>
                    <th>PS</th>
                    <th>SETS</th>
                    <th>CSE%</th>
                    <th>EEE%</th>
                    <th>PS%</th>
                </tr>
                </tr>

                <?php

                //Connect with the database
                include('DataBase/connection.php');

                if ($conn->connect_errno) {
                    die("Error connecting" . $conn->connect_error);
                }

                $conn->close();

                ?>

            </table>
        </div>
    </section>

    <!-- JavaScript add -->
    <?php include('javascript/javascript.php') ?>

</body>

</html>