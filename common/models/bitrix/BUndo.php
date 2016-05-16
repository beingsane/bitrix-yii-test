<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_undo".
 *
 * @property string $ID
 * @property string $MODULE_ID
 * @property string $UNDO_TYPE
 * @property string $UNDO_HANDLER
 * @property string $CONTENT
 * @property integer $USER_ID
 * @property integer $TIMESTAMP_X
 */
class BUndo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_undo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID'], 'required'],
            [['CONTENT'], 'string'],
            [['USER_ID', 'TIMESTAMP_X'], 'integer'],
            [['ID', 'UNDO_HANDLER'], 'string', 'max' => 255],
            [['MODULE_ID', 'UNDO_TYPE'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'UNDO_TYPE' => Yii::t('app', 'Undo  Type'),
            'UNDO_HANDLER' => Yii::t('app', 'Undo  Handler'),
            'CONTENT' => Yii::t('app', 'Content'),
            'USER_ID' => Yii::t('app', 'User '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
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
