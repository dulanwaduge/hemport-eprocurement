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
class Demand extends Entity
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
        'created'           => true,
        'demand'            => true,
        'amount'            => true,
        'description'       => true,
        'image1'            => true,
        'business_name'     => true,
        'business_num'      => true,
        'business_email'    => true,
        'business_address'  => true,
        'city'              => true,
        'state'             => true,
        'postcode'          => true,
        'ABN'               => true,
        'buyer_id'          => true
    ];
}
