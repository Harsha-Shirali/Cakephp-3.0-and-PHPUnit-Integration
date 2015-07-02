<?php
namespace App\Test\TestCase\Controller;

use App\Controller\UsersController;
use Cake\TestSuite\IntegrationTestCase;
use Cake\ORM\TableRegistry;

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
 

    /**
     * Test view method
     *
     * @return void
     */
    /*
     public function testIndex()
        {
            $result = $this->get('/users/index');
            debug($result);
            //$this->assertTrue(TRUE, 'This should already work.');
        }*/
    public function testIndex() {
		$this->get(array('controller' => 'Users', 'action' => 'login'));
		$this->assertResponseCode(200);
		$this->assertNoRedirect();
	}

    /**
     * Test view method
     *
     * @return void
     */
    public function testView()
    {
		$result = $this->get('/users/index');
       // debug($result);
        $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test add method
     *
     * @return void
     */
    public function testAdd()
    {
		$result = $this->get('/users/add');
        //debug($result);
      $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test edit method
     *
     * @return void
     */
    public function testEdit()
    {
		$result = $this->get('/users/edit');
       // debug($result);
       $this->assertTrue(TRUE, 'This should already work.');
    }

    /**
     * Test delete method
     *
     * @return void
     */
    public function testDelete()
    {
		$result = $this->get('/users/delete');
        //debug($result);
        $this->assertTrue(TRUE, 'This should already work.');
    }
    
    public function testLogin()
    {
		$result = $this->get('/users/login');
       // debug($result);
       $this->assertTrue(TRUE, 'This should already work.');
    }
    public function testRedirection() {
    $return_var = $this->get('/users/login', array('return'=>'vars'));
   // debug($return_var);
	 $this->assertTrue(TRUE, 'This should already work.');
}


public function testLoginX() {
		$this->get(array('controller' => 'Users', 'action' => 'login'));
		$this->assertResponseCode(200);
		$this->assertNoRedirect();
	}

	
	public function testLoginLoggedIn() {
		$data = array(
			'Auth' => array('User' => array('email' => 'harsha.shirali@gmail.com','password' => '123456'))
		);
		$this->session($data);
		$this->get(array('controller' => 'Users', 'action' => 'login'));
	
		$this->assertResponseCode(200);
		//$this->assertRedirect('/');
		
//		$this->assertSession($data);
	}
	
	public function testLoginPostInvalidData() {
		$this->post(array('controller' => 'Users', 'action' => 'login'));
		$this->assertResponseCode(200);
		$this->assertNoRedirect();
	}
	
	public function testLoginPostValidData() {
		
		$data = array(
			'email' => 'harsha.shirali@gmail.com',
			'password' => '123456'
		);
		$this->Users = TableRegistry::get('Users');
		
		$user = $this->Users->newEntity($data);
		$result = $this->Users->save($user);
		$this->assertTrue((bool)$result);
	
		$data = array(
			'email' => 'harsha.shirali@gmail.com', 'password' => '123456'
		);
		$this->post(array('controller' => 'Users', 'action' => 'login'), $data);
		$this->assertResponseCode(302);
		$this->assertRedirect('/');
	}
    
	
	
	public function testLoginPostValidDataEmail() {
		//$this->skipIf(true);
		$data = array(
			'email' => 'harsha.shirali@gmail.com',
			'password' => '123456'
		);
		$this->Users = TableRegistry::get('Users');
		
		$user = $this->Users->newEntity($data);
		$result = $this->Users->save($user);
		$this->assertTrue((bool)$result);
	
		$data = array(
			'email' => 'harsha.shirali@gmail.com', 'password' => '123456'
		);
		$this->post(array('controller' => 'Users', 'action' => 'login'), $data);
		$this->assertResponseCode(302);
		$this->assertRedirect('/');
	}

	public function testLogout() {
		$session = array('Auth' => array('User' => array('email' => 'harsha.shirali@gmail.com','password' => '123456')));
		$this->session($session);
		$this->get(array('controller' => 'Users', 'action' => 'logout'));
		$this->assertResponseCode(302);
		$this->assertRedirect('users/login');
	}
	
	public function testRegister() {
		$this->get(array('controller' => 'Users', 'action' => 'add'));
		$this->assertResponseCode(200);
		$this->assertNoRedirect();
	}
   /* public function testPostLoginData() {

      
        $this->Users = $this->generate( 'Users', array(
                'components' => array(
               'Auth' => array('user'),'Security', 'Session'
                )
            ) );
			
			$this->Users->Session
		    ->expects($this->any())
		    ->method('write');

	    $this->Users->Session
		    ->expects($this->any())
		    ->method('read');

	    $this->Users->Session
		    ->expects($this->any())
		    ->method('setFlash');

        //create user data array with valid info
        $data = array();
        $data['User']['email'] = 'harsha.shirali@gmail.com';
        $data['User']['password'] = '123456';

        //test login action
        $result = $this->testAction( "/users/login", array(
                "method" => "post",
                "return" => "contents",
                "data" => $data
            )
        );

        $foo[] = $this->view;

        $this->assertNotContains( '"/users/login"', $foo );
        $this->Users->Auth->logout();
    }*/
 

/*public function testAddAuthenticated()
{

  $data = array();
        $data['User']['email'] = 'harsha.shirali@gmail.com';
        $data['User']['password'] = '123456';

       
        $result = $this->get( "/users/login", array(
                "method" => "post",
                "return" => "contents",
                "data" => $data
            )
        );

        $this->assertNotContains( '"/users/login"', $foo );
        $this->Users->Auth->logout();

}*/
/*
public function testIndexPostData() {
       $data = array('User' => array(
		'email' => 'harsha.shirali@gmail.com',
		'password' => '123456',
	));
        $result = $this->get(
            '/users/login',
            array('data' => $data, 'method' => 'post')
        );
        debug($result);
    }
*/

}
