<?php

/**
 * Authentication
 * 
 * Login and logout
 */
class Auth 
{
    /**
     * The customer ID
     *
     * @var integer
     */
    public $customerID;

    /**
     * The customer username
     *
     * @var string
     */
    public $username;

    /**
     * The customer's email
     *
     * @var string
     */
    public $email;

    /**
     * Return user authentication status
     *
     * @return boolean True if user is logged in, false otherwise
     */
    public function isLoggedIn()
    {
        return (isset($_SESSION['is_logged_in']) && $_SESSION['is_logged_in']);
    }

    /**
     * Require the user to be logged in, stopping with an unauthorised message if not
     *
     * @return void
     */
    public function requireLogin()
    {
        if (! $this->isLoggedIn()) {

            die("Unauthorised");

        }
    }

    /**
     * Login using the session
     *
     * @return void
     */
    public function login($username)
    {
        session_regenerate_id(true);

        $_SESSION['is_logged_in'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['quantity'] = [];
        $_SESSION['price'] = [];

    }

    /**
     * Logout of the session
     *
     * @return void
     */
    public function logout()
    {
        if (ini_get("session.use_cookies")) {

            $params = session_get_cookie_params();

            setcookie(
                session_name(),
                '',
                time() - 4200,
                $params["path"],
                $params["domain"],
                $params["secure"],
                $params["httponly"]
            );
        }
    }
}