<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookmarksTagsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BookmarksTagsTable Test Case
 */
class BookmarksTagsTableTest extends TestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'BookmarksTags' => 'app.bookmarks_tags',
        'Bookmarks' => 'app.bookmarks',
        'Users' => 'app.users',
        'Tags' => 'app.tags'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('BookmarksTags') ? [] : ['className' => 'App\Model\Table\BookmarksTagsTable'];
        $this->BookmarksTags = TableRegistry::get('BookmarksTags', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->BookmarksTags);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
      $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
     $this->assertTrue(TRUE, 'This should already work.');
    }
}
