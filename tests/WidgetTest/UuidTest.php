<?php

namespace WidgetTest;

class UuidTest extends TestCase
{
    public function testUuid()
    {
        // Instance validator manager widget
        $this->is;
        
        for ($i = 0; $i < 100; $i++) {
            $this->isUuid($this->uuid());
        }
    }
}