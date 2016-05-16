<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_culture".
 *
 * @property integer $ID
 * @property string $CODE
 * @property string $NAME
 * @property string $FORMAT_DATE
 * @property string $FORMAT_DATETIME
 * @property string $FORMAT_NAME
 * @property integer $WEEK_START
 * @property string $CHARSET
 * @property string $DIRECTION
 */
class BCulture extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_culture';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['WEEK_START'], 'integer'],
            [['CODE', 'NAME', 'FORMAT_DATE', 'FORMAT_DATETIME', 'FORMAT_NAME', 'CHARSET'], 'string', 'max' => 255],
            [['DIRECTION'], 'string', 'max' => 1]
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
            'NAME' => Yii::t('app', 'Name'),
            'FORMAT_DATE' => Yii::t('app', 'Format  Date'),
            'FORMAT_DATETIME' => Yii::t('app', 'Format  Datetime'),
            'FORMAT_NAME' => Yii::t('app', 'Format  Name'),
            'WEEK_START' => Yii::t('app', 'Week  Start'),
            'CHARSET' => Yii::t('app', 'Charset'),
            'DIRECTION' => Yii::t('app', 'Direction'),
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
