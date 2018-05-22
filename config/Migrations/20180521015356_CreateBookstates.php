<?php
use Migrations\AbstractMigration;

class CreateBookstates extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table('bookstates');
        $table->addColumn('book_id', 'integer', [
            'default' => null,
            'limit' => 13,
            'null' => false,
        ]);
        $table->addColumn('arrival_date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('delete_date', 'date', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('state', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->create();
    }
}
