<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\Auth\DefaultPasswordHasher;
use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $type
 * @property string $username
 * @property string $password
 * @property string|null $token
 * @property \Cake\I18n\FrozenTime $createtime
 * @property \Cake\I18n\FrozenTime $modifiedate
 * @property string $company_name
 * @property string $phone
 * @property string $industry
 * @property string $ABN
 *
 * @property \App\Model\Entity\Farmer[] $farmer
 * @property \App\Model\Entity\Manufacture[] $manufactures
 */
class User extends Entity
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
        'type' => true,
        'username' => true,
        'password' => true,
        'token' => true,
        'createtime' => true,
        'modifiedate' => true,
        'company_name' => true,
        'phone' => true,
        'industry' => true,
        'ABN' => true,
        'farmer' => true,
        'manufactures' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array<string>
     */
    protected $_hidden = [
        'password',
    ];

    // Add this method
    protected function _setPassword(string $password)
    {
        if (strlen($password) > 0) {
            return (new DefaultPasswordHasher())->hash($password);
        }
    }
}
