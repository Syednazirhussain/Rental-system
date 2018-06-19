<?php

namespace App\Repositories;

use App\Models\ConferenceBookingItem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ConferenceBookingItemRepository
 * @package App\Repositories
 * @version April 23, 2018, 8:19 am UTC
 *
 * @method ConferenceBookingItem findWithoutFail($id, $columns = ['*'])
 * @method ConferenceBookingItem find($id, $columns = ['*'])
 * @method ConferenceBookingItem first($columns = ['*'])
*/
class ConferenceBookingItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'booking_id',
        'entity_id',
        'entity_type',
        'entity_name',
        'entity_price',
        'entity_qty'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ConferenceBookingItem::class;
    }

    public function getBookingPackagesItems($id)
    {
  
        return ConferenceBookingItem::where('booking_id', $id)->where('entity_type', 'package')->orderBy('id', 'asc')->get();
    }


    public function getBookingEquipmentsItems($id)
    {
        return ConferenceBookingItem::where('booking_id', $id)->where('entity_type', 'equipments')->orderBy('id', 'asc')->get();
    }


    public function getBookingFoodsItems($id)
    {
        return ConferenceBookingItem::where('booking_id', $id)->where('entity_type', 'food')->orderBy('id', 'asc')->get();
    }

    public function deleteBookingPackages($packageArr)
    {
        return ConferenceBookingItem::destroy($packageArr);
    }

    public function deleteBookingFood($foodArr)
    {
        return ConferenceBookingItem::destroy($foodArr);
    }


    public function deleteBookingEqupment($equipmentArr)
    {
        return ConferenceBookingItem::destroy($equipmentArr);
    }


}
