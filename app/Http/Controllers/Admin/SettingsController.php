<?php

namespace App\Http\Controllers\Admin;


use App\Repositories\CityRepository;
use App\Repositories\StateRepository;
use App\Repositories\CountryRepository;
use App\Repositories\GeneralSettingRepository;


use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class SettingsController extends AppBaseController
{
    /** @var  UserStatusRepository */


    public function __construct(
        CountryRepository $CountryRepository,
        StateRepository $StateRepository,
        CityRepository $CityRepository,
        GeneralSettingRepository $GeneralSettingRepository
    )
    {
        $this->countryRepository        = $CountryRepository;
        $this->stateRepository          = $StateRepository;
        $this->cityRepository           = $CityRepository;
        $this->generalSettingRepository = $GeneralSettingRepository;
    }


    public function generalSetting()
    {
        $general_setting = $this->generalSettingRepository->getVendorInfomation();
        $companyInvoiceVat = $this->generalSettingRepository->getCompanyInvoiceVat();

        $object = json_decode($general_setting->meta_value);
        $state_id = $object->state_id;
        $city_id = $object->city_id;
       
        // If we want to get city or state name
        // $state_name = $this->stateRepository->findWithoutFail($state_id)->name;
        // $city_name  = $this->cityRepository->findWithoutFail($city_id)->name;
       
        $country  = $this->countryRepository->all();
        $states   = $this->stateRepository->all();
        $city     = $this->cityRepository->all();  

       /* $a = json_decode($companyInvoiceVat->meta_value);
        echo $a->*/


        $data = [
            'country'            => $country,
            'state'              => $states,
            'city'               => $city,
            'state_id'           => $state_id,
            'city_id'            => $city_id,   
            'general_setting'    => json_decode($general_setting->meta_value),
            'companyInvoiceVat'  => $companyInvoiceVat->meta_value,    
        ];

        return view('admin.admin_general.index',compact('data'));
    }

    public function addOrUpdate(Request $request)
    {
        // return $request->all();
        $jsonArr = [
            'title'      =>  $request->title,
            'zip_code'   =>  $request->zip_code,
            'address'    =>  $request->address,
            'country_id' =>  $request->Country,
            'state_id'   =>  $request->State,
            'city_id'    =>  $request->city_id,
            'phone'      =>  $request->phone,
            'due_day'    =>  $request->due_day     
        ];
  
        $vat = $request->tax;

        $general_settings = $this->generalSettingRepository->getVendorInfomation();
        $companyInvoiceVat = $this->generalSettingRepository->getCompanyInvoiceVat();

        $general_settings->meta_value = json_encode($jsonArr);
        $companyInvoiceVat->meta_value = $vat;

        if($general_settings->save() && $companyInvoiceVat->save()) 
        {

            $request->session()->flash('msg.success', 'General settings have been updated successfully');

        }
        else
        {
            $request->session()->flash('msg.success', 'There is some problem while commit on changes');

        }

        return redirect()->route('admin.settings.general');

        
    }

}
