<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_status_2_mail_template".
 *
 * @property integer $STATUS_ID
 * @property integer $MAIL_TEMPLATE_ID
 */
class BFormStatus2MailTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_status_2_mail_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_ID', 'MAIL_TEMPLATE_ID'], 'required'],
            [['STATUS_ID', 'MAIL_TEMPLATE_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'STATUS_ID' => Yii::t('app', 'Status '),
            'MAIL_TEMPLATE_ID' => Yii::t('app', 'Mail  Template '),
        ];
    }

    public function getName()
    {
        return $this->STATUS_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'STATUS_ID', 'STATUS_ID');
        return $list;
    }
}
