<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProjectsFixture
 */
class ProjectsFixture extends TestFixture
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
                'description' => 'Lorem ipsum dolor sit amet',
                'image_1' => 'Lorem ipsum dolor sit amet',
                'image_2' => 'Lorem ipsum dolor sit amet',
                'image_3' => 'Lorem ipsum dolor sit amet',
                'image_4' => 'Lorem ipsum dolor sit amet',
                'cname' => 'Lorem ipsum dolor sit amet',
                'year' => 'Lorem ipsum dolor sit amet',
                'country' => 'Lorem ipsum dolor sit amet',
                'state' => 'Lorem ipsum dolor sit amet',
            ],
        ];
        parent::init();
    }
}
