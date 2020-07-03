<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;

class IntroductionsController extends AppController
{

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Flash');
    }

    public function index()
    {
        $books = TableRegistry::getTableLocator()->get('Books')->find()
            ->contain(['BookBeginTexts', 'BookCategories', 'BookCharacters', 'Countries', 'Creators']);
        $this->set('books', $books);
        $genders = TableRegistry::getTableLocator()->get('Genders')->find();
        $this->set('genders', $genders);
        //debug($books->first()->id);
        debug($books->first());
        //debug($books);
        for ($i = 0; $i < 5; $i++) {
            debug($books->first()->book_characters[$i]->name);
        }
    }
}
