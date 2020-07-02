<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * BookBeginTextRuby Entity
 *
 * @property int $id
 * @property int $book_begin_text_id
 * @property string $code
 * @property string $ruby
 *
 * @property \App\Model\Entity\BookBeginText $book_begin_text
 */
class BookBeginTextRuby extends Entity
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
        'book_begin_text_id' => true,
        'code' => true,
        'ruby' => true,
        'book_begin_text' => true,
    ];
}
