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
        $books = $this->paginate($this->Books->find());
        $bookIntroductions = $books->first();
        $before = [];
        $after = [];
        foreach ($bookIntroductions->book_begin_text->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $questions = $this->Questions->newEmptyEntity();
        if ($this->request->is('post')) {
            $questions = $this->Questions->patchEntity($questions, $this->request->getData());

            if ($this->Questions->save($questions)) {
                $this->Flash->success(__('ご協力ありがとうございました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('登録ができませんでした。'));
        }
        $isRead = ['0' => 'はい', '1' => 'いいえ'];
        $genders = $this->Genders->find('list', ['limit' => 200]);
        $bookName = $this->Books->find('list', ['limit' => 200]);
        $this->set(compact('books', 'before', 'after', 'bookIntroductions', 'questions', 'isRead', 'genders', 'bookName',));
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
        foreach ($bookIntroductions->book_begin_text->book_begin_text_rubies as $book) {
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
        foreach ($bookIntroductions->book_begin_text->book_begin_text_rubies as $book) {
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
        foreach ($bookIntroductions->book_begin_text->book_begin_text_rubies as $book) {
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
        foreach ($bookIntroductions->book_begin_text->book_begin_text_rubies as $book) {
            array_push($before, '/※' . $book->code . '/');
            array_push($after, $book->ruby);
        }
        $this->set(compact('books', 'genders', 'before', 'after', 'bookIntroductions'));
    }

    public function questionnaire()
    {
        $questions = $this->Questions->find();
        $books = $this->Books->find();
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
                $this->Flash->success(__('本の登録が完了しました。'));
                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('登録ができませんでした。'));
        }
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
                $this->Flash->success(__('編集が完了しました。'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('編集ができませんでした。'));
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
        $question = $this->Questions->get($id);
        if ($this->Questions->delete($question)) {
            $this->Flash->success(__('削除が完了しました。'));
        } else {
            $this->Flash->error(__('削除できませんでした。'));
        }

        return $this->redirect(['action' => 'questionnaire']);
    }
}
