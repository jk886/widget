<?php
/**
 * Contact
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
 * @author      Twin Huang <twinh@yahoo.cn>
 * @copyright   Twin Huang
 * @license     http://www.opensource.org/licenses/apache2.0.php Apache License
 * @version     $Id$
 * @since       2011-01-05 17:57:20
 */

class Crm_Contact_Meta extends Com_Meta
{
    public function setMeta()
    {
        $this->setAdvancedMeta();
        $this->merge(array(
            'field' => array(
                'last_name' => array(
                    'attr' => array(
                        'isView' => 0,
                    ),
                    'validator' => array(
                        'rule' => array(
                            'required' => true,
                        ),
                    ),
                ),
                'first_name' => array(
                    'attr' => array(
                        'isView' => 0,
                    ),
                ),
                'full_name' => array(
                    'form' => array(
                        '_type' => 'hidden',
                    ),
                    'attr' => array(
                        'isList' => 1,
                        'isView' => 1,
                        'isDbField' => 0,
                    ),
                ),
                'nickname' => array(
                    
                ),
                'english_name' => array(
                    
                ),
                'customer_id' => array(
                    'basic' => array(
                        'title' => 'LBL_MODULE_CUSTOMER',
                    ),
                    'form' => array(
                        '_widget' => array(
                            array(
                                array('PopupGrid_Widget', 'render'),
                                array(array(
                                    'title'  => 'LBL_MODULE_CUSTOMER',
                                    'module' => 'crm/customer',
                                    'list' => 'id,name,birthday,email,source',
                                    'fields' => array('name', 'id'),
                                )),
                            ),
                        ),
                    ),
                ),
                'photo' => array(
                    'form' => array(
                        '_widget' => array(
                            array(
                                array('FileTree_Widget', 'render'),
                            ),
                            array(
                                array('AjaxUpload_Widget', 'render'),
                            ),
                        ),
                    ),
                ),
                'birthday' => array(
                    'form' => array(
                        '_widget' => array(
                            array(
                                array('Datepicker_Widget', 'render')
                            ),
                        ),
                    ),
                    'attr' => array(
                        'isList' => 1,
                    ),
                ),
                'email' => array(
                    'attr' => array(
                        'isList' => 1,
                    ),
                ),
                'source' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                    'form' => array(
                        '_type' => 'select',
                        '_resourceGetter' => array(
                            array('Ide_Option_Widget', 'get'),
                            'customer-source',
                        ),
                    ),
                    'sanitiser' => array(
                        'list' => array(
                            array('Ide_Option_Widget', 'sanitise'),
                            'customer-source',
                        ),
                        'view' => 'list',
                    ),
                    'attr' => array(
                        'isLink' => 1,
                        'isList' => 1,
                    ),
                ),
                'parent_id' => array(
                    'basic' => array(
                        'title' => 'FLD_SUPERIOR',
                        'group' => 1,
                    ),
                    'form' => array(
                        '_widget' => array(
                            array(
                                array('PopupGrid_Widget', 'render'),
                                array(array(
                                    'title'  => 'LBL_MODULE_CONTACT',
                                    'module' => 'crm/contact',
                                    'list' => 'id,full_name,birthday,email,source',
                                    'fields' => array('full_name', 'id'),
                                )),
                            ),
                        ),
                    ),
                ),
                'title' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'department' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'website' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'hobby' => array(
                    'basic' => array(
                        'group' => 1,
                    ),
                ),
                'mobile' => array(
                    'basic' => array(
                        'group' => 2,
                    ),
                ),
                'fax' => array(
                    'basic' => array(
                        'group' => 2,
                    ),
                ),
                'home_phone' => array(
                    'basic' => array(
                        'group' => 2,
                    ),
                ),
                'assistant_phone' => array(
                    'basic' => array(
                        'group' => 2,
                    ),
                ),
                'other_phone' => array(
                    'basic' => array(
                        'group' => 2,
                    ),
                ),
                'qq' => array(
                    'basic' => array(
                        'group' => 2,
                    ),
                ),
                'msn' => array(
                    'basic' => array(
                        'group' => 2,
                    ),
                ),
                'skype' => array(
                    'basic' => array(
                        'group' => 2,
                    ),
                ),
                'mailing_country' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'other_country' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'mailing_province' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'other_province' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'mailing_city' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'other_city' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'mailing_street' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'other_street' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'mailing_postbox' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'other_postbox' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'mailing_zip' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'other_zip' => array(
                    'basic' => array(
                        'group' => 3,
                    ),
                ),
                'description' => array(
                    'basic' => array(
                        'group' => 4,
                        'layout' => 2,
                    ),
                    'form' => array(
                        '_type' => 'textarea',
                    ),
                ),
            ),
            'group' => array(
                0 => 'LBL_GROUP_BASIC_DATA',
                1 => 'LBL_GROUP_OTHER_DATA',
                2 => 'LBL_GROUP_CONTACT_DATA',
                3 => 'LBL_GROUP_ADDRESS_DATA',
                4 => 'LBL_GROUP_DESCRIPTION_DATA',
            ),
            'layout' => array(

            ),
            'model' => array(
                'parent' => array(
                    'module' => 'Crm/Contact',
                    'alias' => 'parent',
                    'type' => 'view',
                    'local' => 'parent_id',
                    'fieldMap' => array(
                        'parent_id' => 'full_name',
                    ),
                ),
                'receiver' => array(
                    'module' => 'Com/Member',
                    'alias' => 'receiver',
                    'type' => 'view',
                    'local' => 'assign_to',
                    'fieldMap' => array(
                        'username' => 'assign_to',
                        //'assign_to' => 'username',
                    ),
                ),
            ),
            'db' => array(
                'table' => 'contact',
                'order' => array(
                    array('date_created', 'DESC'),
                ),
                'defaultWhere' => array(
                    array('is_deleted', 0),
                ),
            ),
            'page' => array(
                'title' => 'LBL_MODULE_CONTACT',
                'icon' => 'address',
                'tableLayout' => 1,
                'useTrash' => true,
            ),
        ));
    }

    public function sanitiseEditCustomerId($value, $name, $data, $dataCopy)
    {
        $data = Com_Meta::getQueryByModule('crm/customer')
            ->select('name')
            ->where('id = ?', $value)
            ->fetchOne();

        $this['field'][$name]['form']['_value2'] = $data['name'];
        return $value;
    }

    public function sanitiseEditParentId($value, $name, $data, $dataCopy)
    {
        $data = Com_Meta::getQueryByModule('crm/contact')
            ->select('last_name, first_name')
            ->where('id = ?', $value)
            ->fetchOne();

        $this['field'][$name]['form']['_value2'] = $data['last_name'] . $data['first_name'];
        return $value;
    }

    public function sanitiseListFullName($value, $name, $data, $dataCopy)
    {
        return $dataCopy['last_name'] . $dataCopy['first_name'];
    }

    public function sanitiseViewFullName($value, $name, $data, $dataCopy)
    {
        return $dataCopy['last_name'] . $dataCopy['first_name'];
    }

    public function getMainFieldValue($data)
    {
        return $data['last_name'] . $data['first_name'];
    }
}
