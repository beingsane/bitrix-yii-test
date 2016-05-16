<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_user_relations".
 *
 * @property integer $ID
 * @property integer $FIRST_USER_ID
 * @property integer $SECOND_USER_ID
 * @property string $RELATION
 * @property string $DATE_CREATE
 * @property string $DATE_UPDATE
 * @property string $MESSAGE
 * @property string $INITIATED_BY
 */
class BSonetUserRelations extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_user_relations';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['FIRST_USER_ID', 'SECOND_USER_ID', 'DATE_CREATE', 'DATE_UPDATE'], 'required'],
            [['FIRST_USER_ID', 'SECOND_USER_ID'], 'integer'],
            [['DATE_CREATE', 'DATE_UPDATE'], 'safe'],
            [['MESSAGE'], 'string'],
            [['RELATION', 'INITIATED_BY'], 'string', 'max' => 1],
            [['FIRST_USER_ID', 'SECOND_USER_ID'], 'unique', 'targetAttribute' => ['FIRST_USER_ID', 'SECOND_USER_ID'], 'message' => 'The combination of First  User  and Second  User  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'FIRST_USER_ID' => Yii::t('app', 'First  User '),
            'SECOND_USER_ID' => Yii::t('app', 'Second  User '),
            'RELATION' => Yii::t('app', 'Relation'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'MESSAGE' => Yii::t('app', 'Message'),
            'INITIATED_BY' => Yii::t('app', 'Initiated  By'),
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
