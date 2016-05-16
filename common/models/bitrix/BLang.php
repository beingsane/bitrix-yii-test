<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_lang".
 *
 * @property string $LID
 * @property integer $SORT
 * @property string $DEF
 * @property string $ACTIVE
 * @property string $NAME
 * @property string $DIR
 * @property string $FORMAT_DATE
 * @property string $FORMAT_DATETIME
 * @property string $FORMAT_NAME
 * @property integer $WEEK_START
 * @property string $CHARSET
 * @property string $LANGUAGE_ID
 * @property string $DOC_ROOT
 * @property string $DOMAIN_LIMITED
 * @property string $SERVER_NAME
 * @property string $SITE_NAME
 * @property string $EMAIL
 * @property integer $CULTURE_ID
 */
class BLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'NAME', 'DIR', 'LANGUAGE_ID'], 'required'],
            [['SORT', 'WEEK_START', 'CULTURE_ID'], 'integer'],
            [['LID', 'LANGUAGE_ID'], 'string', 'max' => 2],
            [['DEF', 'ACTIVE', 'DOMAIN_LIMITED'], 'string', 'max' => 1],
            [['NAME', 'DIR', 'FORMAT_DATE', 'FORMAT_DATETIME'], 'string', 'max' => 50],
            [['FORMAT_NAME', 'CHARSET', 'DOC_ROOT', 'SERVER_NAME', 'SITE_NAME', 'EMAIL'], 'string', 'max' => 255]
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
            'DIR' => Yii::t('app', 'Dir'),
            'FORMAT_DATE' => Yii::t('app', 'Format  Date'),
            'FORMAT_DATETIME' => Yii::t('app', 'Format  Datetime'),
            'FORMAT_NAME' => Yii::t('app', 'Format  Name'),
            'WEEK_START' => Yii::t('app', 'Week  Start'),
            'CHARSET' => Yii::t('app', 'Charset'),
            'LANGUAGE_ID' => Yii::t('app', 'Language '),
            'DOC_ROOT' => Yii::t('app', 'Doc  Root'),
            'DOMAIN_LIMITED' => Yii::t('app', 'Domain  Limited'),
            'SERVER_NAME' => Yii::t('app', 'Server  Name'),
            'SITE_NAME' => Yii::t('app', 'Site  Name'),
            'EMAIL' => Yii::t('app', 'Email'),
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
