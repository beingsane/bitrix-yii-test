<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_results".
 *
 * @property integer $ID
 * @property integer $RATING_ID
 * @property string $ENTITY_TYPE_ID
 * @property integer $ENTITY_ID
 * @property string $CURRENT_VALUE
 * @property string $PREVIOUS_VALUE
 * @property integer $CURRENT_POSITION
 * @property integer $PREVIOUS_POSITION
 */
class BRatingResults extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RATING_ID', 'ENTITY_TYPE_ID', 'ENTITY_ID'], 'required'],
            [['RATING_ID', 'ENTITY_ID', 'CURRENT_POSITION', 'PREVIOUS_POSITION'], 'integer'],
            [['CURRENT_VALUE', 'PREVIOUS_VALUE'], 'number'],
            [['ENTITY_TYPE_ID'], 'string', 'max' => 50]
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
            'ENTITY_TYPE_ID' => Yii::t('app', 'Entity  Type '),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'CURRENT_VALUE' => Yii::t('app', 'Current  Value'),
            'PREVIOUS_VALUE' => Yii::t('app', 'Previous  Value'),
            'CURRENT_POSITION' => Yii::t('app', 'Current  Position'),
            'PREVIOUS_POSITION' => Yii::t('app', 'Previous  Position'),
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
