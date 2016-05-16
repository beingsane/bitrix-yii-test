<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_2_mail_template".
 *
 * @property integer $FORM_ID
 * @property integer $MAIL_TEMPLATE_ID
 */
class BForm2MailTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_2_mail_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORM_ID', 'MAIL_TEMPLATE_ID'], 'required'],
            [['FORM_ID', 'MAIL_TEMPLATE_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'FORM_ID' => Yii::t('app', 'Form '),
            'MAIL_TEMPLATE_ID' => Yii::t('app', 'Mail  Template '),
        ];
    }

    public function getName()
    {
        return $this->FORM_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'FORM_ID', 'FORM_ID');
        return $list;
    }
}
