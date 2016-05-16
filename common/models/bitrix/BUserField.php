<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_field".
 *
 * @property integer $ID
 * @property string $ENTITY_ID
 * @property string $FIELD_NAME
 * @property string $USER_TYPE_ID
 * @property string $XML_ID
 * @property integer $SORT
 * @property string $MULTIPLE
 * @property string $MANDATORY
 * @property string $SHOW_FILTER
 * @property string $SHOW_IN_LIST
 * @property string $EDIT_IN_LIST
 * @property string $IS_SEARCHABLE
 * @property string $SETTINGS
 */
class BUserField extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_field';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT'], 'integer'],
            [['SETTINGS'], 'string'],
            [['ENTITY_ID', 'FIELD_NAME'], 'string', 'max' => 20],
            [['USER_TYPE_ID'], 'string', 'max' => 50],
            [['XML_ID'], 'string', 'max' => 255],
            [['MULTIPLE', 'MANDATORY', 'SHOW_FILTER', 'SHOW_IN_LIST', 'EDIT_IN_LIST', 'IS_SEARCHABLE'], 'string', 'max' => 1],
            [['ENTITY_ID', 'FIELD_NAME'], 'unique', 'targetAttribute' => ['ENTITY_ID', 'FIELD_NAME'], 'message' => 'The combination of Entity  and Field  Name has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'ENTITY_ID' => Yii::t('app', 'Entity '),
            'FIELD_NAME' => Yii::t('app', 'Field  Name'),
            'USER_TYPE_ID' => Yii::t('app', 'User  Type '),
            'XML_ID' => Yii::t('app', 'Xml '),
            'SORT' => Yii::t('app', 'Sort'),
            'MULTIPLE' => Yii::t('app', 'Multiple'),
            'MANDATORY' => Yii::t('app', 'Mandatory'),
            'SHOW_FILTER' => Yii::t('app', 'Show  Filter'),
            'SHOW_IN_LIST' => Yii::t('app', 'Show  In  List'),
            'EDIT_IN_LIST' => Yii::t('app', 'Edit  In  List'),
            'IS_SEARCHABLE' => Yii::t('app', 'Is  Searchable'),
            'SETTINGS' => Yii::t('app', 'Settings'),
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
