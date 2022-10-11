<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Category Controller
 *
 * @property \App\Model\Table\CategoryTable $Category
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CategoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Category'],
        ];
        $category = $this->paginate($this->Category);

        $this->set(compact('category'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $category = $this->Category->get($id, [
            'contain' => ['Category', 'Product'],
        ]);

        $this->set(compact('category'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $category = $this->Category->newEmptyEntity();
        if ($this->request->is('post')) {
            $category = $this->Category->patchEntity($category, $this->request->getData());
            if ($this->Category->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $category = $this->Category->Category->find('list', ['limit' => 200])->all();
        $product = $this->Category->Product->find('list', ['limit' => 200])->all();
        $this->set(compact('category', 'category', 'product'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $category = $this->Category->get($id, [
            'contain' => ['Product'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $category = $this->Category->patchEntity($category, $this->request->getData());
            if ($this->Category->save($category)) {
                $this->Flash->success(__('The category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The category could not be saved. Please, try again.'));
        }
        $category = $this->Category->Category->find('list', ['limit' => 200])->all();
        $product = $this->Category->Product->find('list', ['limit' => 200])->all();
        $this->set(compact('category', 'category', 'product'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $category = $this->Category->get($id);
        if ($this->Category->delete($category)) {
            $this->Flash->success(__('The category has been deleted.'));
        } else {
            $this->Flash->error(__('The category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
