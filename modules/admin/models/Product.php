<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $content
 * @property integer $price
 * @property integer $keywords
 * @property string $description
 * @property string $img
 * @property integer $hit
 * @property integer $new
 * @property integer $sale
 */
class Product extends \yii\db\ActiveRecord
{
    
    public $image;
    public $gallery;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }
    
    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'category_id', 'name', 'content', 'price', 'img', 'hit', 'new', 'sale'], 'required'],
            [['id', 'category_id', 'price', 'keywords', 'hit', 'new', 'sale'], 'integer'],
            [['name', 'description', 'img'], 'string', 'max' => 255],
            [['content'], 'string'],
            [['image'], 'file', 'extensions' => 'png, jpg'],
//            [['gallery'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID товара',
            'category_id' => 'Категория',
            'name' => 'Наименование',
            'content' => 'Содержание',
            'price' => 'Стоимость',
            'keywords' => 'Ключевые слова',
            'description' => 'Мета-описание',
            'image' => 'Фото',
            'hit' => 'Хит',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
        ];
    }
    
    public function upload() {
        if($this->validate()){
            $path = 'upload/store' . $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            return true;
        }else{
            return false;
        }
    }
}
