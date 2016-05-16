<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_abtest".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $ACTIVE
 * @property string $ENABLED
 * @property string $NAME
 * @property string $DESCR
 * @property string $TEST_DATA
 * @property string $START_DATE
 * @property string $STOP_DATE
 * @property integer $DURATION
 * @property integer $PORTION
 * @property integer $MIN_AMOUNT
 * @property integer $USER_ID
 * @property integer $SORT
 */
class BAbtest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_abtest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'TEST_DATA'], 'required'],
            [['DESCR', 'TEST_DATA'], 'string'],
            [['START_DATE', 'STOP_DATE'], 'safe'],
            [['DURATION', 'PORTION', 'MIN_AMOUNT', 'USER_ID', 'SORT'], 'integer'],
            [['SITE_ID', 'NAME'], 'string', 'max' => 255],
            [['ACTIVE', 'ENABLED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ENABLED' => Yii::t('app', 'Enabled'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCR' => Yii::t('app', 'Descr'),
            'TEST_DATA' => Yii::t('app', 'Test  Data'),
            'START_DATE' => Yii::t('app', 'Start  Date'),
            'STOP_DATE' => Yii::t('app', 'Stop  Date'),
            'DURATION' => Yii::t('app', 'Duration'),
            'PORTION' => Yii::t('app', 'Portion'),
            'MIN_AMOUNT' => Yii::t('app', 'Min  Amount'),
            'USER_ID' => Yii::t('app', 'User '),
            'SORT' => Yii::t('app', 'Sort'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
