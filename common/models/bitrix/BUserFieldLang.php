<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_field_lang".
 *
 * @property integer $USER_FIELD_ID
 * @property string $LANGUAGE_ID
 * @property string $EDIT_FORM_LABEL
 * @property string $LIST_COLUMN_LABEL
 * @property string $LIST_FILTER_LABEL
 * @property string $ERROR_MESSAGE
 * @property string $HELP_MESSAGE
 */
class BUserFieldLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_field_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_FIELD_ID', 'LANGUAGE_ID'], 'required'],
            [['USER_FIELD_ID'], 'integer'],
            [['LANGUAGE_ID'], 'string', 'max' => 2],
            [['EDIT_FORM_LABEL', 'LIST_COLUMN_LABEL', 'LIST_FILTER_LABEL', 'ERROR_MESSAGE', 'HELP_MESSAGE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_FIELD_ID' => Yii::t('app', 'User  Field '),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
            'EDIT_FORM_LABEL' => Yii::t('app', 'Edit  Form  Label'),
            'LIST_COLUMN_LABEL' => Yii::t('app', 'List  Column  Label'),
            'LIST_FILTER_LABEL' => Yii::t('app', 'List  Filter  Label'),
            'ERROR_MESSAGE' => Yii::t('app', 'Error  Message'),
            'HELP_MESSAGE' => Yii::t('app', 'Help  Message'),
        ];
    }

    public function getName()
    {
        return $this->USER_FIELD_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_FIELD_ID', 'USER_FIELD_ID');
        return $list;
    }
}
