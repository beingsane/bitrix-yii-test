<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_order_props".
 *
 * @property integer $ID
 * @property integer $PERSON_TYPE_ID
 * @property string $NAME
 * @property string $TYPE
 * @property string $REQUIRED
 * @property string $DEFAULT_VALUE
 * @property integer $SORT
 * @property string $USER_PROPS
 * @property string $IS_LOCATION
 * @property integer $PROPS_GROUP_ID
 * @property string $DESCRIPTION
 * @property string $IS_EMAIL
 * @property string $IS_PROFILE_NAME
 * @property string $IS_PAYER
 * @property string $IS_LOCATION4TAX
 * @property string $IS_FILTERED
 * @property string $CODE
 * @property string $IS_ZIP
 * @property string $IS_PHONE
 * @property string $ACTIVE
 * @property string $UTIL
 * @property integer $INPUT_FIELD_LOCATION
 * @property string $MULTIPLE
 * @property string $IS_ADDRESS
 * @property string $SETTINGS
 */
class BSaleOrderProps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_order_props';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERSON_TYPE_ID', 'NAME', 'TYPE', 'PROPS_GROUP_ID'], 'required'],
            [['PERSON_TYPE_ID', 'SORT', 'PROPS_GROUP_ID', 'INPUT_FIELD_LOCATION'], 'integer'],
            [['NAME', 'DESCRIPTION'], 'string', 'max' => 255],
            [['TYPE'], 'string', 'max' => 20],
            [['REQUIRED', 'USER_PROPS', 'IS_LOCATION', 'IS_EMAIL', 'IS_PROFILE_NAME', 'IS_PAYER', 'IS_LOCATION4TAX', 'IS_FILTERED', 'IS_ZIP', 'IS_PHONE', 'ACTIVE', 'UTIL', 'MULTIPLE', 'IS_ADDRESS'], 'string', 'max' => 1],
            [['DEFAULT_VALUE', 'SETTINGS'], 'string', 'max' => 500],
            [['CODE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'NAME' => Yii::t('app', 'Name'),
            'TYPE' => Yii::t('app', 'Type'),
            'REQUIRED' => Yii::t('app', 'Required'),
            'DEFAULT_VALUE' => Yii::t('app', 'Default  Value'),
            'SORT' => Yii::t('app', 'Sort'),
            'USER_PROPS' => Yii::t('app', 'User  Props'),
            'IS_LOCATION' => Yii::t('app', 'Is  Location'),
            'PROPS_GROUP_ID' => Yii::t('app', 'Props  Group '),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'IS_EMAIL' => Yii::t('app', 'Is  Email'),
            'IS_PROFILE_NAME' => Yii::t('app', 'Is  Profile  Name'),
            'IS_PAYER' => Yii::t('app', 'Is  Payer'),
            'IS_LOCATION4TAX' => Yii::t('app', 'Is  Location4 Tax'),
            'IS_FILTERED' => Yii::t('app', 'Is  Filtered'),
            'CODE' => Yii::t('app', 'Code'),
            'IS_ZIP' => Yii::t('app', 'Is  Zip'),
            'IS_PHONE' => Yii::t('app', 'Is  Phone'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'UTIL' => Yii::t('app', 'Util'),
            'INPUT_FIELD_LOCATION' => Yii::t('app', 'Input  Field  Location'),
            'MULTIPLE' => Yii::t('app', 'Multiple'),
            'IS_ADDRESS' => Yii::t('app', 'Is  Address'),
            'SETTINGS' => Yii::t('app', 'Settings'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
