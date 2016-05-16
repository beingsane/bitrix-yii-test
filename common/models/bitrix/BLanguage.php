<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_language".
 *
 * @property string $LID
 * @property integer $SORT
 * @property string $DEF
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $FORMAT_DATE
 * @property string $FORMAT_DATETIME
 * @property string $FORMAT_NAME
 * @property integer $WEEK_START
 * @property string $CHARSET
 * @property string $DIRECTION
 * @property integer $CULTURE_ID
 */
class BLanguage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_language';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'NAME'], 'required'],
            [['SORT', 'WEEK_START', 'CULTURE_ID'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['DEF', 'ACTIVE', 'DIRECTION'], 'string', 'max' => 1],
            [['NAME', 'FORMAT_DATE', 'FORMAT_DATETIME'], 'string', 'max' => 50],
            [['FORMAT_NAME', 'CHARSET'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LID' => Yii::t('app', 'Lid'),
            'SORT' => Yii::t('app', 'Sort'),
            'DEF' => Yii::t('app', 'Def'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'NAME' => Yii::t('app', 'Name'),
            'FORMAT_DATE' => Yii::t('app', 'Format  Date'),
            'FORMAT_DATETIME' => Yii::t('app', 'Format  Datetime'),
            'FORMAT_NAME' => Yii::t('app', 'Format  Name'),
            'WEEK_START' => Yii::t('app', 'Week  Start'),
            'CHARSET' => Yii::t('app', 'Charset'),
            'DIRECTION' => Yii::t('app', 'Direction'),
            'CULTURE_ID' => Yii::t('app', 'Culture '),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LID', 'NAME');
        return $list;
    }
}
