<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $category_id
 * @property string $publisher_id
 * @property string $isbn
 * @property string $name
 * @property string $author
 * @property string $publish_date
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Publisher $publisher
 * @property \App\Model\Entity\Bookstate[] $bookstates
 * @property \App\Model\Entity\Reservation[] $reservations
 */
class Book extends Entity
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
        'category_id' => true,
        'publisher_id' => true,
        'isbn' => true,
        'name' => true,
        'author' => true,
        'publish_date' => true,
        'category' => true,
        'publisher' => true,
        'bookstates' => true,
        'reservations' => true
    ];
}
