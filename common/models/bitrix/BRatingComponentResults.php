<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_component_results".
 *
 * @property integer $ID
 * @property integer $RATING_ID
 * @property string $ENTITY_TYPE_ID
 * @property integer $ENTITY_ID
 * @property string $MODULE_ID
 * @property string $RATING_TYPE
 * @property string $NAME
 * @property string $COMPLEX_NAME
 * @property string $CURRENT_VALUE
 */
class BRatingComponentResults extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_component_results';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RATING_ID', 'ENTITY_TYPE_ID', 'ENTITY_ID', 'MODULE_ID', 'RATING_TYPE', 'NAME', 'COMPLEX_NAME'], 'required'],
            [['RATING_ID', 'ENTITY_ID'], 'integer'],
            [['CURRENT_VALUE'], 'number'],
            [['ENTITY_TYPE_ID', 'MODULE_ID', 'RATING_TYPE', 'NAME'], 'string', 'max' => 50],
            [['COMPLEX_NAME'], 'string', 'max' => 200]
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
            'MODULE_ID' => Yii::t('app', 'Module '),
            'RATING_TYPE' => Yii::t('app', 'Rating  Type'),
            'NAME' => Yii::t('app', 'Name'),
            'COMPLEX_NAME' => Yii::t('app', 'Complex  Name'),
            'CURRENT_VALUE' => Yii::t('app', 'Current  Value'),
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
