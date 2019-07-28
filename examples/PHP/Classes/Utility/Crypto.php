<?php
declare(strict_types = 1);
namespace SchamsNet\PtvTimetableApi\Utility;

/*
 * PTV Timetable API - PHP Example
 *
 * @author Michael Schams <schams.net>
 * @link https://schams.net
 */

class Crypto
{
    /**
     * Hashing algorithm name
     */
    const ALGORITHM = 'sha1';

    /**
     * Generate a keyed hash value using the HMAC method
     *
     * @access public
     * @param string The data (message) to be hashed
     * @param string Shared secret key used for generating the HMAC variant of the message digest
     * @return string String containing the calculated message digest as lowercase hexits
     */
    public static function hmac(string $data, string $key)
    {
        return hash_hmac(self::ALGORITHM, $data, $key, false);
    }
}
