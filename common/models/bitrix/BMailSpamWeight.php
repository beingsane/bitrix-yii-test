<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_spam_weight".
 *
 * @property string $WORD_ID
 * @property string $WORD_REAL
 * @property integer $GOOD_CNT
 * @property integer $BAD_CNT
 * @property integer $TOTAL_CNT
 * @property string $TIMESTAMP_X
 */
class BMailSpamWeight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_spam_weight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WORD_ID', 'WORD_REAL'], 'required'],
            [['GOOD_CNT', 'BAD_CNT', 'TOTAL_CNT'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['WORD_ID'], 'string', 'max' => 32],
            [['WORD_REAL'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'WORD_ID' => Yii::t('app', 'Word '),
            'WORD_REAL' => Yii::t('app', 'Word  Real'),
            'GOOD_CNT' => Yii::t('app', 'Good  Cnt'),
            'BAD_CNT' => Yii::t('app', 'Bad  Cnt'),
            'TOTAL_CNT' => Yii::t('app', 'Total  Cnt'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
        ];
    }

    public function getName()
    {
        return $this->WORD_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'WORD_ID', 'WORD_ID');
        return $list;
    }
}
