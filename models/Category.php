<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * Class Category
 * @property int $id
 * @property int|null $parent_id
 * @property string $title
 * @property string|null $description
 * @property string|null $keywords
 */
class Category extends ActiveRecord
{
    public static function tableName()
    {
        return 'category';
    }

    public function rules()
    {
        return [
            [['title'], 'required'],
            [['parent_id'], 'integer'],
            [['title', 'description', 'keywords'], 'string'],
        ];
    }
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }
}
