<?php
/**
 * ExceptionEvent.php
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

namespace unklefedor\eventpusher\events;

/** ExceptionEvent
 *
 * Class ExceptionEvent
 *
 * @package unklefedor\EventPusher\events
 */
class ExceptionEvent implements EventInterface
{
    /** @var \Exception $exception*/
    private $exception = null;
    private $data = [
        'level' => 'error',
        'type' => 'exception'
    ];

    /**
     * ExceptionEvent constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->exception = $data;
    }

    /**
     * getData
     *
     * @return array
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
        $this->data['code'] = $this->exception->getCode();
        $this->data['server'] = $_SERVER;
        $this->data['request'] = $_REQUEST;
        $this->data['timestamp'] = time();
        $this->data['url'] = $_SERVER['SERVER_NAME'].$this->exception->getFile().':'.$this->exception->getLine();
        $this->data['text'] = $this->exception->getMessage();
    }
}