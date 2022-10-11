<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property string $availability
 * @property float|null $taxnum
 * @property float $price
 * @property string $description
 * @property int $amount
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $seller_id
 * @property string|null $image
 *
 * @property \App\Model\Entity\OrderProduct[] $order_product
 * @property \App\Model\Entity\Category[] $category
 */
class Product extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'availability' => true,
        'taxnum' => true,
        'price' => true,
        'description' => true,
        'amount' => true,
        'modified' => true,
        'seller_id' => true,
        'image' => true,
        'image1des'=> true,
        'image_2'=> true,
        'image2des'=> true,
        'image_3'=> true,
        'image3des'=> true,
        'image_4'=> true,
        'image4des'=> true,
        'order_product' => true,
        'category' => true,
        'type' =>true,
    ];
}
