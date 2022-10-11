<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Orderplaced Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property float $price
 * @property \Cake\I18n\FrozenTime $modified
 * @property string $buyeraddress
 * @property string $buyerstate
 * @property string $buyerpostcode
 * @property string $buyeremail
 * @property int $buyer_id
 * @property int $seller_id
 * //$seller_id is Sellers->users_id, not Sellers->sellers_id
 * @property int $product_id
 * @property string $bname
 * @property string $sname
 *
 * @property \App\Model\Entity\Buyer $buyer
 */
class Orderplaced extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected $_accessible = [
        'created' => true,
        'price' => true,
        'modified' => true,
        'buyer_id' => true,
        'seller_id' => true,
        'product_id' => true,
        'buyer' => true,
        'buyeraddress'=>true,
        'buyerstate'=>true,
        'buyerpostcode'=>true,
        'buyeremail'=>true,
        'amount' =>true,
        'bname'=>true,
        'sname'=>true,
    ];
}
