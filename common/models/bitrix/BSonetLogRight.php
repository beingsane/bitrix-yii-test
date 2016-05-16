<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_log_right".
 *
 * @property integer $ID
 * @property integer $LOG_ID
 * @property string $GROUP_CODE
 */
class BSonetLogRight extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_log_right';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOG_ID', 'GROUP_CODE'], 'required'],
            [['LOG_ID'], 'integer'],
            [['GROUP_CODE'], 'string', 'max' => 50],
            [['LOG_ID', 'GROUP_CODE'], 'unique', 'targetAttribute' => ['LOG_ID', 'GROUP_CODE'], 'message' => 'The combination of Log  and Group  Code has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LOG_ID' => Yii::t('app', 'Log '),
            'GROUP_CODE' => Yii::t('app', 'Group  Code'),
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
