<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_form_status".
 *
 * @property integer $ID
 * @property integer $FORM_ID
 * @property string $TIMESTAMP_X
 * @property string $ACTIVE
 * @property integer $C_SORT
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property string $DEFAULT_VALUE
 * @property string $CSS
 * @property string $HANDLER_OUT
 * @property string $HANDLER_IN
 * @property string $MAIL_EVENT_TYPE
 */
class BFormStatus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_form_status';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FORM_ID', 'C_SORT'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['TITLE'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['ACTIVE', 'DEFAULT_VALUE'], 'string', 'max' => 1],
            [['TITLE', 'CSS', 'HANDLER_OUT', 'HANDLER_IN', 'MAIL_EVENT_TYPE'], 'string', 'max' => 255]
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
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'TITLE' => Yii::t('app', 'Title'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'DEFAULT_VALUE' => Yii::t('app', 'Default  Value'),
            'CSS' => Yii::t('app', 'Css'),
            'HANDLER_OUT' => Yii::t('app', 'Handler  Out'),
            'HANDLER_IN' => Yii::t('app', 'Handler  In'),
            'MAIL_EVENT_TYPE' => Yii::t('app', 'Mail  Event  Type'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
