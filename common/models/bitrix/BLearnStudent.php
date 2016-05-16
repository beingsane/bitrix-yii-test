<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_student".
 *
 * @property integer $USER_ID
 * @property integer $TRANSCRIPT
 * @property string $PUBLIC_PROFILE
 * @property string $RESUME
 */
class BLearnStudent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'TRANSCRIPT'], 'required'],
            [['USER_ID', 'TRANSCRIPT'], 'integer'],
            [['RESUME'], 'string'],
            [['PUBLIC_PROFILE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'TRANSCRIPT' => Yii::t('app', 'Transcript'),
            'PUBLIC_PROFILE' => Yii::t('app', 'Public  Profile'),
            'RESUME' => Yii::t('app', 'Resume'),
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
