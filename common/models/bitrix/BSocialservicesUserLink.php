<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_socialservices_user_link".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $SOCSERV_USER_ID
 * @property integer $LINK_USER_ID
 * @property string $LINK_UID
 * @property string $LINK_NAME
 * @property string $LINK_LAST_NAME
 * @property string $LINK_PICTURE
 * @property string $LINK_EMAIL
 * @property string $TIMESTAMP_X
 */
class BSocialservicesUserLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_socialservices_user_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'SOCSERV_USER_ID', 'LINK_UID'], 'required'],
            [['USER_ID', 'SOCSERV_USER_ID', 'LINK_USER_ID'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['LINK_UID'], 'string', 'max' => 100],
            [['LINK_NAME', 'LINK_LAST_NAME', 'LINK_PICTURE', 'LINK_EMAIL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'SOCSERV_USER_ID' => Yii::t('app', 'Socserv  User '),
            'LINK_USER_ID' => Yii::t('app', 'Link  User '),
            'LINK_UID' => Yii::t('app', 'Link  Uid'),
            'LINK_NAME' => Yii::t('app', 'Link  Name'),
            'LINK_LAST_NAME' => Yii::t('app', 'Link  Last  Name'),
            'LINK_PICTURE' => Yii::t('app', 'Link  Picture'),
            'LINK_EMAIL' => Yii::t('app', 'Link  Email'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
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
