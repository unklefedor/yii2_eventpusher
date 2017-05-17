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

namespace unklefedor\EventPusher;

/** Config
 *
 * Class Config
 *
 * @package unklefedor\EventPusher
 */
class Config
{
    private $api_id = '8lwRMq';
    private $api_secret = 'nQhYGDgvg402aSIxFQQZifx7Ox8Omwgb';
    private $monitor_url = 'http://monitoring.breadhead.ru/eventer/pushevent';

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