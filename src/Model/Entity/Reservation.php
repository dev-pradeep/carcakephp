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

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $user_id
 * @property int $vehicle_id
 * @property int $driver_id
 * @property \Cake\I18n\FrozenDate $start_date
 * @property \Cake\I18n\FrozenTime $start_time
 * @property \Cake\I18n\FrozenDate $end_date
 * @property \Cake\I18n\FrozenTime $end_time
 * @property float $daily_rate
 * @property int $rental_length
 * @property float $trip_price
 * @property float $delivery_fee
 * @property float $extension_fee
 * @property float $distance_reimbursement
 * @property float $gas_reimbursement
 * @property float $tickets_tolls
 * @property float $fines
 * @property float $additional_charges
 * @property float $reimbursement_total
 * @property float $trip_total
 * @property float $turo_fees
 * @property float $earnings
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Vehicle $vehicle
 * @property \App\Model\Entity\Driver $driver
 * @property \App\Model\Entity\Transaction[] $transactions
 */
class Reservation extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'user_id' => true,
        'vehicle_id' => true,
        'driver_id' => true,
        'start_date' => true,
        'start_time' => true,
        'end_date' => true,
        'end_time' => true,
        'daily_rate' => true,
        'rental_length' => true,
        'trip_price' => true,
        'delivery_fee' => true,
        'extension_fee' => true,
        'distance_reimbursement' => true,
        'gas_reimbursement' => true,
        'tickets_tolls' => true,
        'fines' => true,
        'additional_charges' => true,
        'reimbursement_total' => true,
        'trip_total' => true,
        'turo_fees' => true,
        'earnings' => true,
        'user' => true,
        'vehicle' => true,
        'driver' => true,
        'transactions' => true
    ];
}
