<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_iprule_excl_ip".
 *
 * @property integer $IPRULE_ID
 * @property string $RULE_IP
 * @property integer $SORT
 * @property string $IP_START
 * @property string $IP_END
 */
class BSecIpruleExclIp extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_iprule_excl_ip';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IPRULE_ID', 'RULE_IP'], 'required'],
            [['IPRULE_ID', 'SORT', 'IP_START', 'IP_END'], 'integer'],
            [['RULE_IP'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IPRULE_ID' => Yii::t('app', 'Iprule '),
            'RULE_IP' => Yii::t('app', 'Rule  Ip'),
            'SORT' => Yii::t('app', 'Sort'),
            'IP_START' => Yii::t('app', 'Ip  Start'),
            'IP_END' => Yii::t('app', 'Ip  End'),
        ];
    }

    public function getName()
    {
        return $this->IPRULE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IPRULE_ID', 'IPRULE_ID');
        return $list;
    }
}
