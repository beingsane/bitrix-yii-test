<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_features".
 *
 * @property integer $ID
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $FEATURE
 * @property string $FEATURE_NAME
 * @property string $ACTIVE
 * @property string $DATE_CREATE
 * @property string $DATE_UPDATE
 */
class BSonetFeatures extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_features';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY_ID', 'FEATURE', 'DATE_CREATE', 'DATE_UPDATE'], 'required'],
            [['ENTITY_ID'], 'integer'],
            [['DATE_CREATE', 'DATE_UPDATE'], 'safe'],
            [['ENTITY_TYPE', 'ACTIVE'], 'string', 'max' => 1],
            [['FEATURE'], 'string', 'max' => 50],
            [['FEATURE_NAME'], 'string', 'max' => 250],
            [['ENTITY_TYPE', 'ENTITY_ID', 'FEATURE'], 'unique', 'targetAttribute' => ['ENTITY_TYPE', 'ENTITY_ID', 'FEATURE'], 'message' => 'The combination of Entity  Type, Entity  and Feature has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'FEATURE' => Yii::t('app', 'Feature'),
            'FEATURE_NAME' => Yii::t('app', 'Feature  Name'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
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
