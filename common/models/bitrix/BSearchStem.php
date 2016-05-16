<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_stem".
 *
 * @property integer $ID
 * @property string $STEM
 */
class BSearchStem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_stem';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STEM'], 'required'],
            [['STEM'], 'string', 'max' => 50],
            [['STEM'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'STEM' => Yii::t('app', 'Stem'),
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
