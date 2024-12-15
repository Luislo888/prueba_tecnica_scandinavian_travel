<div class="container mt-5 mb-5">
    <div class="text-center">
        <h2 class="fw-bold mb-2 ">Prueba de Development</h2>
        <p class="text-secondary">Proceso de checkout integrado con Rapyd en su modo de test. La información colectada debe ser guardada en una base de datos.
        </p>
    </div>

    <!-- Progress -->
    <div class="progress-container text-center mb-4">
        <img id="paymentProgressImg" src="resources/img/progressStarted.png" alt="paymentProgress">
    </div>

    <!-- Form -->
    <div class="card shadow-lg border-0">
        <div id="cardBody" class="card-body p-4">
            <label id="billingAddress" class="form-label">Billing Address</label>
            <form action="controllers/shopController.php" method="POST">
                <!-- First Name and Last Name -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="firstName" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="firstName" name="firstName">
                    </div>
                    <div class="col-md-6">
                        <label for="lastName" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lastName" name="lastName">
                    </div>
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                </div>

                <!-- Address -->
                <div class="mb-3">
                    <label for="address" class="form-label">Street Address</label>
                    <input type="text" class="form-control" id="address" name="address">
                </div>

                <!-- Country and State -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-select" id="country" name="country">
                            <option value="">Select a country</option>
                            <option value="espana">España</option>
                            <option value="mexico">México</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="state" class="form-label">State</label>
                        <select class="form-select" id="city" name="city">
                            <option id="cityValue" value="">Selecciona una ciudad</option>
                        </select>
                    </div>
                </div>

                <!-- ZIP Code and Phone -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="zip" class="form-label">Zip/Postal Code</label>
                        <input type="number" class="form-control" id="zip" name="zip">
                    </div>
                    <div class="col-md-6">
                        <label for="phone" class="form-label">Phone number</label>
                        <div class="input-group">
                            <select class="form-select" id="countryCode">
                                <option selected>US</option>
                            </select>
                            <input type="tel" class="form-control" id="phone" name="phone">
                        </div>
                    </div>
                </div>

                <!-- Checkbox -->
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="sameAddress" name="samebilling">
                    <label class="form-check-label" for="sameAddress">My billing and shipping address are the
                        same</label>
                </div>

                <!-- Button -->
                <div class="row mb-3">
                    <div class="col-md-3">
                        <img id="icelandCars" src="resources/img/icelandCars.png" alt="icelandCars">
                    </div>
                    <div class="col-md-9 text-end">
                        <button id="submitButton" name="pay" type="submit" class="btn btn-primary btn-lg w-100">Pay
                            Now <img id="payArrow" src="resources/img/payArrow.png" alt="arrow"></button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>