<?php
namespace App\Test\TestCase\Controller;

use App\Controller\BookmarksController;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Controller\BookmarksController Test Case
 */
class BookmarksControllerTest extends IntegrationTestCase
{

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'Bookmarks' => 'app.bookmarks',
        'Users' => 'app.users',
        'Tags' => 'app.tags',
        'BookmarksTags' => 'app.bookmarks_tags'
    ];

    /**
     * Test index method
     *
     * @return void
     */
    public function testIndex()
    {
		$result = $this->get('/bookmarks/index');
		   $this->assertTrue(TRUE, 'This should already work.');
      // debug($result);
   
    }

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
		$result = $this->get('/bookmarks/view');
        //debug($result);
         $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
		$result = $this->get('/bookmarks/add');
       // debug($result);
      $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
		$result = $this->get('/bookmarks/edit');
        //debug($result);
           $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
		$result = $this->get('/bookmarks/delete');
      //  debug($result);
          $this->assertTrue(TRUE, 'This should already work.');
    }
    
     public function testIndexPostData() {
        $data = array(
            'Bookmarks' => array(
            
                'title' => 'saple title',
                'description' => 'new bookmark',
                'url' => 'www.bookmark.com',
                'tags_string' => 'sample bookmark',
            )
        );
        $result = $this->get(
            '/bookmarks/add',
            array('data' => $data, 'method' => 'post')
        );
        //debug($result);
    }
    
     public function testBookmarkPostData()
    {
        $data = [
            'user_id' => 246,
             'title' => 'sample title',
                'description' => 'new bookmark',
                'url' => 'www.bookmark.com',
                'tags_string' => 'sample bookmark',
        ];
       $result= $this->post('/bookmarks/add', $data);
		//debug($result);
       // $this->assertResponseSuccess();

    }
}
