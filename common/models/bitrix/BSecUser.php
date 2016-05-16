<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_user".
 *
 * @property integer $USER_ID
 * @property string $ACTIVE
 * @property string $SECRET
 * @property string $TYPE
 * @property string $PARAMS
 * @property integer $ATTEMPTS
 * @property string $INITIAL_DATE
 * @property string $SKIP_MANDATORY
 * @property string $DEACTIVATE_UNTIL
 */
class BSecUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'TYPE'], 'required'],
            [['USER_ID', 'ATTEMPTS'], 'integer'],
            [['PARAMS'], 'string'],
            [['INITIAL_DATE', 'DEACTIVATE_UNTIL'], 'safe'],
            [['ACTIVE', 'SKIP_MANDATORY'], 'string', 'max' => 1],
            [['SECRET'], 'string', 'max' => 64],
            [['TYPE'], 'string', 'max' => 16]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SECRET' => Yii::t('app', 'Secret'),
            'TYPE' => Yii::t('app', 'Type'),
            'PARAMS' => Yii::t('app', 'Params'),
            'ATTEMPTS' => Yii::t('app', 'Attempts'),
            'INITIAL_DATE' => Yii::t('app', 'Initial  Date'),
            'SKIP_MANDATORY' => Yii::t('app', 'Skip  Mandatory'),
            'DEACTIVATE_UNTIL' => Yii::t('app', 'Deactivate  Until'),
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
