<!-- Include navbar -->
<?php include('navbar_index.php') ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Include CSS  -->
    <?php include('CSS/style.php') ?>
    <title>Student Enrollment Analysis Sytem</title>
</head>

<body>

    <!-- Animation of the page -->
    <section class="home-section">
        <nav >
            
                <div class="sidebar-button">
                    <i class='bx bx-menu sidebarBtn'></i>
                    <span class="dashboard">Dashboard</span>
                </div>
                <div class="search-box">
                    <input type="text" placeholder="Search...">
                    <i class='bx bx-search'></i>
                </div>

                <div>
                    <button type="button" class="btn btn-primary btn-sm" onclick="one_clicked()">Login</button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="two_clicked()">Sign Up</button>
                </div>
            
        </nav>

        <!-- Titale of the page -->
        <div class="home-content">
            <div class="titlel">
                <H2>Welcome to "Student Enrollment Analysis Sytem" Dashboard</H2>
            </div><br>
            <div class="titlel">
                <H2>Please "Login" or "Sign Up"</H2>
            </div><br>
        </div>
    </section>


    <!-- JavaScript add -->
    <?php include('javascript/javascript.php') ?>

</body>

</html>