<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_group2group".
 *
 * @property integer $ID
 * @property integer $CATALOG_GROUP_ID
 * @property integer $GROUP_ID
 * @property string $BUY
 */
class BCatalogGroup2group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_group2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CATALOG_GROUP_ID', 'GROUP_ID'], 'required'],
            [['CATALOG_GROUP_ID', 'GROUP_ID'], 'integer'],
            [['BUY'], 'string', 'max' => 1],
            [['CATALOG_GROUP_ID', 'GROUP_ID', 'BUY'], 'unique', 'targetAttribute' => ['CATALOG_GROUP_ID', 'GROUP_ID', 'BUY'], 'message' => 'The combination of Catalog  Group , Group  and Buy has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CATALOG_GROUP_ID' => Yii::t('app', 'Catalog  Group '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'BUY' => Yii::t('app', 'Buy'),
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
