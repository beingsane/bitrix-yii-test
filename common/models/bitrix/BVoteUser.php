<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_vote_user".
 *
 * @property integer $ID
 * @property integer $STAT_GUEST_ID
 * @property integer $AUTH_USER_ID
 * @property integer $COUNTER
 * @property string $DATE_FIRST
 * @property string $DATE_LAST
 * @property string $LAST_IP
 */
class BVoteUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_vote_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STAT_GUEST_ID', 'AUTH_USER_ID', 'COUNTER'], 'integer'],
            [['DATE_FIRST', 'DATE_LAST'], 'safe'],
            [['LAST_IP'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'STAT_GUEST_ID' => Yii::t('app', 'Stat  Guest '),
            'AUTH_USER_ID' => Yii::t('app', 'Auth  User '),
            'COUNTER' => Yii::t('app', 'Counter'),
            'DATE_FIRST' => Yii::t('app', 'Date  First'),
            'DATE_LAST' => Yii::t('app', 'Date  Last'),
            'LAST_IP' => Yii::t('app', 'Last  Ip'),
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
