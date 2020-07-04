<?php

declare(strict_types=1);

namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

/**
 * Books Controller
 *
 * @property \App\Model\Table\BooksTable $Books
 * @method \App\Model\Entity\Book[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class BooksController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
        $this->Genders = TableRegistry::getTableLocator()->get('genders');
        $this->Questionnaires = TableRegistry::getTableLocator()->get('questionnaires');
    }

    /**
     * 
     */
    public function index()
    {
        $this->paginate = ['contain' => ['Creators']];
        $books = $this->paginate($this->Books->find());
        if ($this->request->is('post')) {
            $find = $this->request->getData('find');
            $books = $this->paginate($this->Books->find()->where([
                'OR' => [
                    ['Books.name like ' => '%' . $find . '%'],
                    ['publication_date like' => '%' . $find . '%'],
                ],
            ]));
        }
        $this->set(compact('books'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function cat()
    {
        $this->paginate = ['contain' => [
            'BookBeginTexts' => ['BookBeginTextRubies'],
            'BookCategories',
            'BookCharacters',
            'Countries',
            'Creators',
        ]];
        $books = $this->paginate($this->Books->find());
        $bookIntroductions = $books->first();
        $before = [];
        $after = [];
        foreach ($bookIntroductions->book_begin_texts[0]->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'before', 'after', 'bookIntroductions',));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function son()
    {
        $this->paginate = ['contain' => [
            'BookBeginTexts' => ['BookBeginTextRubies'],
            'BookCategories',
            'BookCharacters',
            'Countries',
            'Creators',
        ]];
        $books = $this->paginate($this->Books->find());
        $bookIntroductions = $books->toArray()[1];
        $genders = $this->Genders->find();
        $before = [];
        $after = [];
        foreach ($bookIntroductions->book_begin_texts[0]->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after', 'bookIntroductions'));
    }

    public function heart()
    {
        $this->paginate = ['contain' => [
            'BookBeginTexts' => ['BookBeginTextRubies'],
            'BookCategories',
            'BookCharacters',
            'Countries',
            'Creators',
        ]];
        $books = $this->paginate($this->Books->find());
        $bookIntroductions = $books->toArray()[2];
        $genders = $this->Genders->find();
        $before = [];
        $after = [];
        foreach ($bookIntroductions->book_begin_texts[0]->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after', 'bookIntroductions'));
    }

    public function daisies()
    {
        $this->paginate = ['contain' => [
            'BookBeginTexts' => ['BookBeginTextRubies'],
            'BookCategories',
            'BookCharacters',
            'Countries',
            'Creators',
        ]];
        $books = $this->paginate($this->Books->find());
        $bookIntroductions = $books->toArray()[3];
        $genders = $this->Genders->find();
        $before = [];
        $after = [];
        foreach ($bookIntroductions->book_begin_texts[0]->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after', 'bookIntroductions'));
    }

    public function lemon()
    {
        $this->paginate = ['contain' => [
            'BookBeginTexts' => ['BookBeginTextRubies'],
            'BookCategories',
            'BookCharacters',
            'Countries',
            'Creators',
        ]];
        $books = $this->paginate($this->Books->find());
        $bookIntroductions = $books->last();
        $genders = $this->Genders->find();
        $before = [];
        $after = [];
        foreach ($bookIntroductions->book_begin_texts[0]->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after', 'bookIntroductions'));
    }

    public function questionnaire()
    {
        $questionnaires = $this->Questionnaires->newEmptyEntity();
        $genders = $this->Genders->find('list');
        $bookName = $this->Books->find('list');
        $isRead = ['0' => 'はい', '1' => 'いいえ'];
        if ($this->request->is('post')) {
            $questionnaires = $this->Questionnaires->patchEntity($questionnaires, $this->request->getData());
            debug($questionnaires);

            $questionnaires->id = 1;

            if ($this->Questionnaires->save($questionnaires)) {
                $this->Flash->success(__('Your article has been saved.'));
                $this->Flash->success($questionnaires);
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Unable to add your article.'));
        }
        $this->set(compact('questionnaires', 'genders', 'bookName', 'isRead'));
    }

    /**
     * View method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => ['BookCategories', 'Creators', 'BookBeginTexts', 'BookCharacters', 'QuestionaireReadRelationalBooks'],
        ]);

        $this->set(compact('book'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $book = $this->Books->newEmptyEntity();
        if ($this->request->is('post')) {
            $book = $this->Books->patchEntity($book, $this->request->getData(), ['associated' => ['BookBeginTexts']]);
            debug($book);
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $bookCategories = $this->Books->BookCategories->find('list', ['limit' => 200]);
        $creators = $this->Books->Creators->find('list', ['limit' => 200]);
        $countries = $this->Books->Countries->find('list', ['limit' => 200]);
        $this->set(compact('book', 'bookCategories', 'creators', 'countries',));
    }

    /**
     * Edit method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $book = $this->Books->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $bookCategories = $this->Books->BookCategories->find('list', ['limit' => 200]);
        $creators = $this->Books->Creators->find('list', ['limit' => 200]);
        $countries = $this->Books->Countries->find('list', ['limit' => 200]);
        $this->set(compact('book', 'bookCategories', 'creators', 'countries',));
    }

    /**
     * Delete method
     *
     * @param string|null $id Book id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $book = $this->Books->get($id);
        if ($this->Books->delete($book)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
