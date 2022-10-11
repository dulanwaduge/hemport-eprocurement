<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PaymentFixture
 */
class PaymentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'payment';
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
                'amount' => 1,
                'type' => 'Lorem ipsum dolor sit amet',
                'status' => 'Lorem ipsum dolor sit amet',
                'invoice' => 'Lorem ipsum dolor sit amet',
                'created' => 1651654443,
                'modified' => 1651654443,
                'order_id' => 1,
            ],
        ];
        parent::init();
    }
}
