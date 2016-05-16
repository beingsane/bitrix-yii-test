<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_user_perms".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $OPERATION_ID
 * @property string $RELATION_TYPE
 */
class BSonetUserPerms extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_user_perms';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'OPERATION_ID', 'RELATION_TYPE'], 'required'],
            [['USER_ID'], 'integer'],
            [['OPERATION_ID'], 'string', 'max' => 50],
            [['RELATION_TYPE'], 'string', 'max' => 1],
            [['USER_ID', 'OPERATION_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'OPERATION_ID'], 'message' => 'The combination of User  and Operation  has already been taken.']
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
            'OPERATION_ID' => Yii::t('app', 'Operation '),
            'RELATION_TYPE' => Yii::t('app', 'Relation  Type'),
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
