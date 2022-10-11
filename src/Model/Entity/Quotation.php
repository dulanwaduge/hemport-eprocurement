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
 */
class Quotation extends Entity
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
        'company_name'     => true,
        'abn'              => true,
        'email'            => true,
        'contact_number'   => true,
        'description'      => true,
        'create_time'      => true,
        'seller_id'        => true,
        'buyer_id'         => true,
        'demand_id'        => true,
        'status'           => true
    ];
}
