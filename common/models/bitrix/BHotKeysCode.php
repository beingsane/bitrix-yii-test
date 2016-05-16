<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_hot_keys_code".
 *
 * @property integer $ID
 * @property string $CLASS_NAME
 * @property string $CODE
 * @property string $NAME
 * @property string $COMMENTS
 * @property string $TITLE_OBJ
 * @property string $URL
 * @property integer $IS_CUSTOM
 */
class BHotKeysCode extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_hot_keys_code';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IS_CUSTOM'], 'integer'],
            [['CLASS_NAME', 'TITLE_OBJ'], 'string', 'max' => 50],
            [['CODE', 'NAME', 'COMMENTS', 'URL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'CLASS_NAME' => Yii::t('app', 'Class  Name'),
            'CODE' => Yii::t('app', 'Code'),
            'NAME' => Yii::t('app', 'Name'),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'TITLE_OBJ' => Yii::t('app', 'Title  Obj'),
            'URL' => Yii::t('app', 'Url'),
            'IS_CUSTOM' => Yii::t('app', 'Is  Custom'),
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
