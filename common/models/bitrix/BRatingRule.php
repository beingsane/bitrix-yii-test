<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_rule".
 *
 * @property integer $ID
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $ENTITY_TYPE_ID
 * @property string $CONDITION_NAME
 * @property string $CONDITION_MODULE
 * @property string $CONDITION_CLASS
 * @property string $CONDITION_METHOD
 * @property string $CONDITION_CONFIG
 * @property string $ACTION_NAME
 * @property string $ACTION_CONFIG
 * @property string $ACTIVATE
 * @property string $ACTIVATE_CLASS
 * @property string $ACTIVATE_METHOD
 * @property string $DEACTIVATE
 * @property string $DEACTIVATE_CLASS
 * @property string $DEACTIVATE_METHOD
 * @property string $CREATED
 * @property string $LAST_MODIFIED
 * @property string $LAST_APPLIED
 */
class BRatingRule extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_rule';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'ENTITY_TYPE_ID', 'CONDITION_NAME', 'CONDITION_CLASS', 'CONDITION_METHOD', 'CONDITION_CONFIG', 'ACTION_NAME', 'ACTION_CONFIG', 'ACTIVATE_CLASS', 'ACTIVATE_METHOD', 'DEACTIVATE_CLASS', 'DEACTIVATE_METHOD'], 'required'],
            [['CONDITION_CONFIG', 'ACTION_CONFIG'], 'string'],
            [['CREATED', 'LAST_MODIFIED', 'LAST_APPLIED'], 'safe'],
            [['ACTIVE', 'ACTIVATE', 'DEACTIVATE'], 'string', 'max' => 1],
            [['NAME'], 'string', 'max' => 256],
            [['ENTITY_TYPE_ID', 'CONDITION_MODULE'], 'string', 'max' => 50],
            [['CONDITION_NAME', 'ACTION_NAME'], 'string', 'max' => 200],
            [['CONDITION_CLASS', 'CONDITION_METHOD', 'ACTIVATE_CLASS', 'ACTIVATE_METHOD', 'DEACTIVATE_CLASS', 'DEACTIVATE_METHOD'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NAME' => Yii::t('app', 'Name'),
            'ENTITY_TYPE_ID' => Yii::t('app', 'Entity  Type '),
            'CONDITION_NAME' => Yii::t('app', 'Condition  Name'),
            'CONDITION_MODULE' => Yii::t('app', 'Condition  Module'),
            'CONDITION_CLASS' => Yii::t('app', 'Condition  Class'),
            'CONDITION_METHOD' => Yii::t('app', 'Condition  Method'),
            'CONDITION_CONFIG' => Yii::t('app', 'Condition  Config'),
            'ACTION_NAME' => Yii::t('app', 'Action  Name'),
            'ACTION_CONFIG' => Yii::t('app', 'Action  Config'),
            'ACTIVATE' => Yii::t('app', 'Activate'),
            'ACTIVATE_CLASS' => Yii::t('app', 'Activate  Class'),
            'ACTIVATE_METHOD' => Yii::t('app', 'Activate  Method'),
            'DEACTIVATE' => Yii::t('app', 'Deactivate'),
            'DEACTIVATE_CLASS' => Yii::t('app', 'Deactivate  Class'),
            'DEACTIVATE_METHOD' => Yii::t('app', 'Deactivate  Method'),
            'CREATED' => Yii::t('app', 'Created'),
            'LAST_MODIFIED' => Yii::t('app', 'Last  Modified'),
            'LAST_APPLIED' => Yii::t('app', 'Last  Applied'),
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
