<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Farmer Controller
 *
 * @property \App\Model\Table\FarmerTable $Farmer
 * @method \App\Model\Entity\Farmer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FarmerController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users'],
        ];
        $farmer = $this->paginate($this->Farmer);

        $this->set(compact('farmer'));
    }

    /**
     * View method
     *
     * @param string|null $id Farmer id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $farmer = $this->Farmer->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('farmer'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $farmer = $this->Farmer->newEmptyEntity();
        if ($this->request->is('post')) {
            $farmer = $this->Farmer->patchEntity($farmer, $this->request->getData());
            if ($this->Farmer->save($farmer)) {
                $this->Flash->success(__('The farmer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farmer could not be saved. Please, try again.'));
        }
        $users = $this->Farmer->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('farmer', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Farmer id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $farmer = $this->Farmer->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $farmer = $this->Farmer->patchEntity($farmer, $this->request->getData());
            if ($this->Farmer->save($farmer)) {
                $this->Flash->success(__('The farmer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The farmer could not be saved. Please, try again.'));
        }
        $users = $this->Farmer->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('farmer', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Farmer id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $farmer = $this->Farmer->get($id);
        if ($this->Farmer->delete($farmer)) {
            $this->Flash->success(__('The farmer has been deleted.'));
        } else {
            $this->Flash->error(__('The farmer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
