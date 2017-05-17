<?php
/**
 * EventPusherTransport.php
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

use unklefedor\EventPusher\events\EventInterface;

/** EventPusherTransport
 *
 * Class EventPusherTransport
 *
 * @package unklefedor\EventPusher
 */
class EventPusherTransport
{
    private $config;
    private $transport = null;
    private $result = null;

    private $headers = [];

    /**
     * EventPusherTransport constructor.
     *
     * @param Config $config
     */
    public function __construct(Config $config)
    {
        $this->config = $config;
        $this->init();
    }

    /**
     * init
     *
     * @return void
     */
    private function init()
    {
        $this->initTransport();
        $this->setRequest();
        $this->setAuth();
    }

    /**
     * initTransport
     *
     * @return void
     */
    private function initTransport()
    {
        $this->transport = curl_init($this->config->getMonitorUrl());

        curl_setopt($this->transport, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($this->transport, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($this->transport, CURLOPT_CONNECTTIMEOUT, 5);
    }

    /**
     * initHeaders
     *
     * @return void
     */
    private function initHeaders()
    {
        curl_setopt($this->transport, CURLOPT_HTTPHEADER, $this->headers);
    }

    /**
     * setRequest
     *
     * @return void
     */
    private function setRequest()
    {
        $this->headers[] = "Content-type: plain/text";
        curl_setopt($this->transport, CURLOPT_CUSTOMREQUEST, "POST");
    }

    /**
     * setAuth
     *
     * @return $this
     */
    private function setAuth()
    {
        if ($this->config->getHttpLogin() && $this->config->getHttpPassword()) {
            $this->headers[] = "Authorization: Basic " . $this->config->getHttpLogin() . ':' . $this->config->getHttpPassword();
        }

        return $this;
    }

    /**
     * run
     *
     * @param EventInterface $event
     *
     * @return void
     */
    public function run(EventInterface $event)
    {
        $data = [
            'api_key' => $this->config->getApiId(),
            'hash_key' => $this->generateKey($event->getData()),
            'event' => $event->getData()
        ];

        curl_setopt($this->transport, CURLOPT_POSTFIELDS, $data);
        $this->initHeaders();

        $this->result = curl_exec($this->transport);
        curl_close($this->transport);
    }

    /**
     * generateKey
     *
     * @param EventInterface $event
     *
     * @return string
     */
    private function generateKey(EventInterface $event)
    {
        return md5($this->config->getApiId().'-'.$this->config->getApiSecret()).'-'.md5(var_export($event->getData(), true));
    }

    /**
     * getResult
     *
     * @return null
     */
    public function getResult()
    {
        return $this->result;
    }
}