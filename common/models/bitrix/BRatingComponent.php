<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_component".
 *
 * @property integer $ID
 * @property integer $RATING_ID
 * @property string $ACTIVE
 * @property string $ENTITY_ID
 * @property string $MODULE_ID
 * @property string $RATING_TYPE
 * @property string $NAME
 * @property string $COMPLEX_NAME
 * @property string $CLASS
 * @property string $CALC_METHOD
 * @property string $EXCEPTION_METHOD
 * @property string $LAST_MODIFIED
 * @property string $LAST_CALCULATED
 * @property string $NEXT_CALCULATION
 * @property integer $REFRESH_INTERVAL
 * @property string $CONFIG
 */
class BRatingComponent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_component';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RATING_ID', 'ENTITY_ID', 'MODULE_ID', 'RATING_TYPE', 'NAME', 'COMPLEX_NAME', 'CLASS', 'CALC_METHOD', 'REFRESH_INTERVAL'], 'required'],
            [['RATING_ID', 'REFRESH_INTERVAL'], 'integer'],
            [['LAST_MODIFIED', 'LAST_CALCULATED', 'NEXT_CALCULATION'], 'safe'],
            [['CONFIG'], 'string'],
            [['ACTIVE'], 'string', 'max' => 1],
            [['ENTITY_ID', 'MODULE_ID', 'RATING_TYPE', 'NAME'], 'string', 'max' => 50],
            [['COMPLEX_NAME'], 'string', 'max' => 200],
            [['CLASS', 'CALC_METHOD', 'EXCEPTION_METHOD'], 'string', 'max' => 255]
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
            'ACTIVE' => Yii::t('app', 'Active'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'RATING_TYPE' => Yii::t('app', 'Rating  Type'),
            'NAME' => Yii::t('app', 'Name'),
            'COMPLEX_NAME' => Yii::t('app', 'Complex  Name'),
            'CLASS' => Yii::t('app', 'Class'),
            'CALC_METHOD' => Yii::t('app', 'Calc  Method'),
            'EXCEPTION_METHOD' => Yii::t('app', 'Exception  Method'),
            'LAST_MODIFIED' => Yii::t('app', 'Last  Modified'),
            'LAST_CALCULATED' => Yii::t('app', 'Last  Calculated'),
            'NEXT_CALCULATION' => Yii::t('app', 'Next  Calculation'),
            'REFRESH_INTERVAL' => Yii::t('app', 'Refresh  Interval'),
            'CONFIG' => Yii::t('app', 'Config'),
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
