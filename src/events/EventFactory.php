<?php
/**
 * EventFactory.php
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

/** EventFactory
 *
 * Class EventFactory
 *
 * @package unklefedor\EventPusher\events
 */
class EventFactory
{
    /**
     * getExceptionEvent
     *
     * @param \Exception $exception
     *
     * @return ExceptionEvent
     */
    public static function getExceptionEvent(\Exception $exception)
    {
        return new ExceptionEvent($exception);
    }

    public static function getOrderEvent()
    {
        return new OrderEvent();
    }
}