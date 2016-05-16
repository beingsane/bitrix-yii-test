<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log_view".
 *
 * @property integer $USER_ID
 * @property string $EVENT_ID
 * @property string $TYPE
 */
class BSonetLogView extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log_view';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'EVENT_ID'], 'required'],
            [['USER_ID'], 'integer'],
            [['EVENT_ID'], 'string', 'max' => 50],
            [['TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'TYPE' => Yii::t('app', 'Type'),
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
