<?php
if (!isset($_GET['action']) && $_GET['action'] !== 'success') {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prueba de Development</title>
    <!-- Bootstrap 5 -->
    <link rel="stylesheet" href="../style/bootstrap5/css/bootstrap.min.css">
    <link rel="stylesheet" href="../style/bootstrap5/bootstrap-icons/font/bootstrap-icons.css">
    <script src="../style/bootstrap5/js/bootstrap.bundle.min.js"></script>
    <!-- JQuery -->
    <script src="../resources/js/jquery-3.6.0.min.js"></script>
    <!-- Custom -->
    <script src="../resources/js/utils.js"></script>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>
    <div class="container mt-5 mb-5">
        <div class="text-center">
            <h2 class="fw-bold mb-2 ">Yes, you’ve successfully ordered!</h2>
            <p class="text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do<br>
                eiusmod tempor incididunt ut labore et dolore</p>
        </div>

        <!-- Progress Indicator -->

        <div class="progress-container text-center mb-4">
            <img id="paymentProgressFinished" src="../resources/img/progressFinished.png" alt="paymentProgress">
        </div>

        <!-- Order Details Card -->
        <div class="container mb-5">
            <div class="card mx-auto p-4 shadow" style="max-width: 600px;">
                <!-- Checkmark Animation -->
                <div class="text-center">
                    <img id="headCardSuccess" src="../resources/img/headCardSuccess.png" alt="Checkmark" class="mb-3">
                </div>
                <!-- Success Message -->
                <h4 class="text-center ">Thanks a lot for putting up this order</h4>
                <p class="text-center text-secondary">
                    Your order <a href="#?action=success" class="">ASK123456</a> has successfully been placed.
                    You’ll find all the details about your order below, and we'll send you an email with more
                    information. In the
                    meantime, you can view our blog to learn more about Iceland.
                </p>
                <p class="text-center text-secondary">Questions? Suggestions?<br></p>
                <a id="mailIcelandCars" href="mailto:info@icelandcars.is" class="text-center">Shoot us an email.</a>

                <!-- Dropdown -->

                <div class="accordion" id="orderAccordion">
                    <div class="accordion-item">
                        <h3 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                data-bs-target="#orderDetails" aria-expanded="false" aria-controls="orderDetails">
                                <div>Order Review</div>
                                <p></p>
                            </button>
                            <div id="itemsCart" class="d-flex justify-content-between">
                                <span>Tesla Model 3</span>
                                <span class="text-secondary">$700</span>
                            </div>
                        </h3>

                    </div>
                </div>

                <div id="orderDetails" class="accordion accordion-collapse collapse" aria-labelledby="orderHeading"
                    data-bs-parent="#orderAccordion">

                    <div class="accordion-body accord">

                        <h6 class="title-check-out">Check out Summary</h6>
                        <div class="d-flex justify-content-between">
                            <span class="text-body-check-out">Subtotal</span>
                            <span class="text-secondary">$685</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-body-check-out">Discount</span>
                            <span class="text-secondary">$--</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-body-check-out">Extra Fee</span>
                            <span class="text-secondary">$12</span>
                        </div>
                        <div class="d-flex justify-content-between">
                            <span class="text-body-check-out">Tax</span>
                            <span class="text-secondary">$3.03</span>
                        </div>
                        <hr class="check">
                        <div class="d-flex justify-content-between fw-bold">
                            <span class="title-check-out">Total</span>
                            <span class="total-price">$700</span>
                        </div>
                    </div>
                </div>

                <!-- Blog Button -->
                <div class="text-center mt-4">
                    <a href="https://www.icelandcars.is/blog.html" class="btn btn-danger btn-lg w-100">View Our Blog</a>
                </div>
                <!-- Logo -->
                <div class="text-center mt-3">
                    <img id="icelandCarsFinished" src="../resources/img/icelandCars.png" alt="Iceland Cars Logo">
                </div>
            </div>
        </div>
    </div>
</body>

</html>