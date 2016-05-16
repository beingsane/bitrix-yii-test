<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_subscription_rubric".
 *
 * @property integer $SUBSCRIPTION_ID
 * @property integer $LIST_RUBRIC_ID
 */
class BSubscriptionRubric extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_subscription_rubric';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SUBSCRIPTION_ID', 'LIST_RUBRIC_ID'], 'required'],
            [['SUBSCRIPTION_ID', 'LIST_RUBRIC_ID'], 'integer'],
            [['SUBSCRIPTION_ID', 'LIST_RUBRIC_ID'], 'unique', 'targetAttribute' => ['SUBSCRIPTION_ID', 'LIST_RUBRIC_ID'], 'message' => 'The combination of Subscription  and List  Rubric  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SUBSCRIPTION_ID' => Yii::t('app', 'Subscription '),
            'LIST_RUBRIC_ID' => Yii::t('app', 'List  Rubric '),
        ];
    }

    public function getName()
    {
        return $this->SUBSCRIPTION_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SUBSCRIPTION_ID', 'SUBSCRIPTION_ID');
        return $list;
    }
}
