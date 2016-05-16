<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_type".
 *
 * @property string $ID
 * @property string $SECTIONS
 * @property string $EDIT_FILE_BEFORE
 * @property string $EDIT_FILE_AFTER
 * @property string $IN_RSS
 * @property integer $SORT
 */
class BIblockType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['SORT'], 'integer'],
            [['ID'], 'string', 'max' => 50],
            [['SECTIONS', 'IN_RSS'], 'string', 'max' => 1],
            [['EDIT_FILE_BEFORE', 'EDIT_FILE_AFTER'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SECTIONS' => Yii::t('app', 'Sections'),
            'EDIT_FILE_BEFORE' => Yii::t('app', 'Edit  File  Before'),
            'EDIT_FILE_AFTER' => Yii::t('app', 'Edit  File  After'),
            'IN_RSS' => Yii::t('app', 'In  Rss'),
            'SORT' => Yii::t('app', 'Sort'),
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
