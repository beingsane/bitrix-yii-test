<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote_event".
 *
 * @property integer $ID
 * @property integer $VOTE_ID
 * @property integer $VOTE_USER_ID
 * @property string $DATE_VOTE
 * @property integer $STAT_SESSION_ID
 * @property string $IP
 * @property string $VALID
 */
class BVoteEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['VOTE_ID', 'VOTE_USER_ID', 'STAT_SESSION_ID'], 'integer'],
            [['DATE_VOTE'], 'safe'],
            [['IP'], 'string', 'max' => 15],
            [['VALID'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'VOTE_ID' => Yii::t('app', 'Vote '),
            'VOTE_USER_ID' => Yii::t('app', 'Vote  User '),
            'DATE_VOTE' => Yii::t('app', 'Date  Vote'),
            'STAT_SESSION_ID' => Yii::t('app', 'Stat  Session '),
            'IP' => Yii::t('app', 'Ip'),
            'VALID' => Yii::t('app', 'Valid'),
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
