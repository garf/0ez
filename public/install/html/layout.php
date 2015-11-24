<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel App Installer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-3 bg-warning">
                <h1>Logo</h1>
            </div>
            <div class="col-md-9">

            </div>
        </div>
        <br />
        <br />
        <div class="row">
            <div class="col-md-3">
                <?php include(base_path('html/sidebar.php')) ?>
            </div>
            <div class="col-md-9">
                <h1><?= $title ?></h1>
                <?php include(base_path($body)) ?>
            </div>
        </div>

    </div>
</body>
</html>