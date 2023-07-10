<?php
declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Phinx\Db\Table\Column;

final class MyNewMigration extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        // create the table
        $table = $this->table('test_table');
        $table->addColumn('test_id', Column::INTEGER)
              ->addColumn('test_name', Column::STRING)
              ->addTimeStamps()
              ->create();
        if ($this->isMigratingUp()) {
            $table->insert([['test_id' => 1, 'test_name' => 'jeff']])
                  ->save();
        }
    }
}
