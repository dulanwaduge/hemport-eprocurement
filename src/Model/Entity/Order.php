<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property string $order_no
 * @property string $total
 * @property \Cake\I18n\FrozenTime $create_time
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $pay_time
 * @property string $pay_status
 *
 * @property \App\Model\Entity\User $user
 */
class Order extends Entity
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
        'order_no' => true,
        'total' => true,
        'create_time' => true,
        'user_id' => true,
        'pay_time' => true,
        'pay_status' => true,
        'user' => true,
    ];
}
