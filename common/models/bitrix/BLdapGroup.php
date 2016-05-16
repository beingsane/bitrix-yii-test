<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ldap_group".
 *
 * @property integer $LDAP_SERVER_ID
 * @property integer $GROUP_ID
 * @property string $LDAP_GROUP_ID
 */
class BLdapGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ldap_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LDAP_SERVER_ID', 'GROUP_ID', 'LDAP_GROUP_ID'], 'required'],
            [['LDAP_SERVER_ID', 'GROUP_ID'], 'integer'],
            [['LDAP_GROUP_ID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LDAP_SERVER_ID' => Yii::t('app', 'Ldap  Server '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'LDAP_GROUP_ID' => Yii::t('app', 'Ldap  Group '),
        ];
    }

    public function getName()
    {
        return $this->LDAP_SERVER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LDAP_SERVER_ID', 'LDAP_SERVER_ID');
        return $list;
    }
}
