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
        $this->Genders = TableRegistry::get('genders');
    }

    /**
     * 
     */
    public function index()
    {
        $this->paginate = ['contain' => ['Creators']];
        $books = $this->paginate($this->Books);
        $this->set(compact('books'));
        $title = $this->Books->find('list');
        $this->set(compact('title'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function cat()
    {
        $this->paginate = ['contain' => [
            'BookBeginTexts' => ['BookBeginTextRubies'], 'BookCategories', 'BookCharacters',
            'Countries', 'Creators'
        ]];
        $books = $this->paginate($this->Books);
        $genders = $this->Genders->find();
        $before = array();
        $after = array();
        foreach ($books->first()->book_begin_texts[0]->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after'));
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function son()
    {
        $this->paginate = ['contain' => [
            'BookBeginTexts' => ['BookBeginTextRubies'], 'BookCategories', 'BookCharacters',
            'Countries', 'Creators'
        ]];
        $books = $this->paginate($this->Books);
        $this->set(compact('books'));
        debug($books);
    }

    public function questionnaire()
    {
        $this->paginate = ['contain' => ['QuestionaireReadRelationalBooks' => ['Questionnaires' => ['Genders'],],]];
        $books = $this->paginate($this->Books);
        $this->set(compact('books'));
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
            $book = $this->Books->patchEntity($book, $this->request->getData());
            if ($this->Books->save($book)) {
                $this->Flash->success(__('The book has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The book could not be saved. Please, try again.'));
        }
        $bookCategories = $this->Books->BookCategories->find('list', ['limit' => 200]);
        $creators = $this->Books->Creators->find('list', ['limit' => 200]);
        $this->set(compact('book', 'bookCategories', 'creators'));
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
        $this->set(compact('book', 'bookCategories', 'creators'));
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
