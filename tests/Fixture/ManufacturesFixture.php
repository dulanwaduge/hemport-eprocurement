<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ManufacturesFixture
 */
class ManufacturesFixture extends TestFixture
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
                'name' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'phone' => 1,
                'user_id' => 1,
                'emailaddress' => 'Lorem ipsum dolor sit amet',
                'modified' => 1649054486,
            ],
        ];
        parent::init();
    }
}
