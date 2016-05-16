<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_finder_dest".
 *
 * @property integer $USER_ID
 * @property string $CODE
 * @property integer $CODE_USER_ID
 * @property string $CODE_TYPE
 * @property string $CONTEXT
 * @property string $LAST_USE_DATE
 */
class BFinderDest extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_finder_dest';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'CODE', 'CONTEXT'], 'required'],
            [['USER_ID', 'CODE_USER_ID'], 'integer'],
            [['LAST_USE_DATE'], 'safe'],
            [['CODE'], 'string', 'max' => 30],
            [['CODE_TYPE'], 'string', 'max' => 10],
            [['CONTEXT'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'USER_ID' => Yii::t('app', 'User '),
            'CODE' => Yii::t('app', 'Code'),
            'CODE_USER_ID' => Yii::t('app', 'Code  User '),
            'CODE_TYPE' => Yii::t('app', 'Code  Type'),
            'CONTEXT' => Yii::t('app', 'Context'),
            'LAST_USE_DATE' => Yii::t('app', 'Last  Use  Date'),
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
