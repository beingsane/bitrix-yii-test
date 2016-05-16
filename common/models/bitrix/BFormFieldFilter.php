<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_field_filter".
 *
 * @property integer $ID
 * @property integer $FIELD_ID
 * @property string $PARAMETER_NAME
 * @property string $FILTER_TYPE
 */
class BFormFieldFilter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_field_filter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FIELD_ID'], 'integer'],
            [['PARAMETER_NAME', 'FILTER_TYPE'], 'required'],
            [['PARAMETER_NAME', 'FILTER_TYPE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FIELD_ID' => Yii::t('app', 'Field '),
            'PARAMETER_NAME' => Yii::t('app', 'Parameter  Name'),
            'FILTER_TYPE' => Yii::t('app', 'Filter  Type'),
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
