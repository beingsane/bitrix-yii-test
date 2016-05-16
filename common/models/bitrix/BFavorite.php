<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_favorite".
 *
 * @property integer $ID
 * @property string $TIMESTAMP_X
 * @property string $DATE_CREATE
 * @property integer $C_SORT
 * @property integer $MODIFIED_BY
 * @property integer $CREATED_BY
 * @property string $MODULE_ID
 * @property string $NAME
 * @property string $URL
 * @property string $COMMENTS
 * @property string $LANGUAGE_ID
 * @property integer $USER_ID
 * @property integer $CODE_ID
 * @property string $COMMON
 * @property string $MENU_ID
 */
class BFavorite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_favorite';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['C_SORT', 'MODIFIED_BY', 'CREATED_BY', 'USER_ID', 'CODE_ID'], 'integer'],
            [['URL', 'COMMENTS'], 'string'],
            [['MODULE_ID'], 'string', 'max' => 50],
            [['NAME', 'MENU_ID'], 'string', 'max' => 255],
            [['LANGUAGE_ID'], 'string', 'max' => 2],
            [['COMMON'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'C_SORT' => Yii::t('app', 'C  Sort'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'MODULE_ID' => Yii::t('app', 'Module '),
            'NAME' => Yii::t('app', 'Name'),
            'URL' => Yii::t('app', 'Url'),
            'COMMENTS' => Yii::t('app', 'Comments'),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
            'USER_ID' => Yii::t('app', 'User '),
            'CODE_ID' => Yii::t('app', 'Code '),
            'COMMON' => Yii::t('app', 'Common'),
            'MENU_ID' => Yii::t('app', 'Menu '),
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
