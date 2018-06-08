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

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Reservations Model
 *
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\VehiclesTable|\Cake\ORM\Association\BelongsTo $Vehicles
 * @property \App\Model\Table\DriversTable|\Cake\ORM\Association\BelongsTo $Drivers
 * @property \App\Model\Table\TransactionsTable|\Cake\ORM\Association\HasMany $Transactions
 *
 * @method \App\Model\Entity\Reservation get($primaryKey, $options = [])
 * @method \App\Model\Entity\Reservation newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Reservation[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Reservation|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Reservation patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Reservation findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ReservationsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('reservations');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Vehicles', [
            'foreignKey' => 'vehicle_id'
        ]);
        $this->belongsTo('Drivers', [
            'foreignKey' => 'driver_id'
        ]);
        $this->hasMany('Transactions', [
            'foreignKey' => 'reservation_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->date('start_date')
            ->allowEmpty('start_date');

        $validator
            ->time('start_time')
            ->allowEmpty('start_time');

        $validator
            ->date('end_date')
            ->allowEmpty('end_date');

        $validator
            ->time('end_time')
            ->allowEmpty('end_time');

        $validator
            ->decimal('daily_rate')
            ->allowEmpty('daily_rate');

        $validator
            ->integer('rental_length')
            ->allowEmpty('rental_length');

        $validator
            ->decimal('trip_price')
            ->allowEmpty('trip_price');

        $validator
            ->decimal('delivery_fee')
            ->allowEmpty('delivery_fee');

        $validator
            ->decimal('extension_fee')
            ->allowEmpty('extension_fee');

        $validator
            ->decimal('distance_reimbursement')
            ->allowEmpty('distance_reimbursement');

        $validator
            ->decimal('gas_reimbursement')
            ->allowEmpty('gas_reimbursement');

        $validator
            ->decimal('tickets_tolls')
            ->allowEmpty('tickets_tolls');

        $validator
            ->decimal('fines')
            ->allowEmpty('fines');

        $validator
            ->decimal('additional_charges')
            ->allowEmpty('additional_charges');

        $validator
            ->decimal('reimbursement_total')
            ->allowEmpty('reimbursement_total');

        $validator
            ->decimal('trip_total')
            ->allowEmpty('trip_total');

        $validator
            ->decimal('turo_fees')
            ->allowEmpty('turo_fees');

        $validator
            ->decimal('earnings')
            ->allowEmpty('earnings');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['user_id'], 'Users'));
        $rules->add($rules->existsIn(['vehicle_id'], 'Vehicles'));
        $rules->add($rules->existsIn(['driver_id'], 'Drivers'));

        return $rules;
    }
}
