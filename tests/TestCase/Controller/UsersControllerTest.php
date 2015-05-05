<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\UsersController Test Case
 */
class UsersControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Users' => 'app.users',
        'Bookmarks' => 'app.bookmarks'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
          $result = $this->testAction('/users/index');
        debug($result);
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
         $result = $this->testAction('/users/view');
        debug($result);
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
         $result = $this->testAction('/users/add');
        debug($result);
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
         $result = $this->testAction('/users/edit');
        debug($result);
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
       $result = $this->testAction('/users/delete');
        debug($result);
    }
}
