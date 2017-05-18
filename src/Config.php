<?php
/**
 * Config.php
 *
 * PHP version 7
 *
 * @category   CategoryName
 * @package    PackageName
 * @author     unklefedor
 * @license    http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version    SVN: $Id$
 * @link       http://breadhead.ru
 */

namespace unklefedor\eventpusher;

/** Config
 *
 * Class Config
 *
 * @package unklefedor\EventPusher
 */
class Config
{
    private $api_id = '';
    private $api_secret = '';
    private $monitor_url = 'http://monitoring.breadhead.ru/eventer/pushevent';
    private $http_login = '';
    private $http_password = '';

    /**
     * @return string
     */
    public function getHttpLogin()
    {
        return $this->http_login;
    }

    /**
     * @return string
     */
    public function getHttpPassword()
    {
        return $this->http_password;
    }

    /**
     * @return string
     */
    public function getApiId()
    {
        return $this->api_id;
    }

    /**
     * @return string
     */
    public function getApiSecret()
    {
        return $this->api_secret;
    }

    /**
     * @return string
     */
    public function getMonitorUrl()
    {
        return $this->monitor_url;
    }
}