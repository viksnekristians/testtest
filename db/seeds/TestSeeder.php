<?php


use Phinx\Seed\AbstractSeed;

class TestSeeder extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run() : void
    {
        $data = [
            [
                'test_id'    => 2,
                'test_name' => 'name',
            ]
        ];

        $test = $this->table('test_table');
        $test->insert($data)
              ->saveData();
    }
}
