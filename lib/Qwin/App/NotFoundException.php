<?php

/**
 * Qwin Framework
 *
 * @copyright   Copyright (c) 2008-2012 Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 */

namespace Qwin\App;

use Qwin\Exception;

/**
 * NotFoundException
 *
 * @package     Qwin
 * @author      Twin Huang <twinh@yahoo.cn>
 */
class NotFoundException extends Exception
{
    public function __construct($message, $code = 404, $file = null, $line = null)
    {
        parent::__construct($message, $code, $file, $line);
    }
}