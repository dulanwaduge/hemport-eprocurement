<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * OrderplacedFixture
 */
class OrderplacedFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'orderplaced';
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
                'created' => 1651654395,
                'price' => 1,
                'modified' => 1651654395,
                'buyer_id' => 1,
                'seller_id' => 1,
                'product_id' => 1,
            ],
        ];
        parent::init();
    }
}
