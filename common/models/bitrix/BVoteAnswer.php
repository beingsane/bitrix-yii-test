<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote_answer".
 *
 * @property integer $ID
 * @property string $ACTIVE
 * @property string $TIMESTAMP_X
 * @property integer $QUESTION_ID
 * @property integer $C_SORT
 * @property string $MESSAGE
 * @property string $MESSAGE_TYPE
 * @property integer $COUNTER
 * @property integer $FIELD_TYPE
 * @property integer $FIELD_WIDTH
 * @property integer $FIELD_HEIGHT
 * @property string $FIELD_PARAM
 * @property string $COLOR
 */
class BVoteAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['QUESTION_ID', 'C_SORT', 'COUNTER', 'FIELD_TYPE', 'FIELD_WIDTH', 'FIELD_HEIGHT'], 'integer'],
            [['MESSAGE'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['MESSAGE_TYPE'], 'string', 'max' => 4],
            [['FIELD_PARAM'], 'string', 'max' => 255],
            [['COLOR'], 'string', 'max' => 7]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'QUESTION_ID' => Yii::t('app', 'Question '),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'MESSAGE_TYPE' => Yii::t('app', 'Message  Type'),
            'COUNTER' => Yii::t('app', 'Counter'),
            'FIELD_TYPE' => Yii::t('app', 'Field  Type'),
            'FIELD_WIDTH' => Yii::t('app', 'Field  Width'),
            'FIELD_HEIGHT' => Yii::t('app', 'Field  Height'),
            'FIELD_PARAM' => Yii::t('app', 'Field  Param'),
            'COLOR' => Yii::t('app', 'Color'),
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
