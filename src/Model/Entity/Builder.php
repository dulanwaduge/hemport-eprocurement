<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Builder Entity
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $email
 * @property string|null $address
 * @property int $user_id
 * @property string|null $description
 * @property string|null $city
 * @property string|null $state
 * @property string|null $postcode
 * @property string|null $avater
 *
 * @property \App\Model\Entity\User $user
 */
class Builder extends Entity
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
        'phone' => true,
        'email' => true,
        'address' => true,
        'user_id' => true,
        'description' => true,
        'city' => true,
        'state' => true,
        'postcode' => true,
        'user' => true,
        'avatar'=>true,

    ];
}
