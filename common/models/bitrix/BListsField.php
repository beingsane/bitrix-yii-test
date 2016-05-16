<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_lists_field".
 *
 * @property integer $IBLOCK_ID
 * @property string $FIELD_ID
 * @property integer $SORT
 * @property string $NAME
 * @property string $SETTINGS
 */
class BListsField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_lists_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'FIELD_ID', 'SORT', 'NAME'], 'required'],
            [['IBLOCK_ID', 'SORT'], 'integer'],
            [['SETTINGS'], 'string'],
            [['FIELD_ID', 'NAME'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'FIELD_ID' => Yii::t('app', 'Field '),
            'SORT' => Yii::t('app', 'Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'SETTINGS' => Yii::t('app', 'Settings'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_ID', 'NAME');
        return $list;
    }
}
