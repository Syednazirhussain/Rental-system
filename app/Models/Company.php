<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Faker\Factory as Faker;

/**
 * Class Company
 * @package App\Models\Admin
 * @version April 4, 2018, 1:25 pm UTC
 *
 * @property \App\Models\City city
 * @property \App\Models\Country country
 * @property \App\Models\State state
 * @property \App\Models\UserStatus userStatus
 * @property \Illuminate\Database\Eloquent\Collection CompanyBuilding
 * @property \Illuminate\Database\Eloquent\Collection CompanyContactPerson
 * @property \Illuminate\Database\Eloquent\Collection CompanyContract
 * @property \Illuminate\Database\Eloquent\Collection CompanyModule
 * @property \Illuminate\Database\Eloquent\Collection CompanyUser
 * @property string name
 * @property string second_name
 * @property string logo
 * @property string description
 * @property string address
 * @property string zipcode
 * @property string phone
 * @property integer country_id
 * @property integer state_id
 * @property integer city_id
 * @property string uuid
 * @property string user_role_code
 * @property boolean max_users
 * @property integer user_status_id
 */
class Company extends Model
{
    use SoftDeletes;

    public $table = 'companies';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'second_name',
        'logo',
        'description',
        'address',
        'zipcode',
        'phone',
        'country_id',
        'state_id',
        'city_id',
        'uuid',
        'user_role_code',
        'max_users',
        'user_status_id',
        'room_contract_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'second_name' => 'string',
        // 'logo' => 'string',
        'description' => 'string',
        'address' => 'string',
        'zipcode' => 'string',
        'phone' => 'string',
        'country_id' => 'integer',
        'state_id' => 'integer',
        'city_id' => 'integer',
        'uuid' => 'string',
        'user_role_code' => 'string',
        'max_users' => 'boolean',
        'user_status_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|between:3,100',
        'second_name' => 'string|nullable|max:100',
        'logo' => 'image',
        'description' => 'string|nullable',
        'address' => 'required|string|max:150',
        'zipcode' => 'required|string|between:3,20',
        'phone' => 'required|string|between:7,20',
        'country_id' => 'required|integer',
        'state_id' => 'required|integer',
        'city_id' => 'required|integer',
        // 'user_role_code' => 'required|string',
        'max_users' => 'integer',

    ];


    public static function boot()
    {
        $faker = Faker::create();
        parent::boot();
        self::creating(function ($model) use ($faker) {
            $model->uuid = $faker->uuid;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function state()
    {
        return $this->belongsTo(\App\Models\State::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function userStatus()
    {
        return $this->belongsTo(\App\Models\UserStatus::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyBuildings()
    {
        return $this->hasMany(\App\Models\CompanyBuilding::class, 'company_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyInvoices()
    {
        return $this->hasMany(\App\Models\CompanyInvoice::class, 'company_id', 'id');
    }



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyContactPeople()
    {
        return $this->hasMany(\App\Models\CompanyContactPerson::class);
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyFloorRoom()
    {
        return $this->hasMany(\App\Models\CompanyFloorRoom::class,'company_id','id');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companySingleContract()
    {
        return $this->hasOne(\App\Models\CompanyContract::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyContracts()
    {
        return $this->hasMany(\App\Models\CompanyContract::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyModules()
    {
        return $this->hasMany(\App\Models\CompanyModule::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function companyUsers()
    {
        return $this->hasMany(\App\Models\CompanyUser::class, 'company_id', 'id');
    }

}
