<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductFixture
 */
class ProductFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'product';
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
                'name' => 'Lorem ipsum dolor sit amet',
                'availability' => 'Lorem ipsum dolor sit amet',
                'taxnum' => 1,
                'price' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'amount' => 1,
                'modified' => 1649515114,
                'seller_id' => 1,
                'image' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
