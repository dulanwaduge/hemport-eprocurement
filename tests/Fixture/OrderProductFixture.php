<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderProductFixture
 */
class OrderProductFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'order_product';
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'product_id' => 1,
                'order_id' => 1,
                'product_amount' => 1,
            ],
        ];
        parent::init();
    }
}
