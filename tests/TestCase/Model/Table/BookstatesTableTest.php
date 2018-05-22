<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookstatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookstatesTable Test Case
 */
class BookstatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BookstatesTable
     */
    public $Bookstates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bookstates',
        'app.books',
        'app.rentals',
        'app.reservations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Bookstates') ? [] : ['className' => BookstatesTable::class];
        $this->Bookstates = TableRegistry::get('Bookstates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bookstates);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
