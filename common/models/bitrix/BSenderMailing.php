<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_mailing".
 *
 * @property integer $ID
 * @property string $DATE_INSERT
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $ACTIVE
 * @property string $SITE_ID
 * @property integer $SORT
 * @property string $IS_PUBLIC
 * @property string $TRACK_CLICK
 * @property string $TRIGGER_FIELDS
 * @property string $EMAIL_FROM
 * @property string $IS_TRIGGER
 */
class BSenderMailing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_mailing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_INSERT'], 'safe'],
            [['DESCRIPTION', 'TRIGGER_FIELDS'], 'string'],
            [['SITE_ID'], 'required'],
            [['SORT'], 'integer'],
            [['NAME'], 'string', 'max' => 100],
            [['ACTIVE', 'IS_PUBLIC', 'TRACK_CLICK', 'IS_TRIGGER'], 'string', 'max' => 1],
            [['SITE_ID'], 'string', 'max' => 2],
            [['EMAIL_FROM'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'SORT' => Yii::t('app', 'Sort'),
            'IS_PUBLIC' => Yii::t('app', 'Is  Public'),
            'TRACK_CLICK' => Yii::t('app', 'Track  Click'),
            'TRIGGER_FIELDS' => Yii::t('app', 'Trigger  Fields'),
            'EMAIL_FROM' => Yii::t('app', 'Email  From'),
            'IS_TRIGGER' => Yii::t('app', 'Is  Trigger'),
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
