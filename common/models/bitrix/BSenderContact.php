<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_contact".
 *
 * @property integer $ID
 * @property string $DATE_INSERT
 * @property string $DATE_UPDATE
 * @property string $NAME
 * @property string $EMAIL
 * @property string $PHONE
 * @property integer $USER_ID
 */
class BSenderContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_INSERT'], 'required'],
            [['DATE_INSERT', 'DATE_UPDATE'], 'safe'],
            [['USER_ID'], 'integer'],
            [['NAME', 'EMAIL'], 'string', 'max' => 255],
            [['PHONE'], 'string', 'max' => 20],
            [['EMAIL'], 'unique']
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
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'NAME' => Yii::t('app', 'Name'),
            'EMAIL' => Yii::t('app', 'Email'),
            'PHONE' => Yii::t('app', 'Phone'),
            'USER_ID' => Yii::t('app', 'User '),
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
