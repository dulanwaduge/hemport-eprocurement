<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrdersFixture
 */
class OrdersFixture extends TestFixture
{
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
                'order_no' => 'Lorem ipsum dolor ',
                'total' => 1.5,
                'create_time' => '2022-09-17 18:50:02',
                'user_id' => 1,
                'pay_time' => '2022-09-17 18:50:02',
                'pay_status' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
