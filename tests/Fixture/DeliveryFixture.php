<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * DeliveryFixture
 */
class DeliveryFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'delivery';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'NumberofItem' => 1,
                'shiptype' => 'Lorem ipsum dolor sit amet',
                'startdate' => '2022-03-15 10:00:34',
                'enddate' => '2022-03-15 10:00:34',
                'tracknumber' => 1,
                'order_id' => 1,
                'modified' => 1647338434,
            ],
        ];
        parent::init();
    }
}
