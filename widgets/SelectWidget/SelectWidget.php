<?php

namespace app\widgets\SelectWidget;

use yii\helpers\ArrayHelper;
use yii\widgets\InputWidget;

class SelectWidget extends InputWidget
{
    public $dataClass;

    private $_cache = [];

    public function run()
    {
        parent::run();
        $data = $this->getRelatedData();
        $this->registerAssets();

        $attribute = $this->attribute;
        $value = $this->model->$attribute;

        return $this->render('field', [
            'attribute' => $attribute,
            'data' => $data,
            'value' => $value,
            'formName' => $this->model->formName()
        ]);
    }

    public function registerAssets()
    {
        $view = $this->getView();
        SelectAsset::register($view);
    }

    public function getRelatedData()
    {
        $dataClass = $this->dataClass;

        if (isset($this->_cache[$dataClass])) {
            return $this->_cache[$dataClass];
        }

        $data = $dataClass::find()->asArray()->all();

        $list = ArrayHelper::map($data, 'id', 'title');

        $this->_cache[$dataClass] = $list;

        return $list;

    }
}