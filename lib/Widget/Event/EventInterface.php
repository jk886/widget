<?php
/**
 * Widget Framework
 *
 * @copyright   Copyright (c) 2008-2013 Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 */

namespace Widget\Event;

/**
 * The base interface for event class
 *
 * @author      Twin Huang <twinh@yahoo.cn>
 */
interface EventInterface
{
    public function getType();
    
    public function setType($type);
    
    
}