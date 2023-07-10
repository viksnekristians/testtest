<?php


use Phinx\Seed\AbstractSeed;

class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     */
    public function run(): void
    {
        $data = [
            [
                'email' => 'test@test.lv',
                'name' => 'test@test.lv',
                'password' => 'test@test.lv',
            ]
        ];

        $test = $this->table('users');
        $test->insert($data)
              ->saveData();
    }
    
}
