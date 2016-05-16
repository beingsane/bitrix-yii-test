<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_event_user_view".
 *
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $EVENT_ID
 * @property integer $USER_ID
 * @property integer $USER_IM_ID
 * @property string $USER_ANONYMOUS
 */
class BSonetEventUserView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_event_user_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY_TYPE', 'ENTITY_ID', 'EVENT_ID', 'USER_ID', 'USER_IM_ID'], 'required'],
            [['ENTITY_ID', 'USER_ID', 'USER_IM_ID'], 'integer'],
            [['ENTITY_TYPE', 'EVENT_ID'], 'string', 'max' => 50],
            [['USER_ANONYMOUS'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'USER_ID' => Yii::t('app', 'User '),
            'USER_IM_ID' => Yii::t('app', 'User  Im '),
            'USER_ANONYMOUS' => Yii::t('app', 'User  Anonymous'),
        ];
    }

    public function getName()
    {
        return $this->ENTITY_TYPE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ENTITY_TYPE', 'ENTITY_TYPE');
        return $list;
    }
}
