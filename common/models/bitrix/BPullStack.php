<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_pull_stack".
 *
 * @property integer $ID
 * @property string $CHANNEL_ID
 * @property string $MESSAGE
 * @property string $DATE_CREATE
 */
class BPullStack extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_pull_stack';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['CHANNEL_ID', 'MESSAGE', 'DATE_CREATE'], 'required'],
            [['MESSAGE'], 'string'],
            [['DATE_CREATE'], 'safe'],
            [['CHANNEL_ID'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CHANNEL_ID' => Yii::t('app', 'Channel '),
            'MESSAGE' => Yii::t('app', 'Message'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
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
