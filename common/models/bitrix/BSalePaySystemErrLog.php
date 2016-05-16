<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_pay_system_err_log".
 *
 * @property integer $ID
 * @property string $MESSAGE
 * @property string $ACTION
 * @property string $DATE_INSERT
 */
class BSalePaySystemErrLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_pay_system_err_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MESSAGE', 'ACTION', 'DATE_INSERT'], 'required'],
            [['MESSAGE'], 'string'],
            [['DATE_INSERT'], 'safe'],
            [['ACTION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'ACTION' => Yii::t('app', 'Action'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
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
