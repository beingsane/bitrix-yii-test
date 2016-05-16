<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_site_template".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $CONDITION
 * @property integer $SORT
 * @property string $TEMPLATE
 */
class BSiteTemplate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_site_template';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'TEMPLATE'], 'required'],
            [['SORT'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['CONDITION'], 'string', 'max' => 255],
            [['TEMPLATE'], 'string', 'max' => 50],
            [['SITE_ID', 'CONDITION', 'TEMPLATE'], 'unique', 'targetAttribute' => ['SITE_ID', 'CONDITION', 'TEMPLATE'], 'message' => 'The combination of Site , Condition and Template has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'CONDITION' => Yii::t('app', 'Condition'),
            'SORT' => Yii::t('app', 'Sort'),
            'TEMPLATE' => Yii::t('app', 'Template'),
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
