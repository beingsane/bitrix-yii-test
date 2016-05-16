<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_recovery_codes".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $CODE
 * @property string $USED
 * @property string $USING_DATE
 * @property string $USING_IP
 */
class BSecRecoveryCodes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_recovery_codes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'CODE'], 'required'],
            [['USER_ID'], 'integer'],
            [['USING_DATE'], 'safe'],
            [['CODE', 'USING_IP'], 'string', 'max' => 255],
            [['USED'], 'string', 'max' => 1]
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
            'CODE' => Yii::t('app', 'Code'),
            'USED' => Yii::t('app', 'Used'),
            'USING_DATE' => Yii::t('app', 'Using  Date'),
            'USING_IP' => Yii::t('app', 'Using  Ip'),
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
