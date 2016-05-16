<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_session_data".
 *
 * @property integer $ID
 * @property string $DATE_FIRST
 * @property string $DATE_LAST
 * @property string $GUEST_MD5
 * @property integer $SESS_SESSION_ID
 * @property string $SESSION_DATA
 */
class BStatSessionData extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_session_data';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DATE_FIRST', 'DATE_LAST'], 'safe'],
            [['GUEST_MD5'], 'required'],
            [['SESS_SESSION_ID'], 'integer'],
            [['SESSION_DATA'], 'string'],
            [['GUEST_MD5'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DATE_FIRST' => Yii::t('app', 'Date  First'),
            'DATE_LAST' => Yii::t('app', 'Date  Last'),
            'GUEST_MD5' => Yii::t('app', 'Guest  Md5'),
            'SESS_SESSION_ID' => Yii::t('app', 'Sess  Session '),
            'SESSION_DATA' => Yii::t('app', 'Session  Data'),
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
