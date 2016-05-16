<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_session".
 *
 * @property string $SESSION_ID
 * @property string $TIMESTAMP_X
 * @property string $SESSION_DATA
 */
class BSecSession extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_session';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SESSION_ID', 'TIMESTAMP_X'], 'required'],
            [['TIMESTAMP_X'], 'safe'],
            [['SESSION_DATA'], 'string'],
            [['SESSION_ID'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SESSION_ID' => Yii::t('app', 'Session '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'SESSION_DATA' => Yii::t('app', 'Session  Data'),
        ];
    }

    public function getName()
    {
        return $this->SESSION_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SESSION_ID', 'SESSION_ID');
        return $list;
    }
}
