<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_lists_url".
 *
 * @property integer $IBLOCK_ID
 * @property string $URL
 * @property integer $LIVE_FEED
 */
class BListsUrl extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_lists_url';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID'], 'required'],
            [['IBLOCK_ID', 'LIVE_FEED'], 'integer'],
            [['URL'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'URL' => Yii::t('app', 'Url'),
            'LIVE_FEED' => Yii::t('app', 'Live  Feed'),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_ID', 'IBLOCK_ID');
        return $list;
    }
}
