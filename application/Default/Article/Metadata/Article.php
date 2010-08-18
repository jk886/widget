<?php
/**
 * Metadata
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
 * @since       2010-5-26 22:52:49
 */

class Default_Article_Metadata_Article extends Default_Metadata
{
    public function  __construct()
    {
        parent::setMetadata();
        $this->parseMetadata(array(
            // 基本属性
            'field' => array(
                'category_id' => array(
                    'basic' => array(
                        'title' => 'LBL_FIELD_CATEGORY_NAME',
                    ),
                    'form' => array(
                        '_type' => 'select',
                        /*'_resourceGetter' => array(
                            array('Project_Hepler_Category', 'getTreeResource'),
                            array(
                                'namespace' => 'Default',
                                'module' => 'Category',
                                'controller' => 'Category',
                            ),
                            'news'
                        ),*/
                        '_resource' => array(
                            '0' => 'This is the first option',
                            '2' => 'This is the first option',
                            '3' => 'This is the first option',
                            '4' => 'This is the first option',

                        ),
                        'name' => 'category_id',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 1,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                    'converter' => array(
                        /*'list' => array(
                            array('Project_Hepler_Category', 'convertTreeResource'),
                            array(
                                'namespace' => 'Default',
                                'module' => 'Category',
                                'controller' => 'Category',
                            ),
                            'news'
                        ),*/
                    ),
                ),
                'category_2' => array(
                    'form' => array(
                        '_type' => 'hidden',
                        'name' => 'category_2',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                        'isShow' => 0,
                    ),
                    'converter' => array(
                        /*'attr' => array(
                            array($this, 'convertCommonClass'),
                            'province'
                        )*/
                    ),
                ),
                'category_3' => array(
                    'form' => array(
                        '_type' => 'hidden',
                        'name' => 'category_3',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                        'isShow' => 0,
                    ),
                ),
                'title' => array(
                    'form' => array(
                        '_type' => 'text',
                        'name' => 'title',
                    ),
                    'attr' => array(
                        'isList' => 1,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                        'isShow' => 1,
                    ),
                    'validator' => array(
                        'rule' => array(
                            'required' => true,
                            'maxlength' => 200,
                        ),
                    ),
                ),
                'author' => array(
                    'form' => array(
                        '_type' => 'text',
                        'name' => 'author',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                ),
                'jump_to_url' => array(
                    'form' => array(
                        '_type' => 'text',
                        'name' => 'jump_to_url',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                ),
                'thumb' => array(
                    'form' => array(
                        '_type' => 'text',
                        '_typeExt' => 'fileTree',
                        '_icon' => 'ajaxUpload',
                        'name' => 'thumb',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                ),
                'hit' => array(
                    'form' => array(
                        '_type' => 'hidden',
                        '_value' => 0,
                        'name' => 'hit',
                    ),
                    'attr' => array(
                        'isList' => 1,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                ),
                'page_name' => array(
                    'form' => array(
                        '_type' => 'text',
                        'name' => 'page_name',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                ),
                'template' => array(
                    'form' => array(
                        '_type' => 'text',
                        '_typeExt' => array(
                            'fileTree' => array(
                                'filetree' => array(
                                    'root' => 'Public/template/',
                                )
                            ),
                        ),
                        'name' => 'template',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                ),
                'is_posted' => array(
                    'form' => array(
                        '_type' => 'select',
                        '_resource' => $this->getCommonClassList('yes_or_no'),
                        'name' => 'is_posted',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                    'converter' => array(
                        'attr' => array(
                            array($this, 'convertCommonClass'),
                            'yes_or_no'
                        )
                    ),
                ),
                'is_index' => array(
                    'form' => array(
                        '_type' => 'select',
                        '_resource' => $this->getCommonClassList('yes_or_no'),
                        'name' => 'is_index',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                    'converter' => array(
                        'attr' => array(
                            array($this, 'convertCommonClass'),
                            'yes_or_no'
                        )
                    ),
                ),
                'content_preview' => array(
                    'form' => array(
                        '_type' => 'textarea',
                        'name' => 'content_preview',
                    ),
                    'attr' => array(
                        'isListLink' => 1,
                        'isList' => 0,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                ),
                'order' => array(
                    'form' => array(
                        '_type' => 'text',
                        'name' => 'order',
                    ),
                    'attr' => array(
                        'isList' => 1,
                        'isSqlField' => 1,
                        'isSqlQuery' => 1,
                    ),
                ),
            ),
            // 表之间的联系
            'model' => array(
                array(
                    // 模型类名
                    'name' => 'Default_Article_Model_Detail',
                    'asName' => 'detail',
                    // Metadata 中包含模型字段,表名,关系的定义,
                    'metadata' => 'Default_Article_Metadata_Detail',
                    'type' => 'hasOne',
                    'local' => 'id',
                    'foreign' => 'article_id',
                ),
            ),
            'db' => array(
                'table' => 'article',
                'primaryKey' => 'id',
                'order' => array(
                    array('date_created', 'DESC'),
                ),
                'limit' => 20,
            ),
            // 页面显示
            'page' => array(
                'title' => 'LBL_MODULE_ARTICLE',
            ),
            'shortcut' => array(
            )
        ));
    }
}
