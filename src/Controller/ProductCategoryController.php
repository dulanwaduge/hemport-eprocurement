<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * ProductCategory Controller
 *
 * @property \App\Model\Table\ProductCategoryTable $ProductCategory
 * @method \App\Model\Entity\ProductCategory[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProductCategoryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Product', 'Category'],
        ];
        $productCategory = $this->paginate($this->ProductCategory);

        $this->set(compact('productCategory'));
    }

    /**
     * View method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $productCategory = $this->ProductCategory->get($id, [
            'contain' => ['Product', 'Category'],
        ]);

        $this->set(compact('productCategory'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $productCategory = $this->ProductCategory->newEmptyEntity();
        if ($this->request->is('post')) {
            $productCategory = $this->ProductCategory->patchEntity($productCategory, $this->request->getData());
            if ($this->ProductCategory->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $product = $this->ProductCategory->Product->find('list', ['limit' => 200])->all();
        $category = $this->ProductCategory->Category->find('list', ['limit' => 200])->all();
        $this->set(compact('productCategory', 'product', 'category'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $productCategory = $this->ProductCategory->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $productCategory = $this->ProductCategory->patchEntity($productCategory, $this->request->getData());
            if ($this->ProductCategory->save($productCategory)) {
                $this->Flash->success(__('The product category has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The product category could not be saved. Please, try again.'));
        }
        $product = $this->ProductCategory->Product->find('list', ['limit' => 200])->all();
        $category = $this->ProductCategory->Category->find('list', ['limit' => 200])->all();
        $this->set(compact('productCategory', 'product', 'category'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Product Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $productCategory = $this->ProductCategory->get($id);
        if ($this->ProductCategory->delete($productCategory)) {
            $this->Flash->success(__('The product category has been deleted.'));
        } else {
            $this->Flash->error(__('The product category could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
