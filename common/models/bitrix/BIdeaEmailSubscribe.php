<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_idea_email_subscribe".
 *
 * @property integer $USER_ID
 * @property string $SUBSCRIBE_TYPE
 * @property string $ENTITY_TYPE
 * @property string $ENTITY_CODE
 */
class BIdeaEmailSubscribe extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_idea_email_subscribe';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'SUBSCRIBE_TYPE', 'ENTITY_TYPE', 'ENTITY_CODE'], 'required'],
            [['USER_ID'], 'integer'],
            [['SUBSCRIBE_TYPE', 'ENTITY_TYPE'], 'string', 'max' => 32],
            [['ENTITY_CODE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'SUBSCRIBE_TYPE' => Yii::t('app', 'Subscribe  Type'),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_CODE' => Yii::t('app', 'Entity  Code'),
        ];
    }

    public function getName()
    {
        return $this->USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_ID', 'USER_ID');
        return $list;
    }
}
