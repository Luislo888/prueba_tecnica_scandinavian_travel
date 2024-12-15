<?php

require '../config/pathConfig.php';
const ACCESS_KEY = 'rak_6BFCA243BE6DBEF16CC4'; // The access key received from Rapyd.
const SECRET_KEY = 'rsk_10edc7199b975872742ab1a575d53ce28a73b109d4c796019b7030f28247b0961720d0be80000cc7';
const BASE_URL = 'https://sandboxapi.rapyd.net';

$bodyCheckout = [
    "amount" => 700,
    "complete_checkout_url" => "{$serverURL}controllers/shopController.php?action=success",
    "cancel_checkout_url" => "{$serverURL}controllers/shopController.php?action=cancel_check_out",
    "error_payment_url" => "{$serverURL}controllers/shopController.php?action=error_pay_out",
    "country" => "ES",
    "currency" => "EUR",
    "payment_method_types_include" => ["es_visa_card"]
];
