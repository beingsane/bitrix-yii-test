<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_status".
 *
 * @property integer $USER_ID
 * @property string $COLOR
 * @property string $STATUS
 * @property string $STATUS_TEXT
 * @property string $IDLE
 * @property string $DESKTOP_LAST_DATE
 * @property string $MOBILE_LAST_DATE
 * @property integer $EVENT_ID
 * @property string $EVENT_UNTIL_DATE
 */
class BImStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID'], 'required'],
            [['USER_ID', 'EVENT_ID'], 'integer'],
            [['IDLE', 'DESKTOP_LAST_DATE', 'MOBILE_LAST_DATE', 'EVENT_UNTIL_DATE'], 'safe'],
            [['COLOR', 'STATUS_TEXT'], 'string', 'max' => 255],
            [['STATUS'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'COLOR' => Yii::t('app', 'Color'),
            'STATUS' => Yii::t('app', 'Status'),
            'STATUS_TEXT' => Yii::t('app', 'Status  Text'),
            'IDLE' => Yii::t('app', 'Idle'),
            'DESKTOP_LAST_DATE' => Yii::t('app', 'Desktop  Last  Date'),
            'MOBILE_LAST_DATE' => Yii::t('app', 'Mobile  Last  Date'),
            'EVENT_ID' => Yii::t('app', 'Event '),
            'EVENT_UNTIL_DATE' => Yii::t('app', 'Event  Until  Date'),
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
