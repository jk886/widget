<?php
/**
 * NavigationBar
 *
 * Copyright (c) 2008-2010 Twin Huang. All rights reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *   http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @package     Com
 * @subpackage  Widget
 * @author      Twin Huang <twinh@yahoo.cn>
 * @copyright   Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @version     $Id$
 * @since       2011-01-03 12:47:24
 */

class Com_Widget_NavigationBar extends Com_Widget
{
    public function render($param, $view)
    {
        // 加载页眉导航的缓存
        $navigationData = require Qwin::config('root') . 'cache/php/admin-menu.php';

        // 页面名称
        $queryString = empty($_SERVER['QUERY_STRING']) ? '' : '?' . $_SERVER['QUERY_STRING'];
        $pageUrl = basename($_SERVER['PHP_SELF']) . $queryString;

        // '<root><module>/layout-<action><suffix>',
        require $view->decodePath('<root>common/widget-navigation-bar<suffix>');
    }
}
