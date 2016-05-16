<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote".
 *
 * @property integer $ID
 * @property integer $CHANNEL_ID
 * @property integer $C_SORT
 * @property string $ACTIVE
 * @property string $NOTIFY
 * @property integer $AUTHOR_ID
 * @property string $TIMESTAMP_X
 * @property string $DATE_START
 * @property string $DATE_END
 * @property string $URL
 * @property integer $COUNTER
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property string $DESCRIPTION_TYPE
 * @property integer $IMAGE_ID
 * @property string $EVENT1
 * @property string $EVENT2
 * @property string $EVENT3
 * @property integer $UNIQUE_TYPE
 * @property integer $KEEP_IP_SEC
 * @property integer $DELAY
 * @property string $DELAY_TYPE
 * @property string $TEMPLATE
 * @property string $RESULT_TEMPLATE
 */
class BVote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHANNEL_ID', 'C_SORT', 'AUTHOR_ID', 'COUNTER', 'IMAGE_ID', 'UNIQUE_TYPE', 'KEEP_IP_SEC', 'DELAY'], 'integer'],
            [['TIMESTAMP_X', 'DATE_START', 'DATE_END'], 'safe'],
            [['DESCRIPTION'], 'string'],
            [['ACTIVE', 'NOTIFY', 'DELAY_TYPE'], 'string', 'max' => 1],
            [['URL', 'TITLE', 'EVENT1', 'EVENT2', 'EVENT3', 'TEMPLATE', 'RESULT_TEMPLATE'], 'string', 'max' => 255],
            [['DESCRIPTION_TYPE'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CHANNEL_ID' => Yii::t('app', 'Channel '),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NOTIFY' => Yii::t('app', 'Notify'),
            'AUTHOR_ID' => Yii::t('app', 'Author '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_START' => Yii::t('app', 'Date  Start'),
            'DATE_END' => Yii::t('app', 'Date  End'),
            'URL' => Yii::t('app', 'Url'),
            'COUNTER' => Yii::t('app', 'Counter'),
            'TITLE' => Yii::t('app', 'Title'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DESCRIPTION_TYPE' => Yii::t('app', 'Description  Type'),
            'IMAGE_ID' => Yii::t('app', 'Image '),
            'EVENT1' => Yii::t('app', 'Event1'),
            'EVENT2' => Yii::t('app', 'Event2'),
            'EVENT3' => Yii::t('app', 'Event3'),
            'UNIQUE_TYPE' => Yii::t('app', 'Unique  Type'),
            'KEEP_IP_SEC' => Yii::t('app', 'Keep  Ip  Sec'),
            'DELAY' => Yii::t('app', 'Delay'),
            'DELAY_TYPE' => Yii::t('app', 'Delay  Type'),
            'TEMPLATE' => Yii::t('app', 'Template'),
            'RESULT_TEMPLATE' => Yii::t('app', 'Result  Template'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
