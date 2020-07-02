<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * QuestionaireReadRelationalBook Entity
 *
 * @property int $id
 * @property int $questionaire_id
 * @property int $book_id
 *
 * @property \App\Model\Entity\Questionnaire $questionnaire
 * @property \App\Model\Entity\Book $book
 */
class QuestionaireReadRelationalBook extends Entity
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
        'questionaire_id' => true,
        'book_id' => true,
        'questionnaire' => true,
        'book' => true,
    ];
}
