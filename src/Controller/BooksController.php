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
        $this->Questions = TableRegistry::getTableLocator()->get('questionnaires');
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
        $books = $this->paginate($this->Books->find())->first();
        $before = [];
        $after = [];
        foreach ($books->book_begin_text->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $questions = $this->Questions->newEmptyEntity();
        if ($this->request->is('post')) {
            $questions = $this->Questions->patchEntity($questions, $this->request->getData());

            if ($this->Questions->save($questions)) {
                $this->Flash->success('ご協力ありがとうございました。');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('登録ができませんでした。');
        }
        $isRead = ['1' => 'はい', '0' => 'いいえ'];
        $genders = $this->Genders->find('list', ['limit' => 200]);
        $bookName = $this->Books->find('list', ['keyField' => 'name', 'limit' => 200]);
        $this->set(compact('books', 'before', 'after', 'questions', 'isRead', 'genders', 'bookName',));
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
        $books = $this->paginate($this->Books->find())->toArray()[1];
        $genders = $this->Genders->find();
        $before = [];
        $after = [];
        foreach ($books->book_begin_text->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after',));
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
        $books = $this->paginate($this->Books->find())->toArray()[2];
        $genders = $this->Genders->find();
        $before = [];
        $after = [];
        foreach ($books->book_begin_text->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after',));
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
        $books = $this->paginate($this->Books->find())->toArray()[3];
        $genders = $this->Genders->find();
        $before = [];
        $after = [];
        foreach ($books->book_begin_text->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after',));
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
        $books = $this->paginate($this->Books->find())->toArray()[4];
        $genders = $this->Genders->find();
        $before = [];
        $after = [];
        foreach ($books->book_begin_text->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after',));
    }

    public function questionnaire()
    {
        $questions = $this->Questions->find();
        $books = $this->Books->find('list');
        $this->set(compact('questions', 'books'));
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
            if ($this->Books->save($book)) {
                $this->Flash->success('本の登録が完了しました。');
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('登録ができませんでした。');
        }
        debug($book);
        $bookCategories = $this->Books->BookCategories->find('list', ['limit' => 200]);
        $creators = $this->Books->Creators->find('list', ['limit' => 200]);
        $countries = $this->Books->Countries->find('list', ['limit' => 200]);
        $this->set(compact('book', 'bookCategories', 'creators', 'countries',));
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
                $this->Flash->success('編集が完了しました。');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('編集ができませんでした。');
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
        $books = $this->Books->get($id);
        if ($this->Books->delete($books)) {
            $this->Flash->success('削除が完了しました。');
        } else {
            $this->Flash->error('削除できませんでした。');
        }

        return $this->redirect(['action' => 'index']);
    }
}
