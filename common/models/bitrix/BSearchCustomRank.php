<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_search_custom_rank".
 *
 * @property integer $ID
 * @property string $APPLIED
 * @property integer $RANK
 * @property string $SITE_ID
 * @property string $MODULE_ID
 * @property string $PARAM1
 * @property string $PARAM2
 * @property string $ITEM_ID
 */
class BSearchCustomRank extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_search_custom_rank';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RANK'], 'integer'],
            [['SITE_ID', 'MODULE_ID'], 'required'],
            [['PARAM1', 'PARAM2'], 'string'],
            [['APPLIED'], 'string', 'max' => 1],
            [['SITE_ID'], 'string', 'max' => 2],
            [['MODULE_ID'], 'string', 'max' => 200],
            [['ITEM_ID'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'APPLIED' => Yii::t('app', 'Applied'),
            'RANK' => Yii::t('app', 'Rank'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'PARAM1' => Yii::t('app', 'Param1'),
            'PARAM2' => Yii::t('app', 'Param2'),
            'ITEM_ID' => Yii::t('app', 'Item '),
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
