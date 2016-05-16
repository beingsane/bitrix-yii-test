<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_medialib_collection".
 *
 * @property integer $ID
 * @property string $NAME
 * @property string $DESCRIPTION
 * @property string $ACTIVE
 * @property string $DATE_UPDATE
 * @property integer $OWNER_ID
 * @property integer $PARENT_ID
 * @property string $SITE_ID
 * @property string $KEYWORDS
 * @property integer $ITEMS_COUNT
 * @property integer $ML_TYPE
 */
class BMedialibCollection extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_medialib_collection';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'DATE_UPDATE'], 'required'],
            [['DESCRIPTION'], 'string'],
            [['DATE_UPDATE'], 'safe'],
            [['OWNER_ID', 'PARENT_ID', 'ITEMS_COUNT', 'ML_TYPE'], 'integer'],
            [['NAME', 'KEYWORDS'], 'string', 'max' => 255],
            [['ACTIVE'], 'string', 'max' => 1],
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
            'NAME' => Yii::t('app', 'Name'),
            'DESCRIPTION' => Yii::t('app', 'Description'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'OWNER_ID' => Yii::t('app', 'Owner '),
            'PARENT_ID' => Yii::t('app', 'Parent '),
            'SITE_ID' => Yii::t('app', 'Site '),
            'KEYWORDS' => Yii::t('app', 'Keywords'),
            'ITEMS_COUNT' => Yii::t('app', 'Items  Count'),
            'ML_TYPE' => Yii::t('app', 'Ml  Type'),
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
