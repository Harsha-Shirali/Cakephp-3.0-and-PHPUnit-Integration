<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UsersTable;
use Cake\ORM\TableRegistry;
//use Cake\TestSuite\TestCase;
use Cake\TestSuite\IntegrationTestCase;

/**
 * App\Model\Table\UsersTable Test Case
 */
class UsersTableTest extends IntegrationTestCase
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
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Users') ? [] : ['className' => 'App\Model\Table\UsersTable'];
        $this->Users = TableRegistry::get('Users', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Users);

        parent::tearDown();
    }
    
    public function testBasic() {
		$result = $this->Users->find()->first();
		$this->assertNotEmpty($result);
	}
	
	/*
	public function testSaving() {
		$data = array(
		'user_id'=>'456',
					   'title' => 'saple title',
					'description' => 'new bookmark',
					'url' => 'www.bookmark.com',
					'tags_string' => 'sample bookmark',
							 );
					 $user = $this->Users->newEntity($data);
		$resultingError = $this->Users->validator()->errors($data);
		 $expectedError = array(
		'user_id'=>'456',
					   'title' => 'saple title',
					'description' => 'new bookmark',
					'url' => 'www.bookmark.com',
					'tags_string' => 'sample bookmark',
							 );
		$this->assertEquals($expectedError, $resultingError);
			 $total = $this->Users->find()->count();
		$this->assertEquals(2, $total);
			 $data = array(
		'user_id'=>'456',
					   'title' => 'saple title',
					'description' => 'new bookmark',
					'url' => 'www.bookmark.com',
					'tags_string' => 'sample bookmark',
							 );
		$todo = $this->Users->newEntity($data);
		$this->Users->save($todo);
		$newTotal = $this->Users->find()->count();
		$this->assertEquals(3, $newTotal);
	  }
	*/
	
/*
public function testFormData() {
		//$this->skipIf(true);
		$data = array(
			   'title' => 'saple title',
                'description' => 'new bookmark',
                'url' => 'www.bookmark.com',
                'tags_string' => 'sample bookmark',
            
		);
		$this->Users = TableRegistry::get('Users');
		
		$user = $this->Users->newEntity($data);
		$result = $this->Users->save($user);
		$this->assertTrue((bool)$result);
	
		$expected = array(
			   'title' => 'saple title',
                'description' => 'new bookmark',
                'url' => 'www.bookmark.com',
                'tags_string' => 'sample bookmark',
            
		);

		$this->assertEquals($expected, $result);
		/*
		$this->post(array('controller' => 'Users', 'action' => 'login'), $data);
				$this->assertResponseCode(302);
				$this->assertRedirect('/');*/
		
	//}*/



public function testEmptyFormData() {
		//$this->skipIf(true);
		$data = array(
				'email' => '',
			   'password' => '',
            
		);
		$this->Users = TableRegistry::get('Users');
		
		$user = $this->Users->newEntity($data);
		$result = $this->Users->save($user);
		$this->assertFalse((bool)$result);
	
		
	}

 public function testInvalidEmail() {
		$data = array(

                'email' => 'usernamegmailcom',
                'password' => '123456',

        );
		$this->Users = TableRegistry::get('Users');
		$user = $this->Users->newEntity($data);
		$result = $this->Users->save($user);
		$this->assertFalse((bool)$result);
	}

public function testSaveFormData() {
		//$this->skipIf(true);
		$data = array(
				'email' => 'harsha@gmail.com',
			   'password' => '123456',

            
		);
		$this->Users = TableRegistry::get('Users');
		
		$user = $this->Users->newEntity($data);
		$result = $this->Users->save($user);
		debug($result);
		$this->assertTrue((bool)$result);

	}

/*
public function testValidEmail() {
	// Build the data to save
	$data = array(

                'email' => 'harsha.shirali@gmail.com',

        );
		$this->Users = TableRegistry::get('Users');
		
		$user = $this->Users->newEntity($data);
	$result = $this->Users->save($user);
		debug($result);
	// Test successful insert
	/*
	$result=array();
		$this->assertArrayHasKey('Users', $result);
	*/
	
	// Get the count in the DB
	/*
	$resultExpect = $this->Users->find(array(
			'conditions' => array(
				'User.email' => 'harsha.shirali@gmail.com',
			),
		));
		$resultExpect = $this->Users->newEntity($resultExpect);
		// Test DB entry
		$this->assertEqual($resultExpect, $result);*/
	
//}*/

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
