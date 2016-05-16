<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_crm_link".
 *
 * @property integer $ID
 * @property integer $FORM_ID
 * @property integer $CRM_ID
 * @property string $LINK_TYPE
 */
class BFormCrmLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_crm_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORM_ID', 'CRM_ID'], 'integer'],
            [['LINK_TYPE'], 'string', 'max' => 1],
            [['FORM_ID', 'CRM_ID'], 'unique', 'targetAttribute' => ['FORM_ID', 'CRM_ID'], 'message' => 'The combination of Form  and Crm  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FORM_ID' => Yii::t('app', 'Form '),
            'CRM_ID' => Yii::t('app', 'Crm '),
            'LINK_TYPE' => Yii::t('app', 'Link  Type'),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
