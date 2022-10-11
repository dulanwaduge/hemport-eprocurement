<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * FarmerFixture
 */
class FarmerFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'farmer';
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
                'address' => 'Lorem ipsum dolor sit amet',
                'phone' => 1,
                'modified' => 1649054462,
                'user_id' => 1,
            ],
        ];
        parent::init();
    }
}
