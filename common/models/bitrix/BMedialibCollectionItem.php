<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_medialib_collection_item".
 *
 * @property integer $COLLECTION_ID
 * @property integer $ITEM_ID
 */
class BMedialibCollectionItem extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_medialib_collection_item';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COLLECTION_ID', 'ITEM_ID'], 'required'],
            [['COLLECTION_ID', 'ITEM_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'COLLECTION_ID' => Yii::t('app', 'Collection '),
            'ITEM_ID' => Yii::t('app', 'Item '),
        ];
    }

    public function getName()
    {
        return $this->COLLECTION_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'COLLECTION_ID', 'COLLECTION_ID');
        return $list;
    }
}
