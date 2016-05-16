<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_voting".
 *
 * @property integer $ID
 * @property string $ENTITY_TYPE_ID
 * @property integer $ENTITY_ID
 * @property integer $OWNER_ID
 * @property string $ACTIVE
 * @property string $CREATED
 * @property string $LAST_CALCULATED
 * @property string $TOTAL_VALUE
 * @property integer $TOTAL_VOTES
 * @property integer $TOTAL_POSITIVE_VOTES
 * @property integer $TOTAL_NEGATIVE_VOTES
 */
class BRatingVoting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_voting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY_TYPE_ID', 'ENTITY_ID', 'OWNER_ID', 'ACTIVE', 'TOTAL_VALUE', 'TOTAL_VOTES', 'TOTAL_POSITIVE_VOTES', 'TOTAL_NEGATIVE_VOTES'], 'required'],
            [['ENTITY_ID', 'OWNER_ID', 'TOTAL_VOTES', 'TOTAL_POSITIVE_VOTES', 'TOTAL_NEGATIVE_VOTES'], 'integer'],
            [['CREATED', 'LAST_CALCULATED'], 'safe'],
            [['TOTAL_VALUE'], 'number'],
            [['ENTITY_TYPE_ID'], 'string', 'max' => 50],
            [['ACTIVE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENTITY_TYPE_ID' => Yii::t('app', 'Entity  Type '),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'CREATED' => Yii::t('app', 'Created'),
            'LAST_CALCULATED' => Yii::t('app', 'Last  Calculated'),
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
