<?php

namespace App\Repositories;

use App\Models\GeneralSetting;
use App\Models\City;
use App\Models\State;
use App\Models\Country;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GeneralSettingRepository
 * @package App\Repositories
 * @version April 4, 2018, 1:25 pm UTC
 *
 * @method Company findWithoutFail($id, $columns = ['*'])
 * @method Company find($id, $columns = ['*'])
 * @method Company first($columns = ['*'])
*/
class GeneralSettingRepository extends BaseRepository
{

    /**
     * Configure the Model
     **/
    public function model()
    {
        return GeneralSetting::class;
    }

    public function getVendorInfomation()
    {
    	return GeneralSetting::where('meta_key','vendor_info')->first();
    }

    public function getCompanyInvoiceVat()
    {
        return GeneralSetting::where('meta_key','25.00')->first();
    }


    public function getCityStateCountryName($cityid,$stateid,$countryid)
    {
    	$city_name = City::find($cityid)->name;
    	$state_name = State::find($stateid)->name;
    	$country_name = Country::find($countryid)->name;
    	return ['country' => $country_name,'city' => $city_name,'state' => $state_name];
    }


}
