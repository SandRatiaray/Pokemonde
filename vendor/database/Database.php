<?php
namespace vendor\database;

use PDO;

/**
 * Class Database
 * @package App\Database
 */
class Database
{
    /**
     * Database user
     * @var string
     */
    private string $dbUser;
    /**
     * Database password
     * @var string
     */
    private string $dbPassword;
    /**
     * Database name
     * @var string
     */
    private string $dbName;
    /**
     * Database host
     * @var string
     */
    private string $dbHost;
    /**
     * Database port
     * @var int
     */
    private int $dbPort;
    /**
     * Database object (PDO)
     */
    private $db;

    public function __construct(string $dbHost, int $dbPort, string $dbUser, string $dbPassword){
        // Init parameters
        $this->setDbName('pokemonde');
        $this->setDbHost($dbHost);
        $this->setDbPort($dbPort);
        $this->setDbUser($dbUser);
        $this->setDbPassword($dbPassword);

        // Connection to the database
        $this->connection();
    }

    public function __destruct() {
        // Destroy the pdo
        $this->db = null;
    }

    /**
     * Database connection (mariadb ou mysql)
     * @throws \Exception
     */
    private function connection () {
        try{
            $this->db = new \PDO("mysql:host={$this->getDbHost()}:{$this->getDbPort()};dbname={$this->getDbName()}",
                "{$this->getDbUser()}", "{$this->getDbPort()}");
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        }catch (\Exception $exception) {
            throw new \Exception('La connexion à la base de données à échoué');
        }
    }


    /**
     * @return string
     */
    public function getDbUser(): string
    {
        return $this->dbUser;
    }

    /**
     * @param string $dbUser
     */
    public function setDbUser(string $dbUser): void
    {
        $this->dbUser = $dbUser;
    }

    /**
     * @return string
     */
    public function getDbPassword(): string
    {
        return $this->dbPassword;
    }

    /**
     * @param string $dbPassword
     */
    public function setDbPassword(string $dbPassword): void
    {
        $this->dbPassword = $dbPassword;
    }

    /**
     * @return string
     */
    public function getDbName(): string
    {
        return $this->dbName;
    }

    /**
     * @param string $dbName
     */
    public function setDbName(string $dbName): void
    {
        $this->dbName = $dbName;
    }

    /**
     * @return string
     */
    public function getDbHost(): string
    {
        return $this->dbHost;
    }

    /**
     * @param string $dbHost
     */
    public function setDbHost(string $dbHost): void
    {
        $this->dbHost = $dbHost;
    }

    /**
     * @return int
     */
    public function getDbPort(): int
    {
        return $this->dbPort;
    }

    /**
     * @param int $dbPort
     */
    public function setDbPort(int $dbPort): void
    {
        $this->dbPort = $dbPort;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }
}