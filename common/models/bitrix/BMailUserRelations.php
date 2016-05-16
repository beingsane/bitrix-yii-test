<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_mail_user_relations".
 *
 * @property string $TOKEN
 * @property string $SITE_ID
 * @property integer $USER_ID
 * @property string $ENTITY_TYPE
 * @property string $ENTITY_ID
 * @property string $ENTITY_LINK
 * @property string $BACKURL
 */
class BMailUserRelations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_mail_user_relations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TOKEN', 'USER_ID', 'ENTITY_TYPE'], 'required'],
            [['USER_ID'], 'integer'],
            [['TOKEN'], 'string', 'max' => 32],
            [['SITE_ID'], 'string', 'max' => 2],
            [['ENTITY_TYPE', 'ENTITY_ID', 'ENTITY_LINK', 'BACKURL'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TOKEN' => Yii::t('app', 'Token'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'USER_ID' => Yii::t('app', 'User '),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'ENTITY_LINK' => Yii::t('app', 'Entity  Link'),
            'BACKURL' => Yii::t('app', 'Backurl'),
        ];
    }

    public function getName()
    {
        return $this->TOKEN;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'TOKEN', 'TOKEN');
        return $list;
    }
}
