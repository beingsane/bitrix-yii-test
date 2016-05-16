<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_event".
 *
 * @property integer $ID
 * @property string $EVENT_NAME
 * @property integer $MESSAGE_ID
 * @property string $LID
 * @property string $C_FIELDS
 * @property string $DATE_INSERT
 * @property string $DATE_EXEC
 * @property string $SUCCESS_EXEC
 * @property string $DUPLICATE
 */
class BEvent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EVENT_NAME', 'LID'], 'required'],
            [['MESSAGE_ID'], 'integer'],
            [['C_FIELDS'], 'string'],
            [['DATE_INSERT', 'DATE_EXEC'], 'safe'],
            [['EVENT_NAME', 'LID'], 'string', 'max' => 255],
            [['SUCCESS_EXEC', 'DUPLICATE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'EVENT_NAME' => Yii::t('app', 'Event  Name'),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
            'LID' => Yii::t('app', 'Lid'),
            'C_FIELDS' => Yii::t('app', 'C  Fields'),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'DATE_EXEC' => Yii::t('app', 'Date  Exec'),
            'SUCCESS_EXEC' => Yii::t('app', 'Success  Exec'),
            'DUPLICATE' => Yii::t('app', 'Duplicate'),
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
