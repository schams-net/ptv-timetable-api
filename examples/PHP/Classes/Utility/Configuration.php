<?php
declare(strict_types = 1);
namespace SchamsNet\PtvTimetableApi\Utility;

/*
 * PTV Timetable API - PHP Example
 *
 * @author Michael Schams <schams.net>
 * @link https://schams.net
 */

use Symfony\Component\Dotenv\Dotenv;

class Configuration
{
    /**
     * User ID (or "devid") as provided by PTV
     *
     * @access private
     * @var string
     */
    private $devid;

    /**
     * API key as a 128bit GUID
     *
     * @access private
     * @var string
     */
    private $key;

    /**
     * Base URI of the PTV Timetable API
     *
     * @access private
     * @var string
     */
    private $endpoint;

    /**
     * Read and parse configuration file using Symfony's Dotenv Component
     * @see https://symfony.com/doc/current/components/dotenv.html
     *
     * @access public
     * @param string Path and file of the configuration file
     */
    public function read(string $filename)
    {
        $dotenv = new Dotenv();

        if (is_readable($filename)) {
            $dotenv->load($filename);
        } else {
            echo 'Configuration file not readable: ' . $filename . PHP_EOL;
        }

        if (array_key_exists('devid', $_ENV) && is_string($_ENV['devid'])) {
            $this->devid = $_ENV['devid'];
            unset($_ENV['devid']);
        }
        if (array_key_exists('key', $_ENV) && is_string($_ENV['key'])) {
            $this->key = $_ENV['key'];
            unset($_ENV['key']);
        }
        if (array_key_exists('endpoint', $_ENV) && is_string($_ENV['endpoint'])) {
            $this->endpoint = $_ENV['endpoint'];
            unset($_ENV['endpoint']);
        }
    }

    /**
     * Get the user ID
     *
     * @access public
     * @return string The user ID (or "devid")
     */
    public function getDevid(): string
    {
        return $this->devid;
    }

    /**
    * Get the API key
    *
    * @access public
    * @return string The API key (128bit GUID)
     */
    public function getKey(): string
    {
        return $this->key;
    }

    /**
    * Get the API endpoint (base URL)
    *
    * @access public
    * @return string The API endpoint (base URL)
     */
    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}
