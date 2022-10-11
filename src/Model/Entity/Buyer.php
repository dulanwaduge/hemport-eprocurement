<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Buyer Entity
 *
 * @property int $id
 * @property string|null $fname
 * @property string|null $lname
 * @property string|null $address
 * @property string|null $state
 * @property string|null $postcode
 * @property string|null $email
 * @property string|null $phone
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Orderplaced[] $orderplaced
 */
class Buyer extends Entity
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
        'fname' => true,
        'lname' => true,
        'address' => true,
        'state' => true,
        'postcode' => true,
        'email'=> true,
        'phone' => true,
        'users_id' => true,
        'modified' => true,
        'user' => true,
        'orderplaced' => true,
    ];
}
