<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Books Model
 *
 * @property \App\Model\Table\CategoriesTable|\Cake\ORM\Association\BelongsTo $Categories
 * @property \App\Model\Table\PublishersTable|\Cake\ORM\Association\BelongsTo $Publishers
 * @property \App\Model\Table\BookstatesTable|\Cake\ORM\Association\HasMany $Bookstates
 * @property \App\Model\Table\ReservationsTable|\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\Book get($primaryKey, $options = [])
 * @method \App\Model\Entity\Book newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Book[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Book|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Book patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Book[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Book findOrCreate($search, callable $callback = null, $options = [])
 */
class BooksTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('books');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Categories', [
            'foreignKey' => 'category_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Publishers', [
            'foreignKey' => 'publisher_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Bookstates', [
            'foreignKey' => 'book_id'
        ]);
        $this->hasMany('Reservations', [
            'foreignKey' => 'book_id'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('isbn')
            ->maxLength('isbn', 13)
            ->requirePresence('isbn', 'create')
            ->notEmpty('isbn');

        $validator
            ->scalar('name')
            ->maxLength('name', 100)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('author')
            ->maxLength('author', 20)
            ->requirePresence('author', 'create')
            ->notEmpty('author');

        $validator
            ->scalar('publish_date')
            ->maxLength('publish_date', 255)
            ->requirePresence('publish_date', 'create')
            ->notEmpty('publish_date');

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
        $rules->add($rules->existsIn(['category_id'], 'Categories'));
        $rules->add($rules->existsIn(['publisher_id'], 'Publishers'));

        return $rules;
    }
}
