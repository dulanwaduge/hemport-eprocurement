<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Manufactures Controller
 *
 * @property \App\Model\Table\ManufacturesTable $Manufactures
 * @method \App\Model\Entity\Manufacture[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ManufacturesController extends AppController
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
        $manufactures = $this->paginate($this->Manufactures);

        $this->set(compact('manufactures'));
    }

    /**
     * View method
     *
     * @param string|null $id Manufacture id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $manufacture = $this->Manufactures->get($id, [
            'contain' => ['Users'],
        ]);

        $this->set(compact('manufacture'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $manufacture = $this->Manufactures->newEmptyEntity();
        if ($this->request->is('post')) {
            $manufacture = $this->Manufactures->patchEntity($manufacture, $this->request->getData());
            if ($this->Manufactures->save($manufacture)) {
                $this->Flash->success(__('The manufacture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manufacture could not be saved. Please, try again.'));
        }
        $users = $this->Manufactures->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('manufacture', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Manufacture id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $manufacture = $this->Manufactures->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $manufacture = $this->Manufactures->patchEntity($manufacture, $this->request->getData());
            if ($this->Manufactures->save($manufacture)) {
                $this->Flash->success(__('The manufacture has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The manufacture could not be saved. Please, try again.'));
        }
        $users = $this->Manufactures->Users->find('list', ['limit' => 200])->all();
        $this->set(compact('manufacture', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Manufacture id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $manufacture = $this->Manufactures->get($id);
        if ($this->Manufactures->delete($manufacture)) {
            $this->Flash->success(__('The manufacture has been deleted.'));
        } else {
            $this->Flash->error(__('The manufacture could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
