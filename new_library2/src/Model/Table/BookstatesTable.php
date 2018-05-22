<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Bookstates Model
 *
 * @property \App\Model\Table\BooksTable|\Cake\ORM\Association\BelongsTo $Books
 * @property \App\Model\Table\RentalsTable|\Cake\ORM\Association\HasMany $Rentals
 * @property \App\Model\Table\ReservationsTable|\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\Bookstate get($primaryKey, $options = [])
 * @method \App\Model\Entity\Bookstate newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Bookstate[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Bookstate|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Bookstate patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Bookstate[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Bookstate findOrCreate($search, callable $callback = null, $options = [])
 */
class BookstatesTable extends Table
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

        $this->setTable('bookstates');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Books', [
            'foreignKey' => 'book_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Rentals', [
            'foreignKey' => 'bookstate_id'
        ]);
        $this->hasMany('Reservations', [
            'foreignKey' => 'bookstate_id'
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
            ->date('arrival_date')
            ->requirePresence('arrival_date', 'create')
            ->notEmpty('arrival_date');

        $validator
            ->date('delete_date')
            ->requirePresence('delete_date', 'create')
            ->notEmpty('delete_date');

        $validator
            ->integer('state')
            ->requirePresence('state', 'create')
            ->notEmpty('state');

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
        $rules->add($rules->existsIn(['book_id'], 'Books'));

        return $rules;
    }
}
