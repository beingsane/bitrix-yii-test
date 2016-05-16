<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_user_props_value".
 *
 * @property integer $ID
 * @property integer $USER_PROPS_ID
 * @property integer $ORDER_PROPS_ID
 * @property string $NAME
 * @property string $VALUE
 */
class BSaleUserPropsValue extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_user_props_value';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_PROPS_ID', 'ORDER_PROPS_ID', 'NAME'], 'required'],
            [['USER_PROPS_ID', 'ORDER_PROPS_ID'], 'integer'],
            [['NAME', 'VALUE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_PROPS_ID' => Yii::t('app', 'User  Props '),
            'ORDER_PROPS_ID' => Yii::t('app', 'Order  Props '),
            'NAME' => Yii::t('app', 'Name'),
            'VALUE' => Yii::t('app', 'Value'),
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
