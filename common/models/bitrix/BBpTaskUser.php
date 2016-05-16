<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_task_user".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property integer $TASK_ID
 * @property integer $STATUS
 * @property string $DATE_UPDATE
 * @property integer $ORIGINAL_USER_ID
 */
class BBpTaskUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_task_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'TASK_ID'], 'required'],
            [['USER_ID', 'TASK_ID', 'STATUS', 'ORIGINAL_USER_ID'], 'integer'],
            [['DATE_UPDATE'], 'safe'],
            [['USER_ID', 'TASK_ID'], 'unique', 'targetAttribute' => ['USER_ID', 'TASK_ID'], 'message' => 'The combination of User  and Task  has already been taken.']
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
            'TASK_ID' => Yii::t('app', 'Task '),
            'STATUS' => Yii::t('app', 'Status'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'ORIGINAL_USER_ID' => Yii::t('app', 'Original  User '),
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
