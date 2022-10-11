<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Project Entity
 *
 * @property int $id
 * @property string|null $description
 * @property string|null $image_1
 * @property string|null $image_2
 * @property string|null $image_3
 * @property string|null $image_4
 * @property string|null $cname
 * @property string|null $year
 * @property string|null $country
 * @property string|null $state
 */
class Project extends Entity
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
        'description' => true,
        'image_1' => true,
        'image_2' => true,
        'image_3' => true,
        'image_4' => true,
        'cname' => true,
        'year' => true,
        'country' => true,
        'state' => true,
        'builder_id'=> true,
    ];
}
