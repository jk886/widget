<?php

namespace WidgetTest\AppTest\Admin;

class Index extends \Widget\AbstractWidget
{
    public function IndexAction()
    {
        return 'admin.index';
    }

    public function viewAction()
    {
        return array(
            'key' => 'value'
        );
    }
}