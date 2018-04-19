<?php

namespace App\Repositories;

use App\Model\CompanyInvoiceItem;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CompanyInvoiceRepository
 * @package App\Repositories\Admin
 * @version April 16, 2018, 3:18 pm UTC
 *
 * @method CompanyInvoice findWithoutFail($id, $columns = ['*'])
 * @method CompanyInvoice find($id, $columns = ['*'])
 * @method CompanyInvoice first($columns = ['*'])
*/
class CompanyInvoiceItemRepository extends BaseRepository
{
    /**
     * @var array
     */
    

    /**
     * Configure the Model
     **/
    public function model()
    {
        return CompanyInvoiceItem::class;
    }

    
}
