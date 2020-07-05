<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Book Entity
 *
 * @property int $id
 * @property string $name
 * @property int $book_category_id
 * @property int $creator_id
 * @property \Cake\I18n\FrozenDate|null $publication_date
 * @property string|null $country_code
 * @property string|null $e_name
 * @property string|null $image
 *
 * @property \App\Model\Entity\BookCategory $book_category
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Creator $creator
 * @property \App\Model\Entity\BookBeginText $book_begin_text
 * @property \App\Model\Entity\BookCharacter[] $book_characters
 * @property \App\Model\Entity\QuestionaireReadRelationalBook[] $questionaire_read_relational_books
 * @property \App\Model\Entity\Questionnaire[] $questionnaires
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
        'id' => true,
        'name' => true,
        'book_category_id' => true,
        'creator_id' => true,
        'publication_date' => true,
        'country_code' => true,
        'e_name' => true,
        'image' => true,
        'book_category' => true,
        'country' => true,
        'creator' => true,
        'book_begin_text' => true,
        'book_characters' => true,
        'questionaire_read_relational_books' => true,
        'questionnaires' => true,
    ];
}
