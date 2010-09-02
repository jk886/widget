<?php
/**
 * Enus
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
 * @package     Qwin
 * @subpackage  
 * @author      Twin Huang <twinh@yahoo.cn>
 * @copyright   Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @version     $Id$
 * @since       2010-09-01 11:27:43
 */

class Trex_Contact_Language_Enus extends Trex_Language
{
    public function __construct()
    {
        return $this->_data += array(
            'LBL_FIELD_FIRST_NAME' => 'First Name',
            'LBL_FIELD_LAST_NAME' => 'Last Name',
            'LBL_FIELD_NICKNAME' => 'Nickname',
            'LBL_FIELD_RELATION' => 'Relation',
            'LBL_FIELD_BIRTHDAY' => 'Birthday',
            'LBL_FIELD_EMAIL' => 'Email',
            'LBL_FIELD_PHONE' => 'Phone',
            'LBL_FIELD_SEX' => 'Sex',

            'LBL_MODULE_CONTACT' => 'Contact',
        );
    }
}
