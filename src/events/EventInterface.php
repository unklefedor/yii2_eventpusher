<?php
/**
 * EventInterface.php
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

namespace unklefedor\EventPusher\events;

/**
 * Interface EventInterface
 *
 * @package unklefedor\EventPusher\events
 */
interface EventInterface
{
    /**
     * EventInterface constructor.
     *
     * @param $data
     */
    public function __construct($data);

    /**
     * getData
     *
     * @return mixed
     */
    public function getData();
}