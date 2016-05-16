<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_mailing_group".
 *
 * @property integer $MAILING_ID
 * @property integer $GROUP_ID
 * @property integer $INCLUDE
 */
class BSenderMailingGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_mailing_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MAILING_ID', 'GROUP_ID', 'INCLUDE'], 'required'],
            [['MAILING_ID', 'GROUP_ID', 'INCLUDE'], 'integer'],
            [['MAILING_ID', 'GROUP_ID', 'INCLUDE'], 'unique', 'targetAttribute' => ['MAILING_ID', 'GROUP_ID', 'INCLUDE'], 'message' => 'The combination of Mailing , Group  and Include has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'MAILING_ID' => Yii::t('app', 'Mailing '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'INCLUDE' => Yii::t('app', 'Include'),
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
