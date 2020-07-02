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
            ->contain(['BookBeginTexts'])->contain(['BookCategories'])->contain(['BookCharacters'])->contain(['Countries'])->contain(['Creators']);
        $this->set('books', $books);
        $books->enableHydration();
        debug($books->first()->name);
        debug($books->first()->book_begin_texts);
        debug($books);
        foreach ($books as $book) {
            debug($book);
        }
    }
}
