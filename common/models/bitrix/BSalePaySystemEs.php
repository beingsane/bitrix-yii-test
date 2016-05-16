<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_pay_system_es".
 *
 * @property integer $ID
 * @property string $CODE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $CLASS_NAME
 * @property string $PARAMS
 * @property string $SHOW_MODE
 * @property integer $PAY_SYSTEM_ID
 * @property string $DEFAULT_VALUE
 * @property string $ACTIVE
 * @property integer $SORT
 */
class BSalePaySystemEs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_pay_system_es';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'CLASS_NAME', 'PAY_SYSTEM_ID', 'ACTIVE'], 'required'],
            [['PARAMS'], 'string'],
            [['PAY_SYSTEM_ID', 'SORT'], 'integer'],
            [['CODE'], 'string', 'max' => 50],
            [['NAME', 'DESCRIPTION', 'CLASS_NAME', 'DEFAULT_VALUE'], 'string', 'max' => 255],
            [['SHOW_MODE', 'ACTIVE'], 'string', 'max' => 1]
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
            'SHOW_MODE' => Yii::t('app', 'Show  Mode'),
            'PAY_SYSTEM_ID' => Yii::t('app', 'Pay  System '),
            'DEFAULT_VALUE' => Yii::t('app', 'Default  Value'),
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
