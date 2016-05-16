<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_adv_guest".
 *
 * @property integer $ID
 * @property integer $ADV_ID
 * @property string $BACK
 * @property integer $GUEST_ID
 * @property string $DATE_GUEST_HIT
 * @property string $DATE_HOST_HIT
 * @property integer $SESSION_ID
 * @property string $IP
 * @property string $IP_NUMBER
 */
class BStatAdvGuest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_adv_guest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ADV_ID', 'GUEST_ID', 'SESSION_ID', 'IP_NUMBER'], 'integer'],
            [['DATE_GUEST_HIT', 'DATE_HOST_HIT'], 'safe'],
            [['BACK'], 'string', 'max' => 1],
            [['IP'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ADV_ID' => Yii::t('app', 'Adv '),
            'BACK' => Yii::t('app', 'Back'),
            'GUEST_ID' => Yii::t('app', 'Guest '),
            'DATE_GUEST_HIT' => Yii::t('app', 'Date  Guest  Hit'),
            'DATE_HOST_HIT' => Yii::t('app', 'Date  Host  Hit'),
            'SESSION_ID' => Yii::t('app', 'Session '),
            'IP' => Yii::t('app', 'Ip'),
            'IP_NUMBER' => Yii::t('app', 'Ip  Number'),
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
