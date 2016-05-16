<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_adv_searcher".
 *
 * @property integer $ID
 * @property integer $ADV_ID
 * @property integer $SEARCHER_ID
 */
class BStatAdvSearcher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_adv_searcher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADV_ID', 'SEARCHER_ID'], 'required'],
            [['ADV_ID', 'SEARCHER_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ADV_ID' => Yii::t('app', 'Adv '),
            'SEARCHER_ID' => Yii::t('app', 'Searcher '),
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
