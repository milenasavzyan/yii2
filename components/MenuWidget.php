<?php

namespace app\components;

use app\models\Category;
use yii\base\Widget;
class MenuWidget extends Widget
{

    public $tpl;
    public $ul_class;
    public $data;
    public $tree;
    public $menuHtml;
    public $model;
    public $cache_time = 60;
    public function init()
    {
        parent::init();
        if ($this->ul_class === null) {
            $this->ul_class = 'menu';
        }
        if ($this->tpl === null) {
            $this->tpl = 'menu';
        }
        $this->tpl .= '.php';
    }
    public function run()
    {
        if ($this->cache_time) {
            $menu = \Yii::$app->cache->get('menu');
            if ($menu) {
                return $menu;
            }
        }


        $this->data = Category::find()->select('id, parent_id, title')->indexBy('id')->asArray()->all();
        $this->tree = $this->getTree();
        $this->menuHtml = $this->getMenuHtml($this->tree);
        return $this->menuHtml;


        if ($this->cache_time) {
            \Yii::$app->cache->set('menu', $this->menuHtml, $this->cache_time);
        }
        return $this->menuHtml;


    }
    protected function getTree()
    {
        $tree = [];
        foreach ($this->data as $id => $node) {
            if ($node['parent_id'] == 0) {
                $tree[$id] = $node;
            } else {
                $tree[$node['parent_id']]['children'][$id] = $node;
            }
        }
        return $tree;
    }
    protected function getMenuHtml($tree)
    {
        $str = '';
        foreach ($tree as $category) {
            $str .= $this->catToTemplate($category);
        }
        return $str;
    }

    protected function catToTemplate($category)
    {
        ob_start();
        include __DIR__ . '/menu_tpl/' . $this->tpl;
        return ob_get_clean();
    }
}