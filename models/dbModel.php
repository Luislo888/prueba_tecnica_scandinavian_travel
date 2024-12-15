<?php


class dbModel
{
    private $pdo;
    private $firstName;
    private $lastName;
    private $email;
    private $address;
    private $country;
    private $city;
    private $zip;
    private $phone;
    private $samebilling;
    private $success;

    public function __construct($pdo, $firstName, $lastName, $email, $address, $country, $city, $zip, $phone, $samebilling = 0, $success = 0)
    {
        $this->pdo = $pdo;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->address = $address;
        $this->country = $country;
        $this->city = $city;
        $this->zip = $zip;
        $this->phone = $phone;
        $this->samebilling = $samebilling;
        $this->success = $success;
    }

    public function insertOrder()
    {
        try {
            $sql = "INSERT INTO customers (firstName, lastName, email, address, country, city, zip, phone, samebilling, success) VALUES (:firstName, :lastName, :email, :address, :country, :city, :zip, :phone, :samebilling, :success)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([
                'firstName' => $this->firstName,
                'lastName' => $this->lastName,
                'email' => $this->email,
                'address' => $this->address,
                'country' => $this->country,
                'city' => $this->city,
                'zip' => $this->zip,
                'phone' => $this->phone,
                'samebilling' => $this->samebilling,
                'success' => $this->success
            ]);
        } catch (PDOException $e) {
            echo "Connection error " . $e->getMessage();
            exit;
        }
    }
}
