<?php 

/**
 * Customer
 * 
 * A person or entity that can log in to make a purchase
 */
class Customer
{
    public $id;

    public $username;

    public $password;

    public $email;

    public function authenticate($conn, $username, $password)
    {
        $sql = "SELECT *
                FROM customer
                WHERE username = :username";

        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_CLASS, 'CUSTOMER');

        $stmt->execute();

        if ($customer = $stmt->fetch()) {
            return $customer->password == $password;
        }
    }
}