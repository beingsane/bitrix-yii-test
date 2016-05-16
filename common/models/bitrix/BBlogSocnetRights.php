<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_socnet_rights".
 *
 * @property integer $ID
 * @property integer $POST_ID
 * @property string $ENTITY_TYPE
 * @property integer $ENTITY_ID
 * @property string $ENTITY
 */
class BBlogSocnetRights extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_socnet_rights';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POST_ID', 'ENTITY_TYPE', 'ENTITY_ID', 'ENTITY'], 'required'],
            [['POST_ID', 'ENTITY_ID'], 'integer'],
            [['ENTITY_TYPE', 'ENTITY'], 'string', 'max' => 45]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'POST_ID' => Yii::t('app', 'Post '),
            'ENTITY_TYPE' => Yii::t('app', 'Entity  Type'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'ENTITY' => Yii::t('app', 'Entity'),
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
