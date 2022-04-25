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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>


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
                <H2>Import CSV</H2>
            </div>
        </div>

        <!-- Table showing  -->
        <div class="home-content">
            <div class="panel-body">
                <span id="message"></span>
                <form class="form-horizontal" action="InsartData.php" method="post" name="upload_excel" enctype="multipart/form-data">
                    <fieldset>
                        <!-- File Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="filebutton">Select File</label>
                            <div class="col-md-4">
                                <input type="file" name="file" id="file" class="input-large">
                            </div>
                        </div>

                        <!-- Button -->
                        <div class="form-group">
                            <label class="col-md-4 control-label" for="singlebutton">Import data</label>
                            <div class="col-md-4">
                                <button type="Import" id="Import" name="Import" class="btn btn-primary button-loading" data-loading-text="Loading...">Import</button>
                            </div>
                        </div>

                    </fieldset>
                </form>

            </div>
        </div>
    </section>

    <!-- JavaScript add -->
    <?php include('javascript/javascript.php') ?>

</body>

</html>