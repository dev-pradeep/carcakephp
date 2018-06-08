<?php
/**
 *      __  ___      ____  _     ___                           _                    __
 *     /  |/  /_  __/ / /_(_)___/ (_)___ ___  ___  ____  _____(_)___  ____   ____ _/ /
 *    / /|_/ / / / / / __/ / __  / / __ `__ \/ _ \/ __ \/ ___/ / __ \/ __ \ / __ `/ /
 *   / /  / / /_/ / / /_/ / /_/ / / / / / / /  __/ / / (__  ) / /_/ / / / // /_/ / /
 *  /_/  /_/\__,_/_/\__/_/\__,_/_/_/ /_/ /_/\___/_/ /_/____/_/\____/_/ /_(_)__,_/_/
 *
 *  @author Multidimension.al
 *  @copyright Copyright © 2016-2018 Multidimension.al - All Rights Reserved
 *  @license Proprietary and Confidential
 *
 *  NOTICE:  All information contained herein is, and remains the property of
 *  Multidimension.al and its suppliers, if any.  The intellectual and
 *  technical concepts contained herein are proprietary to Multidimension.al
 *  and its suppliers and may be covered by U.S. and Foreign Patents, patents in
 *  process, and are protected by trade secret or copyright law. Dissemination
 *  of this information or reproduction of this material is strictly forbidden
 *  unless prior written permission is obtained.
 */

namespace App\Controller;

use App\Controller\AppController;

/**
 * Transfers Controller
 *
 * @property \App\Model\Table\TransfersTable $Transfers
 *
 * @method \App\Model\Entity\Transfer[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TransfersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Users']
        ];
        $transfers = $this->paginate($this->Transfers);

        $this->set(compact('transfers'));
    }

    /**
     * View method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $transfer = $this->Transfers->get($id, [
            'contain' => ['Users']
        ]);

        $this->set('transfer', $transfer);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $transfer = $this->Transfers->newEntity();
        if ($this->request->is('post')) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->getData());
            if ($this->Transfers->save($transfer)) {
                $this->Flash->success(__('The transfer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer could not be saved. Please, try again.'));
        }
        $users = $this->Transfers->Users->find('list', ['limit' => 200]);
        $this->set(compact('transfer', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $transfer = $this->Transfers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $transfer = $this->Transfers->patchEntity($transfer, $this->request->getData());
            if ($this->Transfers->save($transfer)) {
                $this->Flash->success(__('The transfer has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The transfer could not be saved. Please, try again.'));
        }
        $users = $this->Transfers->Users->find('list', ['limit' => 200]);
        $this->set(compact('transfer', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Transfer id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $transfer = $this->Transfers->get($id);
        if ($this->Transfers->delete($transfer)) {
            $this->Flash->success(__('The transfer has been deleted.'));
        } else {
            $this->Flash->error(__('The transfer could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
