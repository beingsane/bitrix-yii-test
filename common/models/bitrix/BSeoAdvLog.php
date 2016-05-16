<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_adv_log".
 *
 * @property integer $ID
 * @property integer $ENGINE_ID
 * @property string $TIMESTAMP_X
 * @property string $REQUEST_URI
 * @property string $REQUEST_DATA
 * @property double $RESPONSE_TIME
 * @property integer $RESPONSE_STATUS
 * @property string $RESPONSE_DATA
 */
class BSeoAdvLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_adv_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENGINE_ID', 'TIMESTAMP_X', 'REQUEST_URI', 'RESPONSE_TIME'], 'required'],
            [['ENGINE_ID', 'RESPONSE_STATUS'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['REQUEST_DATA', 'RESPONSE_DATA'], 'string'],
            [['RESPONSE_TIME'], 'number'],
            [['REQUEST_URI'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENGINE_ID' => Yii::t('app', 'Engine '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'REQUEST_URI' => Yii::t('app', 'Request  Uri'),
            'REQUEST_DATA' => Yii::t('app', 'Request  Data'),
            'RESPONSE_TIME' => Yii::t('app', 'Response  Time'),
            'RESPONSE_STATUS' => Yii::t('app', 'Response  Status'),
            'RESPONSE_DATA' => Yii::t('app', 'Response  Data'),
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
