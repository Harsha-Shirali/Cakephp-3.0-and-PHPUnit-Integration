<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookmarksTag Entity.
 */
class BookmarksTag extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * @var array
     */
    protected $_accessible = [
        'bookmark' => true,
        'tag' => true,
    ];
}
