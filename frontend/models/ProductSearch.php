<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Product;

/**
 * ProductSearch represents the model behind the search form about `common\models\Product`.
 */
class ProductSearch extends Model
{
    public $ID;
    public $TIMESTAMP_X;
    public $MODIFIED_BY;
    public $DATE_CREATE;
    public $CREATED_BY;
    public $IBLOCK_ID;
    public $IBLOCK_SECTION_ID;
    public $ACTIVE;
    public $ACTIVE_FROM;
    public $ACTIVE_TO;
    public $SORT;
    public $NAME;
    public $PREVIEW_PICTURE;
    public $PREVIEW_TEXT;
    public $PREVIEW_TEXT_TYPE;
    public $DETAIL_PICTURE;
    public $DETAIL_TEXT;
    public $DETAIL_TEXT_TYPE;
    public $SEARCHABLE_CONTENT;
    public $WF_STATUS_ID;
    public $WF_PARENT_ELEMENT_ID;
    public $WF_NEW;
    public $WF_LOCKED_BY;
    public $WF_DATE_LOCK;
    public $WF_COMMENTS;
    public $IN_SECTIONS;
    public $XML_ID;
    public $CODE;
    public $TAGS;
    public $TMP_ID;
    public $WF_LAST_HISTORY_ID;
    public $SHOW_COUNTER;
    public $SHOW_COUNTER_START;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'MODIFIED_BY', 'CREATED_BY', 'IBLOCK_ID', 'IBLOCK_SECTION_ID', 'SORT', 'PREVIEW_PICTURE', 'DETAIL_PICTURE', 'WF_STATUS_ID', 'WF_PARENT_ELEMENT_ID', 'WF_LOCKED_BY', 'WF_LAST_HISTORY_ID', 'SHOW_COUNTER'], 'integer'],
            [['TIMESTAMP_X', 'DATE_CREATE', 'ACTIVE', 'ACTIVE_FROM', 'ACTIVE_TO', 'NAME', 'PREVIEW_TEXT', 'PREVIEW_TEXT_TYPE', 'DETAIL_TEXT', 'DETAIL_TEXT_TYPE', 'SEARCHABLE_CONTENT', 'WF_NEW', 'WF_DATE_LOCK', 'WF_COMMENTS', 'IN_SECTIONS', 'XML_ID', 'CODE', 'TAGS', 'TMP_ID', 'SHOW_COUNTER_START'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'CREATED_BY' => Yii::t('app', 'Created  By'),
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'IBLOCK_SECTION_ID' => Yii::t('app', 'Iblock  Section '),
            'ACTIVE' => Yii::t('app', 'Active'),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'SORT' => Yii::t('app', 'Sort'),
            'NAME' => Yii::t('app', 'Name'),
            'PREVIEW_PICTURE' => Yii::t('app', 'Preview  Picture'),
            'PREVIEW_TEXT' => Yii::t('app', 'Preview  Text'),
            'PREVIEW_TEXT_TYPE' => Yii::t('app', 'Preview  Text  Type'),
            'DETAIL_PICTURE' => Yii::t('app', 'Detail  Picture'),
            'DETAIL_TEXT' => Yii::t('app', 'Detail  Text'),
            'DETAIL_TEXT_TYPE' => Yii::t('app', 'Detail  Text  Type'),
            'SEARCHABLE_CONTENT' => Yii::t('app', 'Searchable  Content'),
            'WF_STATUS_ID' => Yii::t('app', 'Wf  Status '),
            'WF_PARENT_ELEMENT_ID' => Yii::t('app', 'Wf  Parent  Element '),
            'WF_NEW' => Yii::t('app', 'Wf  New'),
            'WF_LOCKED_BY' => Yii::t('app', 'Wf  Locked  By'),
            'WF_DATE_LOCK' => Yii::t('app', 'Wf  Date  Lock'),
            'WF_COMMENTS' => Yii::t('app', 'Wf  Comments'),
            'IN_SECTIONS' => Yii::t('app', 'In  Sections'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'CODE' => Yii::t('app', 'Code'),
            'TAGS' => Yii::t('app', 'Tags'),
            'TMP_ID' => Yii::t('app', 'Tmp '),
            'WF_LAST_HISTORY_ID' => Yii::t('app', 'Wf  Last  History '),
            'SHOW_COUNTER' => Yii::t('app', 'Show  Counter'),
            'SHOW_COUNTER_START' => Yii::t('app', 'Show  Counter  Start'),
        ];
    }

    /**
     * Checks if the filter panel should be showed as open
     * @return bool Returns true if any search attribute is filled
     */
    public function isOpen()
    {
        $attributes = $this->safeAttributes();
        foreach ($attributes as $attribute) {
            if (!empty($this->$attribute)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Product::find();

        $query->where(['b_iblock_element.IBLOCK_ID' => 2]);


        $query->joinWith(['iblock']);
        $query->joinWith(['iblockSection']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['iblock.name'] = [
            'asc'  => ['b_iblock.NAME' => SORT_ASC],
            'desc' => ['b_iblock.NAME' => SORT_DESC],
        ];

        $dataProvider->sort->attributes['iblockSection.name'] = [
            'asc'  => ['b_iblock_section.NAME' => SORT_ASC],
            'desc' => ['b_iblock_section.NAME' => SORT_DESC],
        ];


        if (empty($dataProvider->sort->getAttributeOrders())) {
            $dataProvider->query->orderBy(['b_iblock_element.SORT' => SORT_DESC, 'b_iblock_element.ID' => SORT_DESC]);
        }

        $dataProvider->pagination->defaultPageSize = 12;


        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }


        $query->andFilterWhere([
            'b_iblock_element.ID' => $this->ID,
            'b_iblock_element.TIMESTAMP_X' => $this->TIMESTAMP_X,
            'b_iblock_element.MODIFIED_BY' => $this->MODIFIED_BY,
            'b_iblock_element.DATE_CREATE' => $this->DATE_CREATE,
            'b_iblock_element.CREATED_BY' => $this->CREATED_BY,
            'b_iblock_element.IBLOCK_ID' => $this->IBLOCK_ID,
            'b_iblock_element.IBLOCK_SECTION_ID' => $this->IBLOCK_SECTION_ID,
            'b_iblock_element.ACTIVE_FROM' => $this->ACTIVE_FROM,
            'b_iblock_element.ACTIVE_TO' => $this->ACTIVE_TO,
            'b_iblock_element.SORT' => $this->SORT,
            'b_iblock_element.PREVIEW_PICTURE' => $this->PREVIEW_PICTURE,
            'b_iblock_element.DETAIL_PICTURE' => $this->DETAIL_PICTURE,
            'b_iblock_element.WF_STATUS_ID' => $this->WF_STATUS_ID,
            'b_iblock_element.WF_PARENT_ELEMENT_ID' => $this->WF_PARENT_ELEMENT_ID,
            'b_iblock_element.WF_LOCKED_BY' => $this->WF_LOCKED_BY,
            'b_iblock_element.WF_DATE_LOCK' => $this->WF_DATE_LOCK,
            'b_iblock_element.WF_LAST_HISTORY_ID' => $this->WF_LAST_HISTORY_ID,
            'b_iblock_element.SHOW_COUNTER' => $this->SHOW_COUNTER,
            'b_iblock_element.SHOW_COUNTER_START' => $this->SHOW_COUNTER_START,
        ]);

        $query->andFilterWhere(['like', 'b_iblock_element.ACTIVE', $this->ACTIVE])
            ->andFilterWhere(['like', 'b_iblock_element.NAME', $this->NAME])
            ->andFilterWhere(['like', 'b_iblock_element.PREVIEW_TEXT', $this->PREVIEW_TEXT])
            ->andFilterWhere(['like', 'b_iblock_element.PREVIEW_TEXT_TYPE', $this->PREVIEW_TEXT_TYPE])
            ->andFilterWhere(['like', 'b_iblock_element.DETAIL_TEXT', $this->DETAIL_TEXT])
            ->andFilterWhere(['like', 'b_iblock_element.DETAIL_TEXT_TYPE', $this->DETAIL_TEXT_TYPE])
            ->andFilterWhere(['like', 'b_iblock_element.SEARCHABLE_CONTENT', $this->SEARCHABLE_CONTENT])
            ->andFilterWhere(['like', 'b_iblock_element.WF_NEW', $this->WF_NEW])
            ->andFilterWhere(['like', 'b_iblock_element.WF_COMMENTS', $this->WF_COMMENTS])
            ->andFilterWhere(['like', 'b_iblock_element.IN_SECTIONS', $this->IN_SECTIONS])
            ->andFilterWhere(['like', 'b_iblock_element.XML_ID', $this->XML_ID])
            ->andFilterWhere(['like', 'b_iblock_element.CODE', $this->CODE])
            ->andFilterWhere(['like', 'b_iblock_element.TAGS', $this->TAGS])
            ->andFilterWhere(['like', 'b_iblock_element.TMP_ID', $this->TMP_ID]);

        return $dataProvider;
    }
}
