<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_user".
 *
 * @property integer $ID
 * @property integer $RATING_ID
 * @property integer $ENTITY_ID
 * @property string $BONUS
 * @property string $VOTE_WEIGHT
 * @property integer $VOTE_COUNT
 */
class BRatingUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RATING_ID', 'ENTITY_ID'], 'required'],
            [['RATING_ID', 'ENTITY_ID', 'VOTE_COUNT'], 'integer'],
            [['BONUS', 'VOTE_WEIGHT'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'RATING_ID' => Yii::t('app', 'Rating '),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'BONUS' => Yii::t('app', 'Bonus'),
            'VOTE_WEIGHT' => Yii::t('app', 'Vote  Weight'),
            'VOTE_COUNT' => Yii::t('app', 'Vote  Count'),
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
