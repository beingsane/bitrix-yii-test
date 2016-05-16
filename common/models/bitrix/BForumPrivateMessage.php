<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_forum_private_message".
 *
 * @property string $ID
 * @property integer $AUTHOR_ID
 * @property integer $RECIPIENT_ID
 * @property string $POST_DATE
 * @property string $POST_SUBJ
 * @property string $POST_MESSAGE
 * @property integer $USER_ID
 * @property integer $FOLDER_ID
 * @property string $IS_READ
 * @property string $REQUEST_IS_READ
 * @property string $USE_SMILES
 */
class BForumPrivateMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_forum_private_message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['AUTHOR_ID', 'RECIPIENT_ID', 'USER_ID', 'FOLDER_ID'], 'integer'],
            [['POST_DATE', 'POST_SUBJ', 'POST_MESSAGE', 'USER_ID', 'FOLDER_ID', 'IS_READ', 'REQUEST_IS_READ', 'USE_SMILES'], 'required'],
            [['POST_DATE'], 'safe'],
            [['POST_MESSAGE'], 'string'],
            [['POST_SUBJ', 'IS_READ', 'USE_SMILES'], 'string', 'max' => 50],
            [['REQUEST_IS_READ'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'AUTHOR_ID' => Yii::t('app', 'Author '),
            'RECIPIENT_ID' => Yii::t('app', 'Recipient '),
            'POST_DATE' => Yii::t('app', 'Post  Date'),
            'POST_SUBJ' => Yii::t('app', 'Post  Subj'),
            'POST_MESSAGE' => Yii::t('app', 'Post  Message'),
            'USER_ID' => Yii::t('app', 'User '),
            'FOLDER_ID' => Yii::t('app', 'Folder '),
            'IS_READ' => Yii::t('app', 'Is  Read'),
            'REQUEST_IS_READ' => Yii::t('app', 'Request  Is  Read'),
            'USE_SMILES' => Yii::t('app', 'Use  Smiles'),
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
