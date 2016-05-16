<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_event_type".
 *
 * @property integer $ID
 * @property string $LID
 * @property string $EVENT_NAME
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property integer $SORT
 */
class BEventType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_event_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'EVENT_NAME'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['SORT'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['EVENT_NAME'], 'string', 'max' => 255],
            [['NAME'], 'string', 'max' => 100],
            [['EVENT_NAME', 'LID'], 'unique', 'targetAttribute' => ['EVENT_NAME', 'LID'], 'message' => 'The combination of Lid and Event  Name has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LID' => Yii::t('app', 'Lid'),
            'EVENT_NAME' => Yii::t('app', 'Event  Name'),
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'SORT' => Yii::t('app', 'Sort'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
