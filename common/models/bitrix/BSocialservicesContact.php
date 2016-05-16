<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_socialservices_contact".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property integer $USER_ID
 * @property integer $CONTACT_USER_ID
 * @property integer $CONTACT_XML_ID
 * @property string $CONTACT_NAME
 * @property string $CONTACT_LAST_NAME
 * @property string $CONTACT_PHOTO
 * @property string $LAST_AUTHORIZE
 * @property string $NOTIFY
 */
class BSocialservicesContact extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_socialservices_contact';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'LAST_AUTHORIZE'], 'safe'],
            [['USER_ID'], 'required'],
            [['USER_ID', 'CONTACT_USER_ID', 'CONTACT_XML_ID'], 'integer'],
            [['CONTACT_NAME', 'CONTACT_LAST_NAME', 'CONTACT_PHOTO'], 'string', 'max' => 255],
            [['NOTIFY'], 'string', 'max' => 1]
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
            'USER_ID' => Yii::t('app', 'User '),
            'CONTACT_USER_ID' => Yii::t('app', 'Contact  User '),
            'CONTACT_XML_ID' => Yii::t('app', 'Contact  Xml '),
            'CONTACT_NAME' => Yii::t('app', 'Contact  Name'),
            'CONTACT_LAST_NAME' => Yii::t('app', 'Contact  Last  Name'),
            'CONTACT_PHOTO' => Yii::t('app', 'Contact  Photo'),
            'LAST_AUTHORIZE' => Yii::t('app', 'Last  Authorize'),
            'NOTIFY' => Yii::t('app', 'Notify'),
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
