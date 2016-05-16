<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_clouds_file_bucket".
 *
 * @property integer $ID
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $READ_ONLY
 * @property string $SERVICE_ID
 * @property string $BUCKET
 * @property string $LOCATION
 * @property string $CNAME
 * @property integer $FILE_COUNT
 * @property double $FILE_SIZE
 * @property integer $LAST_FILE_ID
 * @property string $PREFIX
 * @property string $SETTINGS
 * @property string $FILE_RULES
 */
class BCloudsFileBucket extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_clouds_file_bucket';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT', 'FILE_COUNT', 'LAST_FILE_ID'], 'integer'],
            [['FILE_SIZE'], 'number'],
            [['SETTINGS', 'FILE_RULES'], 'string'],
            [['ACTIVE', 'READ_ONLY'], 'string', 'max' => 1],
            [['SERVICE_ID', 'LOCATION'], 'string', 'max' => 50],
            [['BUCKET'], 'string', 'max' => 63],
            [['CNAME', 'PREFIX'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'READ_ONLY' => Yii::t('app', 'Read  Only'),
            'SERVICE_ID' => Yii::t('app', 'Service '),
            'BUCKET' => Yii::t('app', 'Bucket'),
            'LOCATION' => Yii::t('app', 'Location'),
            'CNAME' => Yii::t('app', 'Cname'),
            'FILE_COUNT' => Yii::t('app', 'File  Count'),
            'FILE_SIZE' => Yii::t('app', 'File  Size'),
            'LAST_FILE_ID' => Yii::t('app', 'Last  File '),
            'PREFIX' => Yii::t('app', 'Prefix'),
            'SETTINGS' => Yii::t('app', 'Settings'),
            'FILE_RULES' => Yii::t('app', 'File  Rules'),
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
