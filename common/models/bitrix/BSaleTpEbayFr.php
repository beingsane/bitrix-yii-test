<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tp_ebay_fr".
 *
 * @property integer $ID
 * @property string $FILENAME
 * @property string $FEED_TYPE
 * @property string $UPLOAD_TIME
 * @property string $PROCESSING_REQUEST_ID
 * @property string $PROCESSING_RESULT
 * @property string $RESULTS
 * @property string $IS_SUCCESS
 */
class BSaleTpEbayFr extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tp_ebay_fr';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FILENAME', 'FEED_TYPE', 'UPLOAD_TIME'], 'required'],
            [['UPLOAD_TIME'], 'safe'],
            [['RESULTS'], 'string'],
            [['FILENAME'], 'string', 'max' => 255],
            [['FEED_TYPE', 'PROCESSING_REQUEST_ID'], 'string', 'max' => 50],
            [['PROCESSING_RESULT'], 'string', 'max' => 100],
            [['IS_SUCCESS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FILENAME' => Yii::t('app', 'Filename'),
            'FEED_TYPE' => Yii::t('app', 'Feed  Type'),
            'UPLOAD_TIME' => Yii::t('app', 'Upload  Time'),
            'PROCESSING_REQUEST_ID' => Yii::t('app', 'Processing  Request '),
            'PROCESSING_RESULT' => Yii::t('app', 'Processing  Result'),
            'RESULTS' => Yii::t('app', 'Results'),
            'IS_SUCCESS' => Yii::t('app', 'Is  Success'),
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
