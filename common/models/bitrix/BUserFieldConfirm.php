<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_field_confirm".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $DATE_CHANGE
 * @property string $FIELD
 * @property string $FIELD_VALUE
 * @property string $CONFIRM_CODE
 */
class BUserFieldConfirm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_field_confirm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'DATE_CHANGE', 'FIELD', 'FIELD_VALUE', 'CONFIRM_CODE'], 'required'],
            [['USER_ID'], 'integer'],
            [['DATE_CHANGE'], 'safe'],
            [['FIELD', 'FIELD_VALUE'], 'string', 'max' => 255],
            [['CONFIRM_CODE'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'DATE_CHANGE' => Yii::t('app', 'Date  Change'),
            'FIELD' => Yii::t('app', 'Field'),
            'FIELD_VALUE' => Yii::t('app', 'Field  Value'),
            'CONFIRM_CODE' => Yii::t('app', 'Confirm  Code'),
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
