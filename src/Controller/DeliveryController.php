<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Delivery Controller
 *
 * @property \App\Model\Table\DeliveryTable $Delivery
 * @method \App\Model\Entity\Delivery[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DeliveryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orderplaced'],
        ];
        $delivery = $this->paginate($this->Delivery);

        $this->set(compact('delivery'));
    }

    /**
     * View method
     *
     * @param string|null $id Delivery id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $delivery = $this->Delivery->get($id, [
            'contain' => ['Orderplaced'],
        ]);

        $this->set(compact('delivery'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $delivery = $this->Delivery->newEmptyEntity();
        if ($this->request->is('post')) {
            $delivery = $this->Delivery->patchEntity($delivery, $this->request->getData());
            if ($this->Delivery->save($delivery)) {
                $this->Flash->success(__('The delivery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery could not be saved. Please, try again.'));
        }
        $orderplaced = $this->Delivery->Orderplaced->find('list', ['limit' => 200])->all();
        $this->set(compact('delivery', 'orderplaced'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Delivery id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $delivery = $this->Delivery->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $delivery = $this->Delivery->patchEntity($delivery, $this->request->getData());
            if ($this->Delivery->save($delivery)) {
                $this->Flash->success(__('The delivery has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The delivery could not be saved. Please, try again.'));
        }
        $orderplaced = $this->Delivery->Orderplaced->find('list', ['limit' => 200])->all();
        $this->set(compact('delivery', 'orderplaced'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Delivery id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $delivery = $this->Delivery->get($id);
        if ($this->Delivery->delete($delivery)) {
            $this->Flash->success(__('The delivery has been deleted.'));
        } else {
            $this->Flash->error(__('The delivery could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
