<?php
use Migrations\AbstractMigration;

class CreateRentals extends AbstractMigration
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
        $table = $this->table('rentals');
        $table->addColumn('bookstate_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('user_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('reservation_id', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->addColumn('rent_date', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('return_date', 'datetime', [
            'default' => null,
            'null' => false,
        ]);
        $table->addColumn('pressing_letter', 'integer', [
            'default' => null,
            'limit' => 11,
            'null' => false,
        ]);
        $table->create();
    }
}
