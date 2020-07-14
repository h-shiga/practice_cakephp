<?php

declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Questionnaire Entity
 *
 * @property int $id
 * @property string $impression
 * @property bool $is_read
 * @property string $know_trigger
 * @property string|null $answerer_gender_code
 * 
 */
class Questionnaire extends Entity
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
        'impression' => true,
        'is_read' => true,
        'know_trigger' => true,
        'answerer_gender_code' => true,
        'book_id' => true,
    ];
}
