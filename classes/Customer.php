<?php 

/**
 * Customer
 * 
 * A person or entity that can log in to make a purchase
 */
class Customer
{
    /**
     * The customer id
     *
     * @var int
     */
    public $customerID;

    /**
     * The customer username
     *
     * @var [type]
     */
    public $username;

    /**
     * The customer's password
     *
     * @var string
     */
    public $password;

    /**
     * The customer's email address
     *
     * @var string
     */
    public $email;
  
    /**
     * Create Customer
     *
     * @param object $conn A connection to the database
     * 
     * @return boolean  True if created, false otherwise
     */
    public function create($conn)
    {
        $sql = "INSERT INTO customer (username, password, email)
                VALUES (:username, :password, :email)";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':username', $this->username, PDO::PARAM_STR);
        $stmt->bindValue(':password', $this->password, PDO::PARAM_STR);
        $stmt->bindValue(':email',    $this->email,    PDO::PARAM_STR);

        if ($stmt->execute()) {

            $this->customerID = $conn->lastInsertId();
            
        }
    }

    /**
     * Remove customer
     *
     * @param object $conn
     * @return void
     */
    public function removeCustomer($conn)
    {
        $sql = "DELETE FROM customer
                WHERE customerID = :customerID";

        $stmt = $conn->prepare($sql);

        $stmt->bindValue(':customerID', $this->customerID, PDO::PARAM_INT);

        return $stmt->execute();
    }

    /**
     * Authenticate a user by username and password
     *
     * @param object $conn      A connection to the database
     * @param string $username  Username
     * @param string $password  Password
     * 
     * @return boolean          True if credentials are correct, null otherwise
     */
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