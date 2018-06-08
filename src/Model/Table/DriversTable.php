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
 * Drivers Model
 *
 * @property \App\Model\Table\ReservationsTable|\Cake\ORM\Association\HasMany $Reservations
 *
 * @method \App\Model\Entity\Driver get($primaryKey, $options = [])
 * @method \App\Model\Entity\Driver newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Driver[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Driver|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Driver patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Driver[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Driver findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class DriversTable extends Table
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

        $this->setTable('drivers');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Reservations', [
            'foreignKey' => 'driver_id'
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
            ->scalar('profile_name')
            ->maxLength('profile_name', 255)
            ->allowEmpty('profile_name');

        $validator
            ->scalar('full_name')
            ->maxLength('full_name', 255)
            ->allowEmpty('full_name');

        $validator
            ->scalar('works')
            ->maxLength('works', 255)
            ->allowEmpty('works');

        $validator
            ->scalar('lives')
            ->maxLength('lives', 255)
            ->allowEmpty('lives');

        $validator
            ->scalar('school')
            ->maxLength('school', 255)
            ->allowEmpty('school');

        $validator
            ->scalar('joined')
            ->maxLength('joined', 255)
            ->allowEmpty('joined');

        $validator
            ->integer('num_of_trips')
            ->allowEmpty('num_of_trips');

        $validator
            ->integer('num_of_reviews')
            ->allowEmpty('num_of_reviews');

        $validator
            ->decimal('overall_rating')
            ->allowEmpty('overall_rating');

        $validator
            ->scalar('photo')
            ->maxLength('photo', 255)
            ->allowEmpty('photo');

        return $validator;
    }
}
