<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $LOGIN
 * @property string $PASSWORD
 * @property string $CHECKWORD
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $LAST_NAME
 * @property string $EMAIL
 * @property string $LAST_LOGIN
 * @property string $DATE_REGISTER
 * @property string $LID
 * @property string $PERSONAL_PROFESSION
 * @property string $PERSONAL_WWW
 * @property string $PERSONAL_ICQ
 * @property string $PERSONAL_GENDER
 * @property string $PERSONAL_BIRTHDATE
 * @property integer $PERSONAL_PHOTO
 * @property string $PERSONAL_PHONE
 * @property string $PERSONAL_FAX
 * @property string $PERSONAL_MOBILE
 * @property string $PERSONAL_PAGER
 * @property string $PERSONAL_STREET
 * @property string $PERSONAL_MAILBOX
 * @property string $PERSONAL_CITY
 * @property string $PERSONAL_STATE
 * @property string $PERSONAL_ZIP
 * @property string $PERSONAL_COUNTRY
 * @property string $PERSONAL_NOTES
 * @property string $WORK_COMPANY
 * @property string $WORK_DEPARTMENT
 * @property string $WORK_POSITION
 * @property string $WORK_WWW
 * @property string $WORK_PHONE
 * @property string $WORK_FAX
 * @property string $WORK_PAGER
 * @property string $WORK_STREET
 * @property string $WORK_MAILBOX
 * @property string $WORK_CITY
 * @property string $WORK_STATE
 * @property string $WORK_ZIP
 * @property string $WORK_COUNTRY
 * @property string $WORK_PROFILE
 * @property integer $WORK_LOGO
 * @property string $WORK_NOTES
 * @property string $ADMIN_NOTES
 * @property string $STORED_HASH
 * @property string $XML_ID
 * @property string $PERSONAL_BIRTHDAY
 * @property string $EXTERNAL_AUTH_ID
 * @property string $CHECKWORD_TIME
 * @property string $SECOND_NAME
 * @property string $CONFIRM_CODE
 * @property integer $LOGIN_ATTEMPTS
 * @property string $LAST_ACTIVITY_DATE
 * @property string $AUTO_TIME_ZONE
 * @property string $TIME_ZONE
 * @property integer $TIME_ZONE_OFFSET
 * @property string $TITLE
 * @property string $BX_USER_ID
 * @property string $LANGUAGE_ID
 */
class BUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'LAST_LOGIN', 'DATE_REGISTER', 'PERSONAL_BIRTHDAY', 'CHECKWORD_TIME', 'LAST_ACTIVITY_DATE'], 'safe'],
            [['LOGIN', 'PASSWORD', 'DATE_REGISTER'], 'required'],
            [['PERSONAL_PHOTO', 'WORK_LOGO', 'LOGIN_ATTEMPTS', 'TIME_ZONE_OFFSET'], 'integer'],
            [['PERSONAL_STREET', 'PERSONAL_NOTES', 'WORK_STREET', 'WORK_PROFILE', 'WORK_NOTES', 'ADMIN_NOTES'], 'string'],
            [['LOGIN', 'PASSWORD', 'CHECKWORD', 'NAME', 'LAST_NAME', 'PERSONAL_BIRTHDATE', 'SECOND_NAME', 'TIME_ZONE'], 'string', 'max' => 50],
            [['ACTIVE', 'PERSONAL_GENDER', 'AUTO_TIME_ZONE'], 'string', 'max' => 1],
            [['EMAIL', 'PERSONAL_PROFESSION', 'PERSONAL_WWW', 'PERSONAL_ICQ', 'PERSONAL_PHONE', 'PERSONAL_FAX', 'PERSONAL_MOBILE', 'PERSONAL_PAGER', 'PERSONAL_MAILBOX', 'PERSONAL_CITY', 'PERSONAL_STATE', 'PERSONAL_ZIP', 'PERSONAL_COUNTRY', 'WORK_COMPANY', 'WORK_DEPARTMENT', 'WORK_POSITION', 'WORK_WWW', 'WORK_PHONE', 'WORK_FAX', 'WORK_PAGER', 'WORK_MAILBOX', 'WORK_CITY', 'WORK_STATE', 'WORK_ZIP', 'WORK_COUNTRY', 'XML_ID', 'EXTERNAL_AUTH_ID', 'TITLE'], 'string', 'max' => 255],
            [['LID', 'LANGUAGE_ID'], 'string', 'max' => 2],
            [['STORED_HASH', 'BX_USER_ID'], 'string', 'max' => 32],
            [['CONFIRM_CODE'], 'string', 'max' => 8],
            [['LOGIN', 'EXTERNAL_AUTH_ID'], 'unique', 'targetAttribute' => ['LOGIN', 'EXTERNAL_AUTH_ID'], 'message' => 'The combination of Login and External  Auth  has already been taken.']
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
            'LOGIN' => Yii::t('app', 'Login'),
            'PASSWORD' => Yii::t('app', 'Password'),
            'CHECKWORD' => Yii::t('app', 'Checkword'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NAME' => Yii::t('app', 'Name'),
            'LAST_NAME' => Yii::t('app', 'Last  Name'),
            'EMAIL' => Yii::t('app', 'Email'),
            'LAST_LOGIN' => Yii::t('app', 'Last  Login'),
            'DATE_REGISTER' => Yii::t('app', 'Date  Register'),
            'LID' => Yii::t('app', 'Lid'),
            'PERSONAL_PROFESSION' => Yii::t('app', 'Personal  Profession'),
            'PERSONAL_WWW' => Yii::t('app', 'Personal  Www'),
            'PERSONAL_ICQ' => Yii::t('app', 'Personal  Icq'),
            'PERSONAL_GENDER' => Yii::t('app', 'Personal  Gender'),
            'PERSONAL_BIRTHDATE' => Yii::t('app', 'Personal  Birthdate'),
            'PERSONAL_PHOTO' => Yii::t('app', 'Personal  Photo'),
            'PERSONAL_PHONE' => Yii::t('app', 'Personal  Phone'),
            'PERSONAL_FAX' => Yii::t('app', 'Personal  Fax'),
            'PERSONAL_MOBILE' => Yii::t('app', 'Personal  Mobile'),
            'PERSONAL_PAGER' => Yii::t('app', 'Personal  Pager'),
            'PERSONAL_STREET' => Yii::t('app', 'Personal  Street'),
            'PERSONAL_MAILBOX' => Yii::t('app', 'Personal  Mailbox'),
            'PERSONAL_CITY' => Yii::t('app', 'Personal  City'),
            'PERSONAL_STATE' => Yii::t('app', 'Personal  State'),
            'PERSONAL_ZIP' => Yii::t('app', 'Personal  Zip'),
            'PERSONAL_COUNTRY' => Yii::t('app', 'Personal  Country'),
            'PERSONAL_NOTES' => Yii::t('app', 'Personal  Notes'),
            'WORK_COMPANY' => Yii::t('app', 'Work  Company'),
            'WORK_DEPARTMENT' => Yii::t('app', 'Work  Department'),
            'WORK_POSITION' => Yii::t('app', 'Work  Position'),
            'WORK_WWW' => Yii::t('app', 'Work  Www'),
            'WORK_PHONE' => Yii::t('app', 'Work  Phone'),
            'WORK_FAX' => Yii::t('app', 'Work  Fax'),
            'WORK_PAGER' => Yii::t('app', 'Work  Pager'),
            'WORK_STREET' => Yii::t('app', 'Work  Street'),
            'WORK_MAILBOX' => Yii::t('app', 'Work  Mailbox'),
            'WORK_CITY' => Yii::t('app', 'Work  City'),
            'WORK_STATE' => Yii::t('app', 'Work  State'),
            'WORK_ZIP' => Yii::t('app', 'Work  Zip'),
            'WORK_COUNTRY' => Yii::t('app', 'Work  Country'),
            'WORK_PROFILE' => Yii::t('app', 'Work  Profile'),
            'WORK_LOGO' => Yii::t('app', 'Work  Logo'),
            'WORK_NOTES' => Yii::t('app', 'Work  Notes'),
            'ADMIN_NOTES' => Yii::t('app', 'Admin  Notes'),
            'STORED_HASH' => Yii::t('app', 'Stored  Hash'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'PERSONAL_BIRTHDAY' => Yii::t('app', 'Personal  Birthday'),
            'EXTERNAL_AUTH_ID' => Yii::t('app', 'External  Auth '),
            'CHECKWORD_TIME' => Yii::t('app', 'Checkword  Time'),
            'SECOND_NAME' => Yii::t('app', 'Second  Name'),
            'CONFIRM_CODE' => Yii::t('app', 'Confirm  Code'),
            'LOGIN_ATTEMPTS' => Yii::t('app', 'Login  Attempts'),
            'LAST_ACTIVITY_DATE' => Yii::t('app', 'Last  Activity  Date'),
            'AUTO_TIME_ZONE' => Yii::t('app', 'Auto  Time  Zone'),
            'TIME_ZONE' => Yii::t('app', 'Time  Zone'),
            'TIME_ZONE_OFFSET' => Yii::t('app', 'Time  Zone  Offset'),
            'TITLE' => Yii::t('app', 'Title'),
            'BX_USER_ID' => Yii::t('app', 'Bx  User '),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
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
