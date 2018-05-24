<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $last_name
 * @property string $first_name
 * @property string $postal
 * @property string $address
 * @property string $tel
 * @property string $email
 * @property \Cake\I18n\FrozenDate $birthday
 * @property string $password
 * @property string $role
 * @property \Cake\I18n\FrozenDate $add_date
 * @property \Cake\I18n\FrozenDate $delete_date
 *
 * @property \App\Model\Entity\Rental[] $rentals
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class User extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'last_name' => true,
        'first_name' => true,
        'postal' => true,
        'address' => true,
        'tel' => true,
        'email' => true,
        'birthday' => true,
        'password' => true,
        'role' => true,
        'add_date' => true,
        'delete_date' => true,
        'rentals' => true,
        'reservations' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];
    protected function _setPassword($password){
      return (new DefaultPasswordHasher)->hash($password);
    }
}
