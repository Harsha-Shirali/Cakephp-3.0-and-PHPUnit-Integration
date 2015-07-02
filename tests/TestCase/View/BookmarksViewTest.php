<?php 

namespace App\Test\TestCase\View;

use App\Template\Bookmarks;
use Cake\Core\Configure;
use Cake\Core\Plugin;
use Cake\Network\Request;
use Cake\Network\Response;
use Cake\TestSuite\StringCompareTrait;
use Cake\TestSuite\TestCase;
use Cake\Controller\Controller;
use Cake\View\View;
use Cake\View\ViewRegistry;
use Cake\TestSuite\IntegrationTestCase;

class BookmarksViewTest extends IntegrationTestCase
{
   //use StringCompareTrait;

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
      //  $this->_compareBasePath = Plugin::path('App') . 'tests' . DS . 'TestCase' . DS . 'BookmarksView' . DS;

      //-----------------------------------------
      
       $request = new Request();
                     $response = new Response();
       
			// $this->Bookmark = new View($request, $response);
			 
	$Controller = new Controller();
    $View = new View($request, $response);
	$this->Bookmark = new View($request, $response);
   // $this->Bookmark = new Bookmarks($View);
	//-------------------------------------------
	/*
	
		
		$config = ViewRegistry::exists('Bookmarks') ? [] : ['view' => 'App\Template\Bookmarks'];
		   $this->Bookmark = ViewRegistry::get('Bookmarks', $config);
		   */
	
	   //----------------------------------------
              // $this->Bookmark = new BookmarksView($View);
       /*
       $View = new View();
               $this->Bookmark = new BookmarksView($View);*/
       
       /*
        Configure::write(
                   'App.paths.templates.x',
                   Plugin::path('App') . 'Template' . DS . 'Bookmarks' . DS
               );
*/
       
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        parent::tearDown();
        unset($this->View);
    }

    /**
     * test rendering a template file
     *
     * @return void
     */
    public function testRenderTemplate()
    {
        $this->Bookmark->set(['aVariable' => 1]);
        $result = $this->Bookmark->render('Template/Bookmarks/add');
        $expected = "The value of aVariable is: 123.\n";

        $this->assertSame($expected, $result, 'variables in erb-style tags should be evaluated');
    }

    /**
     * verify that php tags are ignored
     *
     * @return void
     */
    public function testRenderIgnorePhpTags()
    {
        $this->Bookmark->set(['aVariable' => 1]);
        $result = $this->Bookmark->render('add.ctp');
        $expected = "The value of aVariable is: 123. Not <?php echo \$aVariable ?>.\n";

        $this->assertSame($expected, $result, 'variables in php tags should be treated as strings');
    }

    /**
     * verify that short php tags are ignored
     *
     * @return void
     */
    public function testRenderIgnorePhpShortTags()
    {
        $this->Bookmark->set(['aVariable' => 123]);
        $result = $this->Bookmark->render('add.ctp');
        $expected = "The value of aVariable is: 123. Not <?= \$aVariable ?>.\n";

        $this->assertSame($expected, $result, 'variables in php tags should be treated as strings');
    }

    /**
     * Newlines after template tags should act predictably
     *
     * @return void
     */
    public function testRenderNewlines()
    {
        $result = $this->Bookmark->render('add.ctp');
        $expected = "There should be a newline about here: \n";
        $expected .= "And this should be on the next line.\n";
        $expected .= "\n";
        $expected .= "There should be no new line after this";

        $this->assertSame(
            $expected,
            $result,
            'Tags at the end of a line should not swallow new lines when rendered'
        );
    }

    /**
     * Verify that template tags with leading whitespace don't leave a mess
     *
     * @return void
     */
    public function testSwallowLeadingWhitespace()
    {
        $result = $this->Bookmark->render('add.ctp');
        $this->assertSameAsFile(__FUNCTION__ . '.php', $result);
    }
}
