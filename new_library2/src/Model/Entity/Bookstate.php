<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Bookstate Entity
 *
 * @property int $id
 * @property int $book_id
 * @property \Cake\I18n\FrozenDate $arrival_date
 * @property \Cake\I18n\FrozenDate $delete_date
 * @property int $state
 *
 * @property \App\Model\Entity\Book $book
 * @property \App\Model\Entity\Rental[] $rentals
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class Bookstate extends Entity
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
        'book_id' => true,
        'arrival_date' => true,
        'delete_date' => true,
        'state' => true,
        'book' => true,
        'rentals' => true,
        'reservations' => true
    ];
}
