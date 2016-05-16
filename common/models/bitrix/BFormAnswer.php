<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_answer".
 *
 * @property integer $ID
 * @property integer $FIELD_ID
 * @property string $TIMESTAMP_X
 * @property string $MESSAGE
 * @property integer $C_SORT
 * @property string $ACTIVE
 * @property string $VALUE
 * @property string $FIELD_TYPE
 * @property integer $FIELD_WIDTH
 * @property integer $FIELD_HEIGHT
 * @property string $FIELD_PARAM
 */
class BFormAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FIELD_ID', 'C_SORT', 'FIELD_WIDTH', 'FIELD_HEIGHT'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['MESSAGE', 'FIELD_PARAM'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['VALUE', 'FIELD_TYPE'], 'string', 'max' => 255]
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
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'VALUE' => Yii::t('app', 'Value'),
            'FIELD_TYPE' => Yii::t('app', 'Field  Type'),
            'FIELD_WIDTH' => Yii::t('app', 'Field  Width'),
            'FIELD_HEIGHT' => Yii::t('app', 'Field  Height'),
            'FIELD_PARAM' => Yii::t('app', 'Field  Param'),
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
