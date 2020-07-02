<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookCharacter Entity
 *
 * @property int $id
 * @property int $book_id
 * @property string $name
 * @property string|null $role
 *
 * @property \App\Model\Entity\Book $book
 */
class BookCharacter extends Entity
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
        'name' => true,
        'role' => true,
        'book' => true,
    ];
}
