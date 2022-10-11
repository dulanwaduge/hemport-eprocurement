<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SellerFixture
 */
class SellerFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'seller';
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
                'address' => 'Lorem ipsum dolor sit amet',
                'BusinessName' => 'Lorem ipsum dolor sit amet',
                'phone' => 1,
                'users_id' => 1,
                'emailaddress' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
