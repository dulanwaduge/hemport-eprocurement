<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuyerFixture
 */
class BuyerFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'buyer';
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
                'fname' => 'Lorem ipsum dolor sit amet',
                'lname' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'phone' => 1,
                'users_id' => 1,
                'modified' => 1649054451,
            ],
        ];
        parent::init();
    }
}
