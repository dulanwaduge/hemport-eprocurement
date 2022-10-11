<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OrderProduct Controller
 *
 * @property \App\Model\Table\OrderProductTable $OrderProduct
 * @method \App\Model\Entity\OrderProduct[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrderProductController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Product', 'Orderplaced'],
        ];
        $orderProduct = $this->paginate($this->OrderProduct);

        $this->set(compact('orderProduct'));
    }

    /**
     * View method
     *
     * @param string|null $id Order Product id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $orderProduct = $this->OrderProduct->get($id, [
            'contain' => ['Product', 'Orderplaced'],
        ]);

        $this->set(compact('orderProduct'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $orderProduct = $this->OrderProduct->newEmptyEntity();
        if ($this->request->is('post')) {
            $orderProduct = $this->OrderProduct->patchEntity($orderProduct, $this->request->getData());
            if ($this->OrderProduct->save($orderProduct)) {
                $this->Flash->success(__('The order product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order product could not be saved. Please, try again.'));
        }
        $product = $this->OrderProduct->Product->find('list', ['limit' => 200])->all();
        $orderplaced = $this->OrderProduct->Orderplaced->find('list', ['limit' => 200])->all();
        $this->set(compact('orderProduct', 'product', 'orderplaced'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Order Product id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $orderProduct = $this->OrderProduct->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $orderProduct = $this->OrderProduct->patchEntity($orderProduct, $this->request->getData());
            if ($this->OrderProduct->save($orderProduct)) {
                $this->Flash->success(__('The order product has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The order product could not be saved. Please, try again.'));
        }
        $product = $this->OrderProduct->Product->find('list', ['limit' => 200])->all();
        $orderplaced = $this->OrderProduct->Orderplaced->find('list', ['limit' => 200])->all();
        $this->set(compact('orderProduct', 'product', 'orderplaced'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Order Product id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $orderProduct = $this->OrderProduct->get($id);
        if ($this->OrderProduct->delete($orderProduct)) {
            $this->Flash->success(__('The order product has been deleted.'));
        } else {
            $this->Flash->error(__('The order product could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
