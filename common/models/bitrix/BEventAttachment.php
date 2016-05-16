<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_event_attachment".
 *
 * @property integer $EVENT_ID
 * @property integer $FILE_ID
 */
class BEventAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_event_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['EVENT_ID', 'FILE_ID'], 'required'],
            [['EVENT_ID', 'FILE_ID'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'EVENT_ID' => Yii::t('app', 'Event '),
            'FILE_ID' => Yii::t('app', 'File '),
        ];
    }

    public function getName()
    {
        return $this->EVENT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'EVENT_ID', 'EVENT_ID');
        return $list;
    }
}
