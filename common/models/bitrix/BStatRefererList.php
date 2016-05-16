<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_stat_referer_list".
 *
 * @property integer $ID
 * @property integer $REFERER_ID
 * @property string $DATE_HIT
 * @property string $PROTOCOL
 * @property string $SITE_NAME
 * @property string $URL_FROM
 * @property string $URL_TO
 * @property string $URL_TO_404
 * @property integer $SESSION_ID
 * @property integer $ADV_ID
 * @property string $SITE_ID
 */
class BStatRefererList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_stat_referer_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['REFERER_ID', 'SESSION_ID', 'ADV_ID'], 'integer'],
            [['DATE_HIT'], 'safe'],
            [['PROTOCOL', 'SITE_NAME', 'URL_FROM'], 'required'],
            [['URL_FROM', 'URL_TO'], 'string'],
            [['PROTOCOL'], 'string', 'max' => 10],
            [['SITE_NAME'], 'string', 'max' => 255],
            [['URL_TO_404'], 'string', 'max' => 1],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'REFERER_ID' => Yii::t('app', 'Referer '),
            'DATE_HIT' => Yii::t('app', 'Date  Hit'),
            'PROTOCOL' => Yii::t('app', 'Protocol'),
            'SITE_NAME' => Yii::t('app', 'Site  Name'),
            'URL_FROM' => Yii::t('app', 'Url  From'),
            'URL_TO' => Yii::t('app', 'Url  To'),
            'URL_TO_404' => Yii::t('app', 'Url  To 404'),
            'SESSION_ID' => Yii::t('app', 'Session '),
            'ADV_ID' => Yii::t('app', 'Adv '),
            'SITE_ID' => Yii::t('app', 'Site '),
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
