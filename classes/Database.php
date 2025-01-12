<?php 
/**
 * database
 * 
 * A connection to the database
 */
class Database
{
    /**
     * Hostname
     *
     * @var string
     */
    protected $db_host;

    /**
     * Database name
     *
     * @var string
     */
    protected $db_name;

    /**
     * Database username
     *
     * @var string
     */
    protected $db_user;

    /**
     * Database password
     *
     * @var string
     */
    protected $db_pass;

    /**
     * Constructor
     *
     * @param string $host      Hostname
     * @param string $name      Database name
     * @param string $user      Database username
     * @param string $password  Database password
     */
    public function __construct($host, $name, $user, $password)
    {
        $this->db_host = $host;
        $this->db_name = $name;
        $this->db_user = $user;
        $this->db_pass = $password;
    }

    public function getConn()
    {

        $dsn = 'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name . ';charset=utf8';

        try{
            $db = new PDO($dsn, $this->db_user, $this->db_pass);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $db;

        } catch (PDOException $e) {
            echo $e->getMessage();
            exit;
        }
    }
}