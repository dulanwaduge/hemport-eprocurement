<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Payment Entity
 *
 * @property int $id
 * @property int $amount
 * @property string $type
 * @property string $status
 * @property string $invoice
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $order_id
 *
 * @property \App\Model\Entity\Orderplaced $orderplaced
 */
class Payment extends Entity
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
        'amount' => true,
        'type' => true,
        'status' => true,
        'invoice' => true,
        'created' => true,
        'modified' => true,
        'order_id' => true,
        'orderplaced' => true,
    ];
}
