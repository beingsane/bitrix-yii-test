<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ldap_server".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $CODE
 * @property string $ACTIVE
 * @property string $SERVER
 * @property integer $PORT
 * @property string $ADMIN_LOGIN
 * @property string $ADMIN_PASSWORD
 * @property string $BASE_DN
 * @property string $GROUP_FILTER
 * @property string $GROUP_ID_ATTR
 * @property string $GROUP_NAME_ATTR
 * @property string $GROUP_MEMBERS_ATTR
 * @property string $USER_FILTER
 * @property string $USER_ID_ATTR
 * @property string $USER_NAME_ATTR
 * @property string $USER_LAST_NAME_ATTR
 * @property string $USER_EMAIL_ATTR
 * @property string $USER_GROUP_ATTR
 * @property string $USER_GROUP_ACCESSORY
 * @property string $USER_DEPARTMENT_ATTR
 * @property string $USER_MANAGER_ATTR
 * @property string $CONVERT_UTF8
 * @property integer $SYNC_PERIOD
 * @property string $FIELD_MAP
 * @property integer $ROOT_DEPARTMENT
 * @property string $DEFAULT_DEPARTMENT_NAME
 * @property string $IMPORT_STRUCT
 * @property string $STRUCT_HAVE_DEFAULT
 * @property string $SYNC
 * @property string $SYNC_ATTR
 * @property string $SYNC_LAST
 * @property integer $MAX_PAGE_SIZE
 * @property string $SYNC_USER_ADD
 */
class BLdapServer extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ldap_server';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'NAME', 'SERVER', 'ADMIN_LOGIN', 'ADMIN_PASSWORD', 'BASE_DN', 'GROUP_FILTER', 'GROUP_ID_ATTR', 'USER_FILTER', 'USER_ID_ATTR'], 'required'],
            [['TIMESTAMP_X', 'SYNC_LAST'], 'safe'],
            [['DESCRIPTION', 'FIELD_MAP'], 'string'],
            [['PORT', 'SYNC_PERIOD', 'ROOT_DEPARTMENT', 'MAX_PAGE_SIZE'], 'integer'],
            [['NAME', 'CODE', 'SERVER', 'ADMIN_LOGIN', 'ADMIN_PASSWORD', 'BASE_DN', 'GROUP_FILTER', 'GROUP_ID_ATTR', 'GROUP_NAME_ATTR', 'GROUP_MEMBERS_ATTR', 'USER_FILTER', 'USER_ID_ATTR', 'USER_NAME_ATTR', 'USER_LAST_NAME_ATTR', 'USER_EMAIL_ATTR', 'USER_GROUP_ATTR', 'USER_DEPARTMENT_ATTR', 'USER_MANAGER_ATTR', 'DEFAULT_DEPARTMENT_NAME', 'SYNC_ATTR'], 'string', 'max' => 255],
            [['ACTIVE', 'USER_GROUP_ACCESSORY', 'CONVERT_UTF8', 'IMPORT_STRUCT', 'STRUCT_HAVE_DEFAULT', 'SYNC', 'SYNC_USER_ADD'], 'string', 'max' => 1]
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
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'CODE' => Yii::t('app', 'Code'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SERVER' => Yii::t('app', 'Server'),
            'PORT' => Yii::t('app', 'Port'),
            'ADMIN_LOGIN' => Yii::t('app', 'Admin  Login'),
            'ADMIN_PASSWORD' => Yii::t('app', 'Admin  Password'),
            'BASE_DN' => Yii::t('app', 'Base  Dn'),
            'GROUP_FILTER' => Yii::t('app', 'Group  Filter'),
            'GROUP_ID_ATTR' => Yii::t('app', 'Group  Id  Attr'),
            'GROUP_NAME_ATTR' => Yii::t('app', 'Group  Name  Attr'),
            'GROUP_MEMBERS_ATTR' => Yii::t('app', 'Group  Members  Attr'),
            'USER_FILTER' => Yii::t('app', 'User  Filter'),
            'USER_ID_ATTR' => Yii::t('app', 'User  Id  Attr'),
            'USER_NAME_ATTR' => Yii::t('app', 'User  Name  Attr'),
            'USER_LAST_NAME_ATTR' => Yii::t('app', 'User  Last  Name  Attr'),
            'USER_EMAIL_ATTR' => Yii::t('app', 'User  Email  Attr'),
            'USER_GROUP_ATTR' => Yii::t('app', 'User  Group  Attr'),
            'USER_GROUP_ACCESSORY' => Yii::t('app', 'User  Group  Accessory'),
            'USER_DEPARTMENT_ATTR' => Yii::t('app', 'User  Department  Attr'),
            'USER_MANAGER_ATTR' => Yii::t('app', 'User  Manager  Attr'),
            'CONVERT_UTF8' => Yii::t('app', 'Convert  Utf8'),
            'SYNC_PERIOD' => Yii::t('app', 'Sync  Period'),
            'FIELD_MAP' => Yii::t('app', 'Field  Map'),
            'ROOT_DEPARTMENT' => Yii::t('app', 'Root  Department'),
            'DEFAULT_DEPARTMENT_NAME' => Yii::t('app', 'Default  Department  Name'),
            'IMPORT_STRUCT' => Yii::t('app', 'Import  Struct'),
            'STRUCT_HAVE_DEFAULT' => Yii::t('app', 'Struct  Have  Default'),
            'SYNC' => Yii::t('app', 'Sync'),
            'SYNC_ATTR' => Yii::t('app', 'Sync  Attr'),
            'SYNC_LAST' => Yii::t('app', 'Sync  Last'),
            'MAX_PAGE_SIZE' => Yii::t('app', 'Max  Page  Size'),
            'SYNC_USER_ADD' => Yii::t('app', 'Sync  User  Add'),
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
