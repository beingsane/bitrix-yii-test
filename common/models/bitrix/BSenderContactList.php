<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_contact_list".
 *
 * @property integer $CONTACT_ID
 * @property integer $LIST_ID
 */
class BSenderContactList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_contact_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CONTACT_ID', 'LIST_ID'], 'required'],
            [['CONTACT_ID', 'LIST_ID'], 'integer'],
            [['CONTACT_ID', 'LIST_ID'], 'unique', 'targetAttribute' => ['CONTACT_ID', 'LIST_ID'], 'message' => 'The combination of Contact  and List  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'CONTACT_ID' => Yii::t('app', 'Contact '),
            'LIST_ID' => Yii::t('app', 'List '),
        ];
    }

    public function getName()
    {
        return $this->CONTACT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'CONTACT_ID', 'CONTACT_ID');
        return $list;
    }
}
