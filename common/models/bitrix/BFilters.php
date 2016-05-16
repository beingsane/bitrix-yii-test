<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_filters".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $FILTER_ID
 * @property string $NAME
 * @property string $FIELDS
 * @property string $COMMON
 * @property string $PRESET
 * @property string $LANGUAGE_ID
 * @property string $PRESET_ID
 * @property integer $SORT
 * @property string $SORT_FIELD
 */
class BFilters extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_filters';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'SORT'], 'integer'],
            [['FILTER_ID', 'NAME', 'FIELDS'], 'required'],
            [['FIELDS'], 'string'],
            [['FILTER_ID', 'NAME', 'PRESET_ID', 'SORT_FIELD'], 'string', 'max' => 255],
            [['COMMON', 'PRESET'], 'string', 'max' => 1],
            [['LANGUAGE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'FILTER_ID' => Yii::t('app', 'Filter '),
            'NAME' => Yii::t('app', 'Name'),
            'FIELDS' => Yii::t('app', 'Fields'),
            'COMMON' => Yii::t('app', 'Common'),
            'PRESET' => Yii::t('app', 'Preset'),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
            'PRESET_ID' => Yii::t('app', 'Preset '),
            'SORT' => Yii::t('app', 'Sort'),
            'SORT_FIELD' => Yii::t('app', 'Sort  Field'),
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
