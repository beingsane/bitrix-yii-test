<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_report".
 *
 * @property string $ID
 * @property string $OWNER_ID
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property string $CREATED_DATE
 * @property string $CREATED_BY
 * @property string $SETTINGS
 * @property integer $MARK_DEFAULT
 */
class BReport extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['OWNER_ID', 'TITLE', 'DESCRIPTION', 'CREATED_DATE', 'CREATED_BY', 'SETTINGS'], 'required'],
            [['DESCRIPTION', 'SETTINGS'], 'string'],
            [['CREATED_DATE'], 'safe'],
            [['CREATED_BY', 'MARK_DEFAULT'], 'integer'],
            [['OWNER_ID'], 'string', 'max' => 20],
            [['TITLE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'TITLE' => Yii::t('app', 'Title'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'CREATED_DATE' => Yii::t('app', 'Created  Date'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'SETTINGS' => Yii::t('app', 'Settings'),
            'MARK_DEFAULT' => Yii::t('app', 'Mark  Default'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
