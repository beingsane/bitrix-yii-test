<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_utm_user".
 *
 * @property integer $ID
 * @property integer $VALUE_ID
 * @property integer $FIELD_ID
 * @property string $VALUE
 * @property integer $VALUE_INT
 * @property double $VALUE_DOUBLE
 * @property string $VALUE_DATE
 */
class BUtmUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_utm_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VALUE_ID', 'FIELD_ID'], 'required'],
            [['VALUE_ID', 'FIELD_ID', 'VALUE_INT'], 'integer'],
            [['VALUE'], 'string'],
            [['VALUE_DOUBLE'], 'number'],
            [['VALUE_DATE'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'VALUE_ID' => Yii::t('app', 'Value '),
            'FIELD_ID' => Yii::t('app', 'Field '),
            'VALUE' => Yii::t('app', 'Value'),
            'VALUE_INT' => Yii::t('app', 'Value  Int'),
            'VALUE_DOUBLE' => Yii::t('app', 'Value  Double'),
            'VALUE_DATE' => Yii::t('app', 'Value  Date'),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
