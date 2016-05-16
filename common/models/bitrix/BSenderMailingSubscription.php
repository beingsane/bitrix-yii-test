<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_mailing_subscription".
 *
 * @property integer $MAILING_ID
 * @property integer $CONTACT_ID
 * @property string $DATE_INSERT
 * @property string $IS_UNSUB
 */
class BSenderMailingSubscription extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_mailing_subscription';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MAILING_ID', 'CONTACT_ID', 'IS_UNSUB'], 'required'],
            [['MAILING_ID', 'CONTACT_ID'], 'integer'],
            [['DATE_INSERT'], 'safe'],
            [['IS_UNSUB'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MAILING_ID' => Yii::t('app', 'Mailing '),
            'CONTACT_ID' => Yii::t('app', 'Contact '),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'IS_UNSUB' => Yii::t('app', 'Is  Unsub'),
        ];
    }

    public function getName()
    {
        return $this->MAILING_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'MAILING_ID', 'MAILING_ID');
        return $list;
    }
}
