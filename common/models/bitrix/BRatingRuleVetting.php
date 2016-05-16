<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_rating_rule_vetting".
 *
 * @property integer $ID
 * @property integer $RULE_ID
 * @property string $ENTITY_TYPE_ID
 * @property integer $ENTITY_ID
 * @property string $ACTIVATE
 * @property string $APPLIED
 */
class BRatingRuleVetting extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_rating_rule_vetting';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['RULE_ID', 'ENTITY_TYPE_ID', 'ENTITY_ID'], 'required'],
            [['RULE_ID', 'ENTITY_ID'], 'integer'],
            [['ENTITY_TYPE_ID'], 'string', 'max' => 50],
            [['ACTIVATE', 'APPLIED'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'RULE_ID' => Yii::t('app', 'Rule '),
            'ENTITY_TYPE_ID' => Yii::t('app', 'Entity  Type '),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'ACTIVATE' => Yii::t('app', 'Activate'),
            'APPLIED' => Yii::t('app', 'Applied'),
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
