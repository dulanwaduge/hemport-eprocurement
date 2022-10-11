<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Seller Entity
 *
 * @property int $id
 * @property string|null $address
 * @property string|null $BusinessName
 * @property string|null $phone
 * @property int $users_id
 * @property string|null $emailaddress
 * @property string|null $bsb
 * @property string|null $accountno
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Product[] $product
 */
class Seller extends Entity
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
        'address' => true,
        'BusinessName' => true,
        'phone' => true,
        'users_id' => true,
        'emailaddress' => true,
        'user' => true,
        'product' => true,
        'bsb' => true,
        'accountno' => true,
    ];
}
