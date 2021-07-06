<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $id
 * @property int $type_id
 * @property string $title
 * @property int $SKU
 * @property string $image
 * @property int $count
 */
class ModelProducts extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'title', 'SKU', 'image'], 'required'],
            [['type_id', 'SKU', 'count'], 'integer'],
            [['title', 'image'], 'string', 'max' => 255],
            [['SKU'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'title' => 'Title',
            'SKU' => 'Sku',
            'image' => 'Image',
            'count' => 'Count',
        ];
    }
}
