<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_test_mark".
 *
 * @property integer $ID
 * @property integer $TEST_ID
 * @property integer $SCORE
 * @property string $MARK
 * @property string $DESCRIPTION
 */
class BLearnTestMark extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_test_mark';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TEST_ID', 'SCORE', 'MARK'], 'required'],
            [['TEST_ID', 'SCORE'], 'integer'],
            [['DESCRIPTION'], 'string'],
            [['MARK'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TEST_ID' => Yii::t('app', 'Test '),
            'SCORE' => Yii::t('app', 'Score'),
            'MARK' => Yii::t('app', 'Mark'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
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
