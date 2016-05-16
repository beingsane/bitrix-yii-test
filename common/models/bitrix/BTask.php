<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_task".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $LETTER
 * @property string $MODULE_ID
 * @property string $SYS
 * @property string $DESCRIPTION
 * @property string $BINDING
 */
class BTask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_task';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'MODULE_ID', 'SYS'], 'required'],
            [['NAME'], 'string', 'max' => 100],
            [['LETTER', 'SYS'], 'string', 'max' => 1],
            [['MODULE_ID', 'BINDING'], 'string', 'max' => 50],
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
            'LETTER' => Yii::t('app', 'Letter'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'SYS' => Yii::t('app', 'Sys'),
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
