<?php

echo ('vengo del controador<p>');

function checkout()
{
    require '../models/apiModel.php';
    require '../config/apiConfig.php';

    try {
        $apiModel = new apiModel();

        $responseCheckout = $apiModel->postCheckOutApi(ACCESS_KEY, SECRET_KEY, 'post', BASE_URL, '/v1/checkout', $bodyCheckout);

        return $responseCheckout;
    } catch (Exception $e) {
        echo "API Error: $e";
    }
}

function insertOrder($success)
{
    require '../config/dbConfig.php';
    require '../models/dbModel.php';

    $firstName = $_COOKIE['firstName'];
    $lastName = $_COOKIE['lastName'];
    $email = $_COOKIE['email'];
    $address = $_COOKIE['address'];
    $country = $_COOKIE['country'];
    $city = $_COOKIE['city'];
    $zip = $_COOKIE['zip'];
    $phone = $_COOKIE['phone'];
    $samebilling = 0;
    if (isset($_COOKIE['samebilling'])) {
        $samebilling = 1;
    }

    try {
        $dbModel = new dbModel($pdo, $firstName, $lastName, $email, $address, $country, $city, $zip, $phone, $samebilling, $success);
        $dbModel->insertOrder();
    } catch (PDOException $e) {
        echo "DB Connection error " . $e->getMessage();
        exit;
    }
}

if (isset($_POST['pay'])) {
    echo ('post pay');

    session_start();

    setcookie('firstName', $_POST['firstName'], time() + 3600, "/");
    setcookie('lastName', $_POST['lastName'], time() + 3600, "/");
    setcookie('email', $_POST['email'], time() + 3600, "/");
    setcookie('address', $_POST['address'], time() + 3600, "/");
    setcookie('country', $_POST['country'], time() + 3600, "/");
    setcookie('city', $_POST['city'], time() + 3600, "/");
    setcookie('zip', $_POST['zip'], time() + 3600, "/");
    setcookie('phone', $_POST['phone'], time() + 3600, "/");
    if (isset($_POST['samebilling'])) {
        setcookie('samebilling', 1, time() + 3600, "/");
    }

    $checkout = checkout();

    if (isset($checkout['status']['status'])) {
        header('Location: ' . $checkout['data']['redirect_url']);
    } else {
        require '../config/pathConfig.php';
        header("Location: {$serverURL}index.php?action=error_inesperado");
    }
}

if (isset($_GET['action'])) {

    echo ("Hola tengo Get Action = " . $_GET['action']);

    $action = $_GET['action'];
    $success = 0;

    switch ($action) {
        case 'success':
            $success = 1;
            header('Location: ../views/successview.php?action=success');
            break;
        case 'cancel_check_out':
            header('Location: ../index.php?action=cancel_check_out');
            break;
        case 'error_pay_out':
            header('Location: ../index.php?action=error_pay_out');
            break;
        default:
            header('Location: ../index.php?action=error_inesperado');
            break;
    }

    insertOrder($success);
}
