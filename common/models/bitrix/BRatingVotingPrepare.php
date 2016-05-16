<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_voting_prepare".
 *
 * @property integer $ID
 * @property integer $RATING_VOTING_ID
 * @property string $TOTAL_VALUE
 * @property integer $TOTAL_VOTES
 * @property integer $TOTAL_POSITIVE_VOTES
 * @property integer $TOTAL_NEGATIVE_VOTES
 */
class BRatingVotingPrepare extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_voting_prepare';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RATING_VOTING_ID', 'TOTAL_VALUE', 'TOTAL_VOTES', 'TOTAL_POSITIVE_VOTES', 'TOTAL_NEGATIVE_VOTES'], 'required'],
            [['RATING_VOTING_ID', 'TOTAL_VOTES', 'TOTAL_POSITIVE_VOTES', 'TOTAL_NEGATIVE_VOTES'], 'integer'],
            [['TOTAL_VALUE'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'RATING_VOTING_ID' => Yii::t('app', 'Rating  Voting '),
            'TOTAL_VALUE' => Yii::t('app', 'Total  Value'),
            'TOTAL_VOTES' => Yii::t('app', 'Total  Votes'),
            'TOTAL_POSITIVE_VOTES' => Yii::t('app', 'Total  Positive  Votes'),
            'TOTAL_NEGATIVE_VOTES' => Yii::t('app', 'Total  Negative  Votes'),
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
