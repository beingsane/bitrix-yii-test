<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_holidays".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $OPEN_TIME
 * @property string $DATE_FROM
 * @property string $DATE_TILL
 */
class BTicketHolidays extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_holidays';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'DATE_FROM', 'DATE_TILL'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['DATE_FROM', 'DATE_TILL'], 'safe'],
            [['NAME'], 'string', 'max' => 255],
            [['OPEN_TIME'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'OPEN_TIME' => Yii::t('app', 'Open  Time'),
            'DATE_FROM' => Yii::t('app', 'Date  From'),
            'DATE_TILL' => Yii::t('app', 'Date  Till'),
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
