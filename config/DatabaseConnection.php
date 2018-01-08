<?php
/**
 * @author Jauhari Khairul Kawistara <jkawistara@gmail.com>
 * Date: 2018-01-08
 */

namespace config;

/**
 * Class DatabaseConnection using singleton pattern
 * @package common
 */
class DatabaseConnection
{
    /**
     * @var string
     */
    public $defaultDir;

    private $_instance = NULL;

    private $_config = [];

    /**
     * DatabaseConnection constructor.
     */
    public function __construct()
    {
        $this->_config = $this->getConfig();
        $this->defaultDir = $this->_config['defaultDir'];
    }

    /**
     * @return \mysqli|null
     */
    public function getInstance()
    {
        if (!isset($this->_instance)) {
            $config = $this->_config;
            $this->_instance = mysqli_connect(
                $config['host'], $config['user'], $config['password'], $config['dbName']);
            if ($this->_instance->connect_error) {
                die("Connection failed: " . $this->_instance->connect_error);
            }
        }
        return $this->_instance;
    }

    /**
     * @return string[] Array of config. See config.ini .
     */
    private function getConfig(): array
    {
        return parse_ini_file('config.ini', true)['config'];
    }
}