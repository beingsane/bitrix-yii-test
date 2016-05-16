<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_exceptions_log".
 *
 * @property string $DATE_REGISTERED
 * @property integer $CODE
 * @property string $MESSAGE
 * @property string $FFILE
 * @property integer $LINE
 * @property string $BACKTRACE
 */
class BLearnExceptionsLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_exceptions_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_REGISTERED', 'CODE', 'MESSAGE', 'FFILE', 'LINE', 'BACKTRACE'], 'required'],
            [['DATE_REGISTERED'], 'safe'],
            [['CODE', 'LINE'], 'integer'],
            [['MESSAGE', 'FFILE', 'BACKTRACE'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DATE_REGISTERED' => Yii::t('app', 'Date  Registered'),
            'CODE' => Yii::t('app', 'Code'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'FFILE' => Yii::t('app', 'Ffile'),
            'LINE' => Yii::t('app', 'Line'),
            'BACKTRACE' => Yii::t('app', 'Backtrace'),
        ];
    }

    public function getName()
    {
        return $this->DATE_REGISTERED;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'DATE_REGISTERED', 'DATE_REGISTERED');
        return $list;
    }
}
