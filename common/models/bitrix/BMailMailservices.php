<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_mailservices".
 *
 * @property integer $ID
 * @property string $SITE_ID
 * @property string $ACTIVE
 * @property string $SERVICE_TYPE
 * @property string $NAME
 * @property string $SERVER
 * @property integer $PORT
 * @property string $ENCRYPTION
 * @property string $LINK
 * @property integer $ICON
 * @property string $TOKEN
 * @property integer $FLAGS
 * @property integer $SORT
 */
class BMailMailservices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_mailservices';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SITE_ID', 'NAME'], 'required'],
            [['PORT', 'ICON', 'FLAGS', 'SORT'], 'integer'],
            [['SITE_ID', 'NAME', 'SERVER', 'LINK', 'TOKEN'], 'string', 'max' => 255],
            [['ACTIVE', 'ENCRYPTION'], 'string', 'max' => 1],
            [['SERVICE_TYPE'], 'string', 'max' => 10]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SERVICE_TYPE' => Yii::t('app', 'Service  Type'),
            'NAME' => Yii::t('app', 'Name'),
            'SERVER' => Yii::t('app', 'Server'),
            'PORT' => Yii::t('app', 'Port'),
            'ENCRYPTION' => Yii::t('app', 'Encryption'),
            'LINK' => Yii::t('app', 'Link'),
            'ICON' => Yii::t('app', 'Icon'),
            'TOKEN' => Yii::t('app', 'Token'),
            'FLAGS' => Yii::t('app', 'Flags'),
            'SORT' => Yii::t('app', 'Sort'),
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
