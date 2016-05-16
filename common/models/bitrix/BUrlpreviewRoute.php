<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_urlpreview_route".
 *
 * @property integer $ID
 * @property string $ROUTE
 * @property string $MODULE
 * @property string $CLASS
 * @property string $PARAMETERS
 */
class BUrlpreviewRoute extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_urlpreview_route';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ROUTE', 'MODULE', 'CLASS'], 'required'],
            [['PARAMETERS'], 'string'],
            [['ROUTE'], 'string', 'max' => 200],
            [['MODULE'], 'string', 'max' => 50],
            [['CLASS'], 'string', 'max' => 150],
            [['ROUTE'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ROUTE' => Yii::t('app', 'Route'),
            'MODULE' => Yii::t('app', 'Module'),
            'CLASS' => Yii::t('app', 'Class'),
            'PARAMETERS' => Yii::t('app', 'Parameters'),
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
