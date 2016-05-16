<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_calendar_type".
 *
 * @property string $XML_ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $EXTERNAL_ID
 * @property string $ACTIVE
 */
class BCalendarType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_calendar_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['XML_ID'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['XML_ID', 'NAME'], 'string', 'max' => 255],
            [['EXTERNAL_ID'], 'string', 'max' => 100],
            [['ACTIVE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'XML_ID' => Yii::t('app', 'Xml '),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'EXTERNAL_ID' => Yii::t('app', 'External '),
            'ACTIVE' => Yii::t('app', 'Active'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'XML_ID', 'NAME');
        return $list;
    }
}
