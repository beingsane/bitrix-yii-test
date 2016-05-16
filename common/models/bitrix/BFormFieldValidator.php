<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_field_validator".
 *
 * @property integer $ID
 * @property integer $FORM_ID
 * @property integer $FIELD_ID
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 * @property integer $C_SORT
 * @property string $VALIDATOR_SID
 * @property string $PARAMS
 */
class BFormFieldValidator extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_field_validator';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORM_ID', 'FIELD_ID', 'C_SORT'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['PARAMS'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['VALIDATOR_SID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FORM_ID' => Yii::t('app', 'Form '),
            'FIELD_ID' => Yii::t('app', 'Field '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'VALIDATOR_SID' => Yii::t('app', 'Validator  Sid'),
            'PARAMS' => Yii::t('app', 'Params'),
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
