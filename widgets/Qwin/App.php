<?php
/**
 * Qwin Framework
 *
 * Copyright (c) 2008-2011 Twin Huang. All rights reserved.
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
 * @author      Twin Huang <twinh@yahoo.cn>
 * @copyright   Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @version     $Id$
 */

/**
 * App
 * 
 * @namespace   Qwin
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @author      Twin Huang <twinh@yahoo.cn>
 * @since       2009-11-24 20:45:11
 */
class Qwin_App extends Qwin_Widget
{
    /**
     * @var array           选项
     * 
     *       paths          应用的路径
     */
    public $options = array(
        'paths'         => null,
        'module'        => 'home',
        'action'        => 'index',
        'timezone'      => null,
        'startTime'     => null,
    );
    
    /**
     * 启动应用
     * 
     * @param array $config 配置
     * @return App_Widget 当前对象
     * @todo 记录状态,防止二次加载?
     * @todo 根据是否debug等抛出不同的错误信息
     */
    public function call(array $options = array())
    {
        // 合并选项
        $this->option(&$options);

        // 设置启动时间
        !$options['startTime'] && $options['startTime'] = microtime(true);
        
        // 设置默认应用目录
        if (!is_array($options['paths'])) {
            $options['paths'] = (array)$options['paths'];
        }
        if (empty($options['paths'])) {
            $options['paths'][] = dirname(dirname(dirname(__FILE__))) . '/apps/';
        }

        // 默认时区
        date_default_timezone_set($options['timezone']);
        
        // 触发应用启动事件
        $this->trigger('appStartup');

        // 获取模块和行为对象
        $options['module'] = $module = $this->get('module', $options['module'])->module();
        $options['action'] = $action = $this->get('action', $options['action'])->action();
        
        // 获取控制器并执行相应行为
        $this->controller()->action($action);

        // 展示视图
        $this->view();
        
        // 触发应用结束事件
        $this->trigger('appTermination');
        
        // 返回当前对象
        return $this;
    }

    /**
     * 获取页面运行时间
     *
     * @return string
     */
    public function getEndTime()
    {
        return str_pad(round((microtime(true) - $this->options['startTime']), 4), 6, 0);
    }
}