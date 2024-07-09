<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $category_id
 * @property string $title
 * @property float $price
 * @property float|null $old_price
 * @property string|null $image
 * @property string|null $description
 * @property string $information
 *
 * @property Category $category
 * @property OrderProduct[] $orderProducts
 */
class Product extends \yii\db\ActiveRecord
{

    public $text;
    public $file;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'title', 'price'], 'required'],
            [['category_id'], 'integer'],
            [['price', 'old_price'], 'number'],
            [['price', 'old_price'], 'default', 'value' => 0],
            [['description', 'information'], 'string'],
            [['title', 'image'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['file'], 'image'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'image' => 'Image',
            'file' => 'Image',
            'description' => 'Description',
            'information' => 'Information',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[OrderProducts]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderProducts()
    {
        return $this->hasMany(OrderProduct::class, ['product_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $file = UploadedFile::getInstance($this, 'file');
            if ($file !== null) {
                $dir = 'products/' . date("y-m-d") . '/';
                if (!is_dir($dir)) {
                    mkdir($dir, 0777, true);
                }
                $file_name = uniqid() . '_' . $file->baseName . '.' . $file->extension;
                $this->image = $dir . $file_name;
                $file->saveAs($this->image);
            }

            return true;
        }
        return false;
    }
}
