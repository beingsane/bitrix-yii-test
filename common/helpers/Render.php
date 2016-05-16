<?php
namespace common\helpers;

use Yii;
use kartik\select2\Select2;
use kartik\file\FileInput;
use kartik\checkbox\CheckboxX;
use common\widgets\DatePicker;
use common\widgets\DateTimePicker;

class Render
{
    private $form;
    private $model;
    private $viewMode;
    private $disabledFields;


    public function __construct($form, $model, $viewMode = false, $disabledFields = [])
    {
        $this->form = $form;
        $this->model = $model;
        $this->viewMode = $viewMode;
        $this->disabledFields = (array)$disabledFields;
    }


    private function getDefaultOptions($attribute)
    {
        $defaultFieldOptions = ['options' => ['class' => 'form-group']];
        $defaultInputOptions = ['class' => 'form-control'];

        if ($this->viewMode || in_array($attribute, $this->disabledFields)) {
            $defaultFieldOptions['enableClientValidation'] = false;
            $defaultInputOptions['readonly'] = 'readonly';
        }

        return [$defaultFieldOptions, $defaultInputOptions];
    }


    public function textField($attribute, $fieldOptions = [], $inputOptions = [])
    {
        list ($defaultFieldOptions, $defaultInputOptions) = $this->getDefaultOptions($attribute);

        $fieldOptions = array_replace_recursive($defaultFieldOptions, $fieldOptions);
        $inputOptions = array_replace_recursive($defaultInputOptions, $inputOptions);

        return $this->form->field($this->model, $attribute, $fieldOptions)->textInput($inputOptions);
    }

    public function dateField($attribute, $widgetOptions = [], $fieldOptions = [], $inputOptions = [])
    {
        list ($defaultFieldOptions, $defaultInputOptions) = $this->getDefaultOptions($attribute);

        $inputOptions = array_replace_recursive($defaultInputOptions, $inputOptions);
        $fieldOptions = array_replace_recursive($defaultFieldOptions, $fieldOptions);

        $defaultWidgetOptions = [
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'options' => $inputOptions,
            'convertFormat' => true,
            'removeButton' => '<span class="kv-date-remove kv-date-remove-custom">×</span>',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => Yii::$app->formatter->dateFormat,
            ],
            'pluginEvents' => [
                'changeDate' => "function(e) { $(this).find('.kv-date-remove-custom').toggle(e.dates.length != 0); }",
                'clearDate'  => "function(e) { $(this).find('.kv-date-remove-custom').toggle(e.dates.length != 0); }",
            ],
        ];
        $widgetOptions = array_replace_recursive($defaultWidgetOptions, $widgetOptions);

        return $this->form->field($this->model, $attribute, $fieldOptions)->widget(DatePicker::classname(),
            $widgetOptions
        );
    }


    public function dateTimeField($attribute, $widgetOptions = [], $fieldOptions = [], $inputOptions = [])
    {
        list ($defaultFieldOptions, $defaultInputOptions) = $this->getDefaultOptions($attribute);

        $inputOptions = array_replace_recursive($defaultInputOptions, $inputOptions);
        $fieldOptions = array_replace_recursive($defaultFieldOptions, $fieldOptions);

        $defaultWidgetOptions = [
            'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'options' => $inputOptions,
            'convertFormat' => true,
            'removeButton' => '<span class="kv-date-remove kv-date-remove-custom">×</span>',
            'removeButtonSelector' => '.kv-date-remove-custom',
            'pluginOptions' => [
                'autoclose' => true,
                'format' => Yii::$app->formatter->datetimeFormat,
                'pickerPosition' => 'top-left',
            ],
            'pluginEvents' => [
                'changeDate' => "function(e) { var isEmpty = ($(this).find('input').val() == ''); $(this).find('.kv-date-remove-custom').toggle(!isEmpty); }",
            ],
        ];
        $widgetOptions = array_replace_recursive($defaultWidgetOptions, $widgetOptions);

        return $this->form->field($this->model, $attribute, $fieldOptions)->widget(DateTimePicker::classname(),
            $widgetOptions
        );
    }


    public function selectField($attribute, $data, $widgetOptions = [], $fieldOptions = [])
    {
        list ($defaultFieldOptions, $defaultInputOptions) = $this->getDefaultOptions($attribute);

        $defaultInputOptions['class'] .= ' select';
        $defaultInputOptions['placeholder'] = Yii::t('app', 'Select...');
        $fieldOptions = array_replace_recursive($defaultFieldOptions, $fieldOptions);

        $inputOptions = isset($widgetOptions['options']) ? $widgetOptions['options'] : [];
        $inputOptions = array_replace_recursive($defaultInputOptions, $inputOptions);

        $defaultWidgetOptions = [
            'data' => $data,
            'options' => $inputOptions,
            'pluginOptions' => [
                'allowClear' => true,
                'minimumResultsForSearch' => -1,
            ],
        ];
        $widgetOptions = array_replace_recursive($defaultWidgetOptions, $widgetOptions);

        return $this->form->field($this->model, $attribute, $fieldOptions)->widget(Select2::classname(), $widgetOptions);
    }


    public function checkboxField($attribute, $widgetOptions = [], $fieldOptions = [])
    {
        list ($defaultFieldOptions, $defaultInputOptions) = $this->getDefaultOptions($attribute);

        $fieldOptions = array_replace_recursive($defaultFieldOptions, $fieldOptions);

        $inputOptions = isset($widgetOptions['options']) ? $widgetOptions['options'] : [];
        $inputOptions = array_replace_recursive($defaultInputOptions, $inputOptions);

        $defaultWidgetOptions = [
            'model' => $this->model,
            'attribute' => $attribute,
            'options' => $inputOptions,
            'pluginOptions' => [
                'threeState' => false,
                'size' => 'md',
            ],
        ];
        $widgetOptions = array_replace_recursive($defaultWidgetOptions, $widgetOptions);

        return $this->form->field($this->model, $attribute, $fieldOptions)->widget(CheckboxX::className(), $widgetOptions);
    }


    public function fileField($attribute, $widgetOptions = [], $fieldOptions = [])
    {
        list ($defaultFieldOptions, $defaultInputOptions) = $this->getDefaultOptions($attribute);

        $fieldOptions = array_replace_recursive($defaultFieldOptions, $fieldOptions);

        $inputOptions = isset($widgetOptions['options']) ? $widgetOptions['options'] : [];
        $inputOptions = array_replace_recursive($defaultInputOptions, $inputOptions);

        $defaultWidgetOptions = [
            'model' => $this->model,
            'attribute' => $attribute,
            'options' => $inputOptions,
            'pluginOptions' => [
                'showPreview' => false,
                'showUpload' => false,
                'browseLabel' => '',
                'removeLabel' => '',
            ],
        ];
        $widgetOptions = array_replace_recursive($defaultWidgetOptions, $widgetOptions);

        return $this->form->field($this->model, $attribute, $fieldOptions)->widget(FileInput::className(), $widgetOptions);
    }
}

