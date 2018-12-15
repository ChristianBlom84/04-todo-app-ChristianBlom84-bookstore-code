<?php

namespace Bookstore\Core;

use \PDO;
use \PDOException;

use Bookstore\Utils\Singleton;
use Bookstore\Core\Config;

class Database extends Singleton
{
    public $handler;
    private $statement;

    protected function __construct()
    {
        try {
            $config = Config::getInstance()->get('db');
            $this->handler = new PDO(
                $config['dsn'],
                $config['user'],
                $config['password']
            );

            $pdoOptions = [
                // This tells PDO to fetch our data as associative arrays
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                // And to throw exceptions
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ];

            $this->handler->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    /**
     * This method constructs a prepared statement using our database-handler
     * It stores that in a property we call statement for later access
     *
     * @param [string] $query - This is the SQL query string we want to execute
     * @return void
     */
    public function query($query)
    {
        $this->statement = $this->handler->prepare($query);
    }

    /**
     * This methodh helps us bind dynamic placeholder values in our SQL-query
     * Values such as :id, :title and so on, can be 'bound' to the query using
     * this method.
     *
     * @param [string]         $param - The name of the placeholder parameter (e.g. :id)
     * @param [string]         $value - The value that we want to bind to the placeholder
     * @param [PDO param type] $type  - The type of the value that we want to bind to
     *                                  the placeholder. This is done dynamically for us
     *                                  which will minimize the risk of errors from MySQL
     *                                  if we try to input incorrect typed values for things
     *                                  into our tables.
     * @return void
     */
    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->statement->bindValue($param, $value, $type);
    }

    /**
     * This method is used to execute our prepared statement
     *
     * @return void
     */
    public function execute()
    {
        try {
            return $this->statement->execute();
        } catch (PDOException $e) {
            $this->error = $e->getMessage();
        }
    }
    /**
     * This method is used to get a result from an executed prepared statment
     * Note: We make sure to run execute to see if there's anything we can
     * actually get the results from.
     * @return void
     */
    public function result()
    {
        $this->execute();
        return $this->statement->fetch();
    }

    /**
     * This method is used to return a set of results from an executed prepared
     * statement. Useful when we are expecting more than one result. This
     * will return the matching rows of our query as an associative array.
     *
     * @return void
     */
    public function resultset()
    {
        $this->execute();
        return $this->statement->fetchAll();
    }
}
