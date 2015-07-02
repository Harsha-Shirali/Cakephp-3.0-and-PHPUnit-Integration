<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BookmarksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;


/**
 * App\Model\Table\BookmarksTable Test Case
 */
class BookmarksTableTest extends TestCase
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
       parent::setUp();
        $config = TableRegistry::exists('Bookmarks') ? [] : ['className' => 'App\Model\Table\BookmarksTable'];
       $this->Bookmarks = TableRegistry::get('Bookmarks', $config);
       // parent::setUp();
      //  $this->Bookmarks = TableRegistry::get('Bookmarks');
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bookmarks);

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
    
    
    public function testBasic() {
		$result = $this->Bookmarks->find()->first();
		$this->assertNotEmpty($result);
	}
	
	public function testEmptyFormData() {
		//$this->skipIf(true);
		$data = array(
				'user_id' => '',
			   'title' => '',
			   'description' => '',
			   'url' => '',
            
		);
		$this->Bookmarks = TableRegistry::get('Bookmarks');
		
		$bookmarks = $this->Bookmarks->newEntity($data);
		$result = $this->Bookmarks->save($bookmarks);
		//debug($result);
		$this->assertFalse((bool)$result);
	
		
	}
	
	public function testSaveFormData() {
		//$this->skipIf(true);
		$data = array(
				'user_id' => '1',
			   'title' => 'New Bookmark',
			   'description' => 'Testing Save Data',
			   'url' => 'http://www.bookmark.com',
            
		);
		$this->Bookmarks = TableRegistry::get('Bookmarks');
		
		$bookmarks = $this->Bookmarks->newEntity($data);
		$result = $this->Bookmarks->save($bookmarks);
		//debug($result);
		$this->assertTrue((bool)$result);

	}

	public function testInvalidURL() {
		$data = array(
				'user_id' => '1',
			   'title' => 'New Bookmark',
			   'description' => 'Testing Save Data',
			   'url' => 'bookmark',
            
		);
		$this->Bookmarks = TableRegistry::get('Bookmarks');
		$bookmarks= $this->Bookmarks->newEntity($data);
		$result = $this->Bookmarks->save($bookmarks);
		$this->assertFalse((bool)$result);
	}
	
	public function testValidURL() {
		$data = array(
				'user_id' => '1',
			   'title' => 'New Bookmark',
			   'description' => 'Testing Save Data',
			   'url' => 'http://www.bookmark.com',
            
		);
		$this->Bookmarks = TableRegistry::get('Bookmarks');
		$bookmarks= $this->Bookmarks->newEntity($data);
		$result = $this->Bookmarks->save($bookmarks);
		$this->assertTrue((bool)$result);
	}
	
	public function testEmptyURL() {
		$data = array(
				'user_id' => '1',
			   'title' => 'New Bookmark',
			   'description' => 'Testing Save Data',
			   'url' => '',
            
		);
		$this->Bookmarks = TableRegistry::get('Bookmarks');
		$bookmarks= $this->Bookmarks->newEntity($data);
		$result = $this->Bookmarks->save($bookmarks);
		$this->assertFalse((bool)$result);
	}
	
	public function testEmptyTitle() {
		$data = array(
				'user_id' => '1',
			   'title' => '',
			   'description' => 'Testing Save Data',
			   'url' => 'http://www.bookmark.com',
            
		);
		$this->Bookmarks = TableRegistry::get('Bookmarks');
		$bookmarks= $this->Bookmarks->newEntity($data);
		$result = $this->Bookmarks->save($bookmarks);
		$this->assertFalse((bool)$result);
	}
	
  /* public function testEmptyForm() {
		$data = array(
			'Bookmarks' => array(
             'title' => '',
                'description' => '',
                'url' => '',
               
			)
		);
		$this->assertInstanceOf('Cake\ORM\Query', $data);
		$result = $this->Bookmarks->save($data);
		$this->assertFalse($result);
	}
	
	public function testFindPublished()
    {
		$data = array(
			'Bookmarks' => array(
             'title' => 'sample',
                'description' => 'sample',
                'url' => 'sample',
               
			)
		);
        //$query = $this->Bookmarks->find(data);
        $query = $this->Bookmarks->findById(1);
        $this->assertInstanceOf('Cake\ORM\Query', $query);
        $result = $query->hydrate(false)->toArray();
        $expected = [
            ['id' => 1, 'title' => 'sample','description'=>'sample','url'=>'sample'],
            
        ];

        $this->assertEquals($expected, $result);
    }
    
    public function testValidData() {
	
	$data = array('Bookmarks' => array(
		'title' => 'sample',
		'description' => 'info@harshashirali.com',
		'url' => 'Test Message',
	));

	
	$result = $this->Bookmarks->save($data);

	
	$this->assertArrayHasKey('Bookmarks', $result);

	
	$result = $this->Bookmarks->find('count', array(
		'conditions' => array(
			'Bookmarks.title' => 'sample',
			'Bookmarks.description' => 'Harsha Shirali',
			'Bookmarks.url' => 'Test Message',
		),
	));

	$this->assertEqual($result, 1);
}*/

	/*public function testSaving() {
   // $data = ['title' => 'sample'];
   $data = array(
		'user_id'=>1234,
		'title' => 'sample',
		'description' => 'info@harshashirali.com',
		'url' => 'Test Message',
	);
    $todo = $this->Bookmarks->newEntity($data);
    $resultingError = $this->Bookmarks->validator()->errors($data);

    $expectedError = array(
    'user_id'=>1234,
		'title' => 'sample',
		'description' => 'info@harshashirali.com',
		'url' => 'Test Message',
	);
    $this->assertEquals($expectedError, $resultingError);

    $total = $this->Bookmarks->find()->count();
    $this->assertEquals(2, $total);

  }*/
/*
  
   public function testRecent() {
    $result = $this->Bookmarks->find('all');
    $recent = $result->first()->toArray();
    $expected = [
        'user_id' => 5,
        'title' => 'sample',
        'description' => 'sample',
        'url' => 'sample',
    ];

    $this->assertEquals($expected, $recent);
  }*/

  
  
    
}
