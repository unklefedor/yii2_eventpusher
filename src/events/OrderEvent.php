<?php
/**
 * Created by PhpStorm.
 * User: kukushkina
 * Date: 25.05.17
 * Time: 17:14
 */

namespace unklefedor\eventpusher\events;

use unklefedor\eventpusher\Config;

class OrderEvent implements EventInterface
{

    private $config;
    private $data = [
        'level' => 'info',
        'type' => 'order',
        'text' => 'Заказ отправлен'
    ];
    private $order;

    /**
     * EventInterface constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->order = $data;
        $this->config = new Config();
    }

    /**
     * getData
     *
     * @return mixed
     */
    public function getData()
    {
        $this->refactorData();
        return json_encode($this->data);
    }

    /**
     * refactorData
     *
     * @return void
     */
    private function refactorData()
    {
        $this->data['ip'] = isset($_SERVER['HTTP_X_REAL_IP'])?$_SERVER['HTTP_X_REAL_IP']:$_SERVER['REMOTE_ADDR'];
        $this->data['code'] = 0;
        $this->data['server'] = $_SERVER;
        $this->data['request'] = $_REQUEST;
        $this->data['timestamp'] = time();
        $this->data['url'] = $this->config->getSiteUrl();
    }
}