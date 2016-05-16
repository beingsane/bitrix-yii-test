<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_blog_user".
 *
 * @property integer $ID
 * @property integer $USER_ID
 * @property string $ALIAS
 * @property string $DESCRIPTION
 * @property integer $AVATAR
 * @property string $INTERESTS
 * @property string $LAST_VISIT
 * @property string $DATE_REG
 * @property string $ALLOW_POST
 */
class BBlogUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_blog_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_ID', 'DATE_REG'], 'required'],
            [['USER_ID', 'AVATAR'], 'integer'],
            [['DESCRIPTION'], 'string'],
            [['LAST_VISIT', 'DATE_REG'], 'safe'],
            [['ALIAS', 'INTERESTS'], 'string', 'max' => 255],
            [['ALLOW_POST'], 'string', 'max' => 1],
            [['USER_ID'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_ID' => Yii::t('app', 'User '),
            'ALIAS' => Yii::t('app', 'Alias'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'AVATAR' => Yii::t('app', 'Avatar'),
            'INTERESTS' => Yii::t('app', 'Interests'),
            'LAST_VISIT' => Yii::t('app', 'Last  Visit'),
            'DATE_REG' => Yii::t('app', 'Date  Reg'),
            'ALLOW_POST' => Yii::t('app', 'Allow  Post'),
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
