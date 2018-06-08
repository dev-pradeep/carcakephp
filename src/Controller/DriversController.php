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
 * Drivers Controller
 *
 * @property \App\Model\Table\DriversTable $Drivers
 *
 * @method \App\Model\Entity\Driver[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DriversController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $drivers = $this->paginate($this->Drivers);

        $this->set(compact('drivers'));
    }

    /**
     * View method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|void
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => ['Reservations']
        ]);

        $this->set('driver', $driver);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $driver = $this->Drivers->newEntity();
        if ($this->request->is('post')) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('The driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The driver could not be saved. Please, try again.'));
        }
        $this->set(compact('driver'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $driver = $this->Drivers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $driver = $this->Drivers->patchEntity($driver, $this->request->getData());
            if ($this->Drivers->save($driver)) {
                $this->Flash->success(__('The driver has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The driver could not be saved. Please, try again.'));
        }
        $this->set(compact('driver'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Driver id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $driver = $this->Drivers->get($id);
        if ($this->Drivers->delete($driver)) {
            $this->Flash->success(__('The driver has been deleted.'));
        } else {
            $this->Flash->error(__('The driver could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
