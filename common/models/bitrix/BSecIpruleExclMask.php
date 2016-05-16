<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_iprule_excl_mask".
 *
 * @property integer $IPRULE_ID
 * @property string $RULE_MASK
 * @property integer $SORT
 * @property string $LIKE_MASK
 * @property string $PREG_MASK
 */
class BSecIpruleExclMask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_iprule_excl_mask';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IPRULE_ID', 'RULE_MASK'], 'required'],
            [['IPRULE_ID', 'SORT'], 'integer'],
            [['RULE_MASK', 'LIKE_MASK', 'PREG_MASK'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IPRULE_ID' => Yii::t('app', 'Iprule '),
            'RULE_MASK' => Yii::t('app', 'Rule  Mask'),
            'SORT' => Yii::t('app', 'Sort'),
            'LIKE_MASK' => Yii::t('app', 'Like  Mask'),
            'PREG_MASK' => Yii::t('app', 'Preg  Mask'),
        ];
    }

    public function getName()
    {
        return $this->IPRULE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IPRULE_ID', 'IPRULE_ID');
        return $list;
    }
}
