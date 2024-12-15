<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Development</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="style/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/bootstrap5/bootstrap-icons/font/bootstrap-icons.css">
    <script src="style/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery -->
    <script src="resources/js/jquery-3.6.0.min.js"></script>
    <!-- Custom -->
    <script src="resources/js/utils.js"></script>
    <link rel="stylesheet" href="style/style.css">

</head>

<body>

    <?php
    if (isset($_GET['action']) && ($_GET['action'] == 'error_inesperado' || $_GET['action'] == 'error_pay_out' || $_GET['action'] == 'cancel_check_out')) {

        echo ("Error: {$_GET['action']}<p></p>Vuelva a intentarlo.");
    }
    ?>
    <?php include 'views/formView.php'; ?>

    <p></p>

</body>

</html>