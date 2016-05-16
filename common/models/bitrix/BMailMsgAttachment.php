<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_msg_attachment".
 *
 * @property integer $ID
 * @property integer $MESSAGE_ID
 * @property integer $FILE_ID
 * @property string $FILE_NAME
 * @property integer $FILE_SIZE
 * @property resource $FILE_DATA
 * @property string $CONTENT_TYPE
 * @property integer $IMAGE_WIDTH
 * @property integer $IMAGE_HEIGHT
 */
class BMailMsgAttachment extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_msg_attachment';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['MESSAGE_ID'], 'required'],
            [['MESSAGE_ID', 'FILE_ID', 'FILE_SIZE', 'IMAGE_WIDTH', 'IMAGE_HEIGHT'], 'integer'],
            [['FILE_DATA'], 'string'],
            [['FILE_NAME', 'CONTENT_TYPE'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MESSAGE_ID' => Yii::t('app', 'Message '),
            'FILE_ID' => Yii::t('app', 'File '),
            'FILE_NAME' => Yii::t('app', 'File  Name'),
            'FILE_SIZE' => Yii::t('app', 'File  Size'),
            'FILE_DATA' => Yii::t('app', 'File  Data'),
            'CONTENT_TYPE' => Yii::t('app', 'Content  Type'),
            'IMAGE_WIDTH' => Yii::t('app', 'Image  Width'),
            'IMAGE_HEIGHT' => Yii::t('app', 'Image  Height'),
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
