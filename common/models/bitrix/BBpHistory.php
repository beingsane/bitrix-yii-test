<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_bp_history".
 *
 * @property integer $ID
 * @property string $MODULE_ID
 * @property string $ENTITY
 * @property string $DOCUMENT_ID
 * @property string $NAME
 * @property resource $DOCUMENT
 * @property string $MODIFIED
 * @property integer $USER_ID
 */
class BBpHistory extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_bp_history';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ENTITY', 'DOCUMENT_ID', 'NAME', 'MODIFIED'], 'required'],
            [['DOCUMENT'], 'string'],
            [['MODIFIED'], 'safe'],
            [['USER_ID'], 'integer'],
            [['MODULE_ID'], 'string', 'max' => 32],
            [['ENTITY'], 'string', 'max' => 64],
            [['DOCUMENT_ID'], 'string', 'max' => 128],
            [['NAME'], 'string', 'max' => 255]
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
            'ENTITY' => Yii::t('app', 'Entity'),
            'DOCUMENT_ID' => Yii::t('app', 'Document '),
            'NAME' => Yii::t('app', 'Name'),
            'DOCUMENT' => Yii::t('app', 'Document'),
            'MODIFIED' => Yii::t('app', 'Modified'),
            'USER_ID' => Yii::t('app', 'User '),
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
