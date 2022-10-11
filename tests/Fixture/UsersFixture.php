<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UsersFixture
 */
class UsersFixture extends TestFixture
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
                'type' => 'Lorem ipsum dolor sit amet',
                'username' => 'Lorem ipsum dolor sit amet',
                'password' => 'Lorem ipsum dolor sit amet',
                'token' => 'Lorem ipsum dolor sit amet',
                'createtime' => 1660483812,
                'modifiedate' => 1660483812,
                'company_name' => 'Lorem ipsum dolor sit amet',
                'phone' => 'Lorem ipsum dolor ',
                'industry' => 'Lorem ipsum dolor sit amet',
                'ABN' => 'Lorem ips',
            ],
        ];
        parent::init();
    }
}
