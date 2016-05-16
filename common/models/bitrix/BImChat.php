<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_im_chat".
 *
 * @property integer $ID
 * @property string $TITLE
 * @property string $DESCRIPTION
 * @property string $COLOR
 * @property string $TYPE
 * @property string $EXTRANET
 * @property integer $AUTHOR_ID
 * @property integer $AVATAR
 * @property integer $CALL_TYPE
 * @property string $CALL_NUMBER
 * @property string $ENTITY_TYPE
 * @property string $ENTITY_ID
 * @property integer $DISK_FOLDER_ID
 * @property integer $LAST_MESSAGE_ID
 */
class BImChat extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_im_chat';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DESCRIPTION'], 'string'],
            [['AUTHOR_ID'], 'required'],
            [['AUTHOR_ID', 'AVATAR', 'CALL_TYPE', 'DISK_FOLDER_ID', 'LAST_MESSAGE_ID'], 'integer'],
            [['TITLE', 'COLOR'], 'string', 'max' => 255],
            [['TYPE', 'EXTRANET'], 'string', 'max' => 1],
            [['CALL_NUMBER'], 'string', 'max' => 20],
            [['ENTITY_TYPE', 'ENTITY_ID'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TITLE' => Yii::t('app', 'Title'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'COLOR' => Yii::t('app', 'Color'),
            'TYPE' => Yii::t('app', 'Type'),
            'EXTRANET' => Yii::t('app', 'Extranet'),
            'AUTHOR_ID' => Yii::t('app', 'Author '),
            'AVATAR' => Yii::t('app', 'Avatar'),
            'CALL_TYPE' => Yii::t('app', 'Call  Type'),
            'CALL_NUMBER' => Yii::t('app', 'Call  Number'),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'DISK_FOLDER_ID' => Yii::t('app', 'Disk  Folder '),
            'LAST_MESSAGE_ID' => Yii::t('app', 'Last  Message '),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
