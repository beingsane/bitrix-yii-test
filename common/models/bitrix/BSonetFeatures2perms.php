<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_features2perms".
 *
 * @property integer $ID
 * @property integer $FEATURE_ID
 * @property string $OPERATION_ID
 * @property string $ROLE
 */
class BSonetFeatures2perms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_features2perms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FEATURE_ID', 'OPERATION_ID', 'ROLE'], 'required'],
            [['FEATURE_ID'], 'integer'],
            [['OPERATION_ID'], 'string', 'max' => 50],
            [['ROLE'], 'string', 'max' => 1],
            [['FEATURE_ID', 'OPERATION_ID'], 'unique', 'targetAttribute' => ['FEATURE_ID', 'OPERATION_ID'], 'message' => 'The combination of Feature  and Operation  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FEATURE_ID' => Yii::t('app', 'Feature '),
            'OPERATION_ID' => Yii::t('app', 'Operation '),
            'ROLE' => Yii::t('app', 'Role'),
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
