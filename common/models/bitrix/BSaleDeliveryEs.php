<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_delivery_es".
 *
 * @property integer $ID
 * @property string $CODE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $CLASS_NAME
 * @property string $PARAMS
 * @property string $RIGHTS
 * @property integer $DELIVERY_ID
 * @property string $INIT_VALUE
 * @property string $ACTIVE
 * @property integer $SORT
 */
class BSaleDeliveryEs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_delivery_es';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'CLASS_NAME', 'RIGHTS', 'DELIVERY_ID', 'ACTIVE'], 'required'],
            [['PARAMS'], 'string'],
            [['DELIVERY_ID', 'SORT'], 'integer'],
            [['CODE'], 'string', 'max' => 50],
            [['NAME', 'DESCRIPTION', 'CLASS_NAME', 'INIT_VALUE'], 'string', 'max' => 255],
            [['RIGHTS'], 'string', 'max' => 3],
            [['ACTIVE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CODE' => Yii::t('app', 'Code'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'CLASS_NAME' => Yii::t('app', 'Class  Name'),
            'PARAMS' => Yii::t('app', 'Params'),
            'RIGHTS' => Yii::t('app', 'Rights'),
            'DELIVERY_ID' => Yii::t('app', 'Delivery '),
            'INIT_VALUE' => Yii::t('app', 'Init  Value'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
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
