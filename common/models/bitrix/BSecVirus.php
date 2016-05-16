<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_virus".
 *
 * @property string $ID
 * @property string $TIMESTAMP_X
 * @property string $SITE_ID
 * @property string $SENT
 * @property string $INFO
 */
class BSecVirus extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_virus';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'TIMESTAMP_X', 'INFO'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['INFO'], 'string'],
            [['ID'], 'string', 'max' => 32],
            [['SITE_ID'], 'string', 'max' => 2],
            [['SENT'], 'string', 'max' => 1]
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
            'SITE_ID' => Yii::t('app', 'Site '),
            'SENT' => Yii::t('app', 'Sent'),
            'INFO' => Yii::t('app', 'Info'),
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
