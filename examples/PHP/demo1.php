<?php
declare(strict_types = 1);

/*
 * PTV Timetable API - PHP Example
 *
 * @author Michael Schams <schams.net>
 * @link https://schams.net
 */

require 'vendor/autoload.php';

$configurationFile = __DIR__ . '/.env';

$bootstrap = new \SchamsNet\PtvTimetableApi\Core\Bootstrap($configurationFile);
$bootstrap->execute();
