<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_weight".
 *
 * @property integer $ID
 * @property string $RATING_FROM
 * @property string $RATING_TO
 * @property string $WEIGHT
 * @property integer $COUNT
 */
class BRatingWeight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_weight';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RATING_FROM', 'RATING_TO'], 'required'],
            [['RATING_FROM', 'RATING_TO', 'WEIGHT'], 'number'],
            [['COUNT'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'RATING_FROM' => Yii::t('app', 'Rating  From'),
            'RATING_TO' => Yii::t('app', 'Rating  To'),
            'WEIGHT' => Yii::t('app', 'Weight'),
            'COUNT' => Yii::t('app', 'Count'),
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
