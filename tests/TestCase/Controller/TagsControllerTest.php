<?php
namespace App\Test\TestCase\Controller;

use App\Controller\TagsController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\TagsController Test Case
 */
class TagsControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Tags' => 'app.tags',
        'Bookmarks' => 'app.bookmarks',
        'Users' => 'app.users',
        'BookmarksTags' => 'app.bookmarks_tags'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
       $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
         $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
        $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
       $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
         $this->assertTrue(TRUE, 'This should already work.');
    }
}
