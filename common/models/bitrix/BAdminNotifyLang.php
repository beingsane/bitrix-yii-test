<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_admin_notify_lang".
 *
 * @property integer $ID
 * @property integer $NOTIFY_ID
 * @property string $LID
 * @property string $MESSAGE
 */
class BAdminNotifyLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_admin_notify_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NOTIFY_ID', 'LID'], 'required'],
            [['NOTIFY_ID'], 'integer'],
            [['MESSAGE'], 'string'],
            [['LID'], 'string', 'max' => 2],
            [['NOTIFY_ID', 'LID'], 'unique', 'targetAttribute' => ['NOTIFY_ID', 'LID'], 'message' => 'The combination of Notify  and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NOTIFY_ID' => Yii::t('app', 'Notify '),
            'LID' => Yii::t('app', 'Lid'),
            'MESSAGE' => Yii::t('app', 'Message'),
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
