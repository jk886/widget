<?php
/**
 * Widget Framework
 *
 * @copyright   Copyright (c) 2008-2013 Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 */

namespace Widget\Validator;

/**
 * @package     Widget
 * @author      Twin Huang <twinh@yahoo.cn>
 */
class Range extends AbstractRule
{
    protected $min;
    
    protected $max;
    
    public function __invoke($data, $min = null, $max = null)
    {
        if ($min && $max) {
            $this->min = $min;
            $this->max = $max;
        }

        return $this->min <= $data && $this->max >= $data;
    }
}
