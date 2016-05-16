<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_user_events".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $EVENT_ID
 * @property string $ACTIVE
 * @property string $SITE_ID
 */
class BSonetUserEvents extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_user_events';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'EVENT_ID', 'SITE_ID'], 'required'],
            [['USER_ID'], 'integer'],
            [['EVENT_ID'], 'string', 'max' => 50],
            [['ACTIVE'], 'string', 'max' => 1],
            [['SITE_ID'], 'string', 'max' => 2],
            [['USER_ID', 'EVENT_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'EVENT_ID'], 'message' => 'The combination of User  and Event  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SITE_ID' => Yii::t('app', 'Site '),
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
