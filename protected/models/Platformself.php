<?php

/**
 * This is the model class for table "{{platform}}".
 *
 * The followings are the available columns in table '{{platform}}':
 * @property integer $id
 * @property string $p_name
 * @property string $p_short
 * @property string $p_address
 * @property string $p_r_address
 * @property integer $examine
 * @property string $p_logo_thumb
 * @property integer $m_id
 * @property string $created
 */
class Platformself extends Platform{
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }
    public function attributeAdminLabels() {
        return array(
            'checkbox' => '选择',
            'p_logo_thumb' => '平台Logo',
            'p_name' => '平台名称',
            'p_short' => '平台简称',
             'city' => '所在城市',
            'p_address' => '平台网址',
            'examine' => '审核状态',
            'created' => '入库时间',
         );
    }
}