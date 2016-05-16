<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_result_answer".
 *
 * @property integer $ID
 * @property integer $RESULT_ID
 * @property integer $FORM_ID
 * @property integer $FIELD_ID
 * @property integer $ANSWER_ID
 * @property string $ANSWER_TEXT
 * @property string $ANSWER_TEXT_SEARCH
 * @property string $ANSWER_VALUE
 * @property string $ANSWER_VALUE_SEARCH
 * @property string $USER_TEXT
 * @property string $USER_TEXT_SEARCH
 * @property string $USER_DATE
 * @property integer $USER_FILE_ID
 * @property string $USER_FILE_NAME
 * @property string $USER_FILE_IS_IMAGE
 * @property string $USER_FILE_HASH
 * @property string $USER_FILE_SUFFIX
 * @property integer $USER_FILE_SIZE
 */
class BFormResultAnswer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_result_answer';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RESULT_ID', 'FORM_ID', 'FIELD_ID', 'ANSWER_ID', 'USER_FILE_ID', 'USER_FILE_SIZE'], 'integer'],
            [['ANSWER_TEXT', 'ANSWER_TEXT_SEARCH', 'ANSWER_VALUE_SEARCH', 'USER_TEXT', 'USER_TEXT_SEARCH'], 'string'],
            [['USER_DATE'], 'safe'],
            [['ANSWER_VALUE', 'USER_FILE_NAME', 'USER_FILE_HASH', 'USER_FILE_SUFFIX'], 'string', 'max' => 255],
            [['USER_FILE_IS_IMAGE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'RESULT_ID' => Yii::t('app', 'Result '),
            'FORM_ID' => Yii::t('app', 'Form '),
            'FIELD_ID' => Yii::t('app', 'Field '),
            'ANSWER_ID' => Yii::t('app', 'Answer '),
            'ANSWER_TEXT' => Yii::t('app', 'Answer  Text'),
            'ANSWER_TEXT_SEARCH' => Yii::t('app', 'Answer  Text  Search'),
            'ANSWER_VALUE' => Yii::t('app', 'Answer  Value'),
            'ANSWER_VALUE_SEARCH' => Yii::t('app', 'Answer  Value  Search'),
            'USER_TEXT' => Yii::t('app', 'User  Text'),
            'USER_TEXT_SEARCH' => Yii::t('app', 'User  Text  Search'),
            'USER_DATE' => Yii::t('app', 'User  Date'),
            'USER_FILE_ID' => Yii::t('app', 'User  File '),
            'USER_FILE_NAME' => Yii::t('app', 'User  File  Name'),
            'USER_FILE_IS_IMAGE' => Yii::t('app', 'User  File  Is  Image'),
            'USER_FILE_HASH' => Yii::t('app', 'User  File  Hash'),
            'USER_FILE_SUFFIX' => Yii::t('app', 'User  File  Suffix'),
            'USER_FILE_SIZE' => Yii::t('app', 'User  File  Size'),
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
