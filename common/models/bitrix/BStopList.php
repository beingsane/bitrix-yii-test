<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stop_list".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $DATE_START
 * @property string $DATE_END
 * @property string $ACTIVE
 * @property string $SAVE_STATISTIC
 * @property integer $IP_1
 * @property integer $IP_2
 * @property integer $IP_3
 * @property integer $IP_4
 * @property integer $MASK_1
 * @property integer $MASK_2
 * @property integer $MASK_3
 * @property integer $MASK_4
 * @property string $USER_AGENT
 * @property string $USER_AGENT_IS_NULL
 * @property string $URL_TO
 * @property string $URL_FROM
 * @property string $MESSAGE
 * @property string $MESSAGE_LID
 * @property string $URL_REDIRECT
 * @property string $COMMENTS
 * @property string $TEST
 * @property string $SITE_ID
 */
class BStopList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stop_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'DATE_START', 'DATE_END'], 'safe'],
            [['IP_1', 'IP_2', 'IP_3', 'IP_4', 'MASK_1', 'MASK_2', 'MASK_3', 'MASK_4'], 'integer'],
            [['USER_AGENT', 'URL_TO', 'URL_FROM', 'MESSAGE', 'URL_REDIRECT', 'COMMENTS'], 'string'],
            [['ACTIVE', 'SAVE_STATISTIC', 'USER_AGENT_IS_NULL', 'TEST'], 'string', 'max' => 1],
            [['MESSAGE_LID', 'SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_START' => Yii::t('app', 'Date  Start'),
            'DATE_END' => Yii::t('app', 'Date  End'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SAVE_STATISTIC' => Yii::t('app', 'Save  Statistic'),
            'IP_1' => Yii::t('app', 'Ip 1'),
            'IP_2' => Yii::t('app', 'Ip 2'),
            'IP_3' => Yii::t('app', 'Ip 3'),
            'IP_4' => Yii::t('app', 'Ip 4'),
            'MASK_1' => Yii::t('app', 'Mask 1'),
            'MASK_2' => Yii::t('app', 'Mask 2'),
            'MASK_3' => Yii::t('app', 'Mask 3'),
            'MASK_4' => Yii::t('app', 'Mask 4'),
            'USER_AGENT' => Yii::t('app', 'User  Agent'),
            'USER_AGENT_IS_NULL' => Yii::t('app', 'User  Agent  Is  Null'),
            'URL_TO' => Yii::t('app', 'Url  To'),
            'URL_FROM' => Yii::t('app', 'Url  From'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'MESSAGE_LID' => Yii::t('app', 'Message  Lid'),
            'URL_REDIRECT' => Yii::t('app', 'Url  Redirect'),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'TEST' => Yii::t('app', 'Test'),
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
