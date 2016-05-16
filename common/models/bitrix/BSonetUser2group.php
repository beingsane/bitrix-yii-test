<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_user2group".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $GROUP_ID
 * @property string $ROLE
 * @property string $DATE_CREATE
 * @property string $DATE_UPDATE
 * @property string $INITIATED_BY_TYPE
 * @property integer $INITIATED_BY_USER_ID
 * @property string $MESSAGE
 */
class BSonetUser2group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_user2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'GROUP_ID', 'DATE_CREATE', 'DATE_UPDATE', 'INITIATED_BY_USER_ID'], 'required'],
            [['USER_ID', 'GROUP_ID', 'INITIATED_BY_USER_ID'], 'integer'],
            [['DATE_CREATE', 'DATE_UPDATE'], 'safe'],
            [['MESSAGE'], 'string'],
            [['ROLE', 'INITIATED_BY_TYPE'], 'string', 'max' => 1],
            [['USER_ID', 'GROUP_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'GROUP_ID'], 'message' => 'The combination of User  and Group  has already been taken.']
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
            'GROUP_ID' => Yii::t('app', 'Group '),
            'ROLE' => Yii::t('app', 'Role'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'INITIATED_BY_TYPE' => Yii::t('app', 'Initiated  By  Type'),
            'INITIATED_BY_USER_ID' => Yii::t('app', 'Initiated  By  User '),
            'MESSAGE' => Yii::t('app', 'Message'),
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
