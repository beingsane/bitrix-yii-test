<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_vote".
 *
 * @property integer $ID
 * @property integer $RATING_VOTING_ID
 * @property string $ENTITY_TYPE_ID
 * @property integer $ENTITY_ID
 * @property integer $OWNER_ID
 * @property string $VALUE
 * @property string $ACTIVE
 * @property string $CREATED
 * @property integer $USER_ID
 * @property string $USER_IP
 */
class BRatingVote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_vote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RATING_VOTING_ID', 'ENTITY_TYPE_ID', 'ENTITY_ID', 'OWNER_ID', 'VALUE', 'ACTIVE', 'CREATED', 'USER_ID', 'USER_IP'], 'required'],
            [['RATING_VOTING_ID', 'ENTITY_ID', 'OWNER_ID', 'USER_ID'], 'integer'],
            [['VALUE'], 'number'],
            [['CREATED'], 'safe'],
            [['ENTITY_TYPE_ID'], 'string', 'max' => 50],
            [['ACTIVE'], 'string', 'max' => 1],
            [['USER_IP'], 'string', 'max' => 64]
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
            'ENTITY_TYPE_ID' => Yii::t('app', 'Entity  Type '),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'VALUE' => Yii::t('app', 'Value'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'CREATED' => Yii::t('app', 'Created'),
            'USER_ID' => Yii::t('app', 'User '),
            'USER_IP' => Yii::t('app', 'User  Ip'),
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
