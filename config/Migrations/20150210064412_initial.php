<?php

use Phinx\Migration\AbstractMigration;

class Initial extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     *
     * Uncomment this method if you would like to use it.
     *
*/
    public function change()
    {

	$articles = $this->table('articles');
$articles->addColumn('title', 'string', ['limit' => 50])
->addColumn('body', 'text', ['null' => true, 'default' => null])
->addColumn('category_id', 'integer', ['null' => true, 'default' => null])
->addColumn('created', 'datetime')
->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
->save();
$categories = $this->table('categories');
$categories->addColumn('parent_id', 'integer', ['null' => true, 'default' => null])
->addColumn('lft', 'integer', ['null' => true, 'default' => null])
->addColumn('rght', 'integer', ['null' => true, 'default' => null])
->addColumn('name', 'string', ['limit' => 255])
->addColumn('description', 'string', ['limit' => 255, 'null' => true, 'default' => null])
->addColumn('created', 'datetime')
->addColumn('modified', 'datetime', ['null' => true, 'default' => null])
->save();
    }
    
    
    /**
     * Migrate Up.
     */
    public function up()
    {
    
    }

    /**
     * Migrate Down.
     */
    public function down()
    {

    }
}
