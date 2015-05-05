<?php
namespace App\Model\Table;

use App\Model\Entity\BookmarksTag;
use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * BookmarksTags Model
 */
class BookmarksTagsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        $this->table('bookmarks_tags');
        $this->displayField('bookmark_id');
        $this->primaryKey(['bookmark_id', 'tag_id']);
        $this->belongsTo('Bookmarks', [
            'foreignKey' => 'bookmark_id'
        ]);
        $this->belongsTo('Tags', [
            'foreignKey' => 'tag_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->add('bookmark_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('bookmark_id', 'create')
            ->add('tag_id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('tag_id', 'create');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['bookmark_id'], 'Bookmarks'));
        $rules->add($rules->existsIn(['tag_id'], 'Tags'));
        return $rules;
    }
}
