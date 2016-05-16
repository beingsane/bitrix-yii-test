<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_operation".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $MODULE_ID
 * @property string $DESCRIPTION
 * @property string $BINDING
 */
class BOperation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_operation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'MODULE_ID'], 'required'],
            [['NAME', 'MODULE_ID', 'BINDING'], 'string', 'max' => 50],
            [['DESCRIPTION'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'BINDING' => Yii::t('app', 'Binding'),
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
