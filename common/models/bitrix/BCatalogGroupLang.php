<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_group_lang".
 *
 * @property integer $ID
 * @property integer $CATALOG_GROUP_ID
 * @property string $LANG
 * @property string $NAME
 */
class BCatalogGroupLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_group_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CATALOG_GROUP_ID', 'LANG'], 'required'],
            [['CATALOG_GROUP_ID'], 'integer'],
            [['LANG'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 100],
            [['CATALOG_GROUP_ID', 'LANG'], 'unique', 'targetAttribute' => ['CATALOG_GROUP_ID', 'LANG'], 'message' => 'The combination of Catalog  Group  and Lang has already been taken.']
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
            'LANG' => Yii::t('app', 'Lang'),
            'NAME' => Yii::t('app', 'Name'),
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
