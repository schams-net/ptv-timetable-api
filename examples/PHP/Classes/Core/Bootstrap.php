<?php
declare(strict_types = 1);
namespace SchamsNet\PtvTimetableApi\Core;

/*
 * PTV Timetable API - PHP Example
 *
 * @author Michael Schams <schams.net>
 * @link https://schams.net
 */

use SchamsNet\PtvTimetableApi\Utility\Configuration;
use SchamsNet\PtvTimetableApi\Utility\Crypto;
use GuzzleHttp\Client;

class Bootstrap
{
    /**
     * Global configuration object
     *
     * @access private
     * @var Configuration
     */
    private $configuration;

    /**
     * Constructor
     *
     * @access public
     * @param string Path and file of the configuration file
     */
    public function __construct(string $filename)
    {
        $this->configuration = new Configuration();
        $this->configuration->read($filename);
    }

    /**
     * Launch the Bootstrapper (execute application)
     *
     * @access public
     */
    public function execute()
    {
        $request = '/v3/routes';

        $request.= '?';
        $raw = $request . 'devid=' . $this->configuration->getDevid();

        $signature = Crypto::hmac($raw, $this->configuration->getKey());

        echo 'request: ' . $request . PHP_EOL;
        echo 'raw: ' . $raw . PHP_EOL;
        echo 'signature: ' . $signature . PHP_EOL;
        echo PHP_EOL;
        echo $this->configuration->getEndpoint() . $raw . '&signature='. $signature . PHP_EOL;
    }
}
