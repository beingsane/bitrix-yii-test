<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $NAME
 * @property string $SID
 * @property string $BUTTON
 * @property integer $C_SORT
 * @property string $FIRST_SITE_ID
 * @property integer $IMAGE_ID
 * @property string $USE_CAPTCHA
 * @property string $DESCRIPTION
 * @property string $DESCRIPTION_TYPE
 * @property string $FORM_TEMPLATE
 * @property string $USE_DEFAULT_TEMPLATE
 * @property string $SHOW_TEMPLATE
 * @property string $MAIL_EVENT_TYPE
 * @property string $SHOW_RESULT_TEMPLATE
 * @property string $PRINT_RESULT_TEMPLATE
 * @property string $EDIT_RESULT_TEMPLATE
 * @property string $FILTER_RESULT_TEMPLATE
 * @property string $TABLE_RESULT_TEMPLATE
 * @property string $USE_RESTRICTIONS
 * @property integer $RESTRICT_USER
 * @property integer $RESTRICT_TIME
 * @property string $RESTRICT_STATUS
 * @property string $STAT_EVENT1
 * @property string $STAT_EVENT2
 * @property string $STAT_EVENT3
 */
class BForm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X'], 'safe'],
            [['NAME', 'SID'], 'required'],
            [['C_SORT', 'IMAGE_ID', 'RESTRICT_USER', 'RESTRICT_TIME'], 'integer'],
            [['DESCRIPTION', 'FORM_TEMPLATE', 'FILTER_RESULT_TEMPLATE', 'TABLE_RESULT_TEMPLATE'], 'string'],
            [['NAME', 'BUTTON', 'SHOW_TEMPLATE', 'SHOW_RESULT_TEMPLATE', 'PRINT_RESULT_TEMPLATE', 'EDIT_RESULT_TEMPLATE', 'RESTRICT_STATUS', 'STAT_EVENT1', 'STAT_EVENT2', 'STAT_EVENT3'], 'string', 'max' => 255],
            [['SID', 'MAIL_EVENT_TYPE'], 'string', 'max' => 50],
            [['FIRST_SITE_ID'], 'string', 'max' => 2],
            [['USE_CAPTCHA', 'USE_DEFAULT_TEMPLATE', 'USE_RESTRICTIONS'], 'string', 'max' => 1],
            [['DESCRIPTION_TYPE'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'NAME' => Yii::t('app', 'Name'),
            'SID' => Yii::t('app', 'Sid'),
            'BUTTON' => Yii::t('app', 'Button'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'FIRST_SITE_ID' => Yii::t('app', 'First  Site '),
            'IMAGE_ID' => Yii::t('app', 'Image '),
            'USE_CAPTCHA' => Yii::t('app', 'Use  Captcha'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DESCRIPTION_TYPE' => Yii::t('app', 'Description  Type'),
            'FORM_TEMPLATE' => Yii::t('app', 'Form  Template'),
            'USE_DEFAULT_TEMPLATE' => Yii::t('app', 'Use  Default  Template'),
            'SHOW_TEMPLATE' => Yii::t('app', 'Show  Template'),
            'MAIL_EVENT_TYPE' => Yii::t('app', 'Mail  Event  Type'),
            'SHOW_RESULT_TEMPLATE' => Yii::t('app', 'Show  Result  Template'),
            'PRINT_RESULT_TEMPLATE' => Yii::t('app', 'Print  Result  Template'),
            'EDIT_RESULT_TEMPLATE' => Yii::t('app', 'Edit  Result  Template'),
            'FILTER_RESULT_TEMPLATE' => Yii::t('app', 'Filter  Result  Template'),
            'TABLE_RESULT_TEMPLATE' => Yii::t('app', 'Table  Result  Template'),
            'USE_RESTRICTIONS' => Yii::t('app', 'Use  Restrictions'),
            'RESTRICT_USER' => Yii::t('app', 'Restrict  User'),
            'RESTRICT_TIME' => Yii::t('app', 'Restrict  Time'),
            'RESTRICT_STATUS' => Yii::t('app', 'Restrict  Status'),
            'STAT_EVENT1' => Yii::t('app', 'Stat  Event1'),
            'STAT_EVENT2' => Yii::t('app', 'Stat  Event2'),
            'STAT_EVENT3' => Yii::t('app', 'Stat  Event3'),
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
