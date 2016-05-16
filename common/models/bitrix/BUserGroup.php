<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_group".
 *
 * @property integer $USER_ID
 * @property integer $GROUP_ID
 * @property string $DATE_ACTIVE_FROM
 * @property string $DATE_ACTIVE_TO
 */
class BUserGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'GROUP_ID'], 'required'],
            [['USER_ID', 'GROUP_ID'], 'integer'],
            [['DATE_ACTIVE_FROM', 'DATE_ACTIVE_TO'], 'safe'],
            [['USER_ID', 'GROUP_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'GROUP_ID'], 'message' => 'The combination of User  and Group  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'DATE_ACTIVE_FROM' => Yii::t('app', 'Date  Active  From'),
            'DATE_ACTIVE_TO' => Yii::t('app', 'Date  Active  To'),
        ];
    }

    public function getName()
    {
        return $this->USER_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'USER_ID', 'USER_ID');
        return $list;
    }
}
