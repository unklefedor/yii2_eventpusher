<?php
/**
 * EventPusher.php
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

/** EventPusher
 *
 * Push events to monitor via http-request
 *
 * Class EventPusher
 *
 * @package EventPusher
 */
class EventPusher
{
    private $event = null;
    private $transport = null;

    /**
     * EventPusher constructor.
     *
     * @param EventInterface $event
     */
    public function __construct(EventInterface $event)
    {
        $this->event = $event;
        $this->transport = new EventPusherTransport(new Config());
        $this->transport->setAuth('login','password');
        $this->transport->run($event);
    }
}