<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * BuilderFixture
 */
class BuilderFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'builder';
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
                'phone' => 1,
                'email' => 'Lorem ipsum dolor sit amet',
                'address' => 'Lorem ipsum dolor sit amet',
                'user_id' => 1,
                'description' => 'Lorem ipsum dolor sit amet',
                'city' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor sit amet',
                'postcode' => 1,
                'avater' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
