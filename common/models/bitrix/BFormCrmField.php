<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_crm_field".
 *
 * @property integer $ID
 * @property integer $LINK_ID
 * @property integer $FIELD_ID
 * @property string $FIELD_ALT
 * @property string $CRM_FIELD
 */
class BFormCrmField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_crm_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LINK_ID', 'FIELD_ID'], 'integer'],
            [['FIELD_ALT'], 'string', 'max' => 100],
            [['CRM_FIELD'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LINK_ID' => Yii::t('app', 'Link '),
            'FIELD_ID' => Yii::t('app', 'Field '),
            'FIELD_ALT' => Yii::t('app', 'Field  Alt'),
            'CRM_FIELD' => Yii::t('app', 'Crm  Field'),
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
