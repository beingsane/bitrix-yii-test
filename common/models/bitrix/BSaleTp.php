<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_tp".
 *
 * @property integer $ID
 * @property string $CODE
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $SETTINGS
 * @property string $CATALOG_SECTION_TAB_CLASS_NAME
 * @property string $CLASS
 */
class BSaleTp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_tp';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CODE', 'ACTIVE', 'NAME'], 'required'],
            [['DESCRIPTION', 'SETTINGS'], 'string'],
            [['CODE'], 'string', 'max' => 20],
            [['ACTIVE'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 50],
            [['CATALOG_SECTION_TAB_CLASS_NAME', 'CLASS'], 'string', 'max' => 255],
            [['CODE'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CODE' => Yii::t('app', 'Code'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SETTINGS' => Yii::t('app', 'Settings'),
            'CATALOG_SECTION_TAB_CLASS_NAME' => Yii::t('app', 'Catalog  Section  Tab  Class  Name'),
            'CLASS' => Yii::t('app', 'Class'),
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
