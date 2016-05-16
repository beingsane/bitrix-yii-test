<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_posting_rubric".
 *
 * @property integer $POSTING_ID
 * @property integer $LIST_RUBRIC_ID
 */
class BPostingRubric extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_posting_rubric';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POSTING_ID', 'LIST_RUBRIC_ID'], 'required'],
            [['POSTING_ID', 'LIST_RUBRIC_ID'], 'integer'],
            [['POSTING_ID', 'LIST_RUBRIC_ID'], 'unique', 'targetAttribute' => ['POSTING_ID', 'LIST_RUBRIC_ID'], 'message' => 'The combination of Posting  and List  Rubric  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'POSTING_ID' => Yii::t('app', 'Posting '),
            'LIST_RUBRIC_ID' => Yii::t('app', 'List  Rubric '),
        ];
    }

    public function getName()
    {
        return $this->POSTING_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'POSTING_ID', 'POSTING_ID');
        return $list;
    }
}
