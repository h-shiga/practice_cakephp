<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookBeginText Entity
 *
 * @property int $id
 * @property int $book_id
 * @property string $begin_text
 *
 * @property \App\Model\Entity\Book $book
 * @property \App\Model\Entity\BookBeginTextRuby[] $book_begin_text_rubies
 */
class BookBeginText extends Entity
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
        'begin_text' => true,
        'book' => true,
        'book_begin_text_rubies' => true,
    ];
}
