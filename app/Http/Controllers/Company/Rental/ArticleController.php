<?php

namespace App\Http\Controllers\Company\Rental;

use App\Models\Rental\CompanyArticle;
use App\Models\CompanyUser;
use App\Models\Rental\ArticleFinancial;
use App\Models\Rental\ArticlePrice;
use App\Models\Rental\ArticleStock;
use App\Repositories\RoomContractRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Auth;
use App\Models\Company;
use App\Models\CompanyBuilding;
use App\Models\CompanyFloorRoom;
use App\Models\Service;
use App\Models\Room;

class ArticleController extends AppBaseController
{
    /** @var  RoomRepository */
    private $roomContractRepository;

    public function __construct(RoomContractRepository $roomContractRepository)
    {
        $this->roomContractRepository = $roomContractRepository;
    }

    /**
     * Display a listing of the Room.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $articles = CompanyArticle::where('company_id', $company_id)->get();
        $companyBuildings = CompanyBuilding::where('company_id', $company_id)->get();
        $data = [
            'articles' => $articles,
            'buildings' => $companyBuildings,

        ];

        return view('company.rental.articles.index', $data);
    }

    /**
     * Show the form for creating a new Room.
     *
     * @return Response
     */
    public function create()
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $companyBuildings = CompanyBuilding::where('company_id', $company_id)->get();
        $companyFloors = CompanyFloorRoom::where('company_id', $company_id)->get();
        $rooms = Room::where('company_id', $company_id)->get();

        $data = [
            'company_id' => $company_id,
            'buildings' => $companyBuildings,
            'floors' => $companyFloors,
            'rooms' => $rooms,
        ];

        return view('company.rental.articles.create', $data);
    }

    /**
     * Store a newly created Room in storage.
     *
     * @param CreateRoomRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->except('_token');

        /*echo "<pre>";
        print_r($input);
        echo "</pre>";*/

        $article = CompanyArticle::create($input);

        return response()->json(['success'=> 1, 'msg'=>'Company Article has been created successfully', 'article'=>$article]);
    }


    /**
     * Display the specified Room.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified Room.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        $companyBuildings = CompanyBuilding::where('company_id', $company_id)->get();
        $article = CompanyArticle::find($id);
        $price = ArticlePrice::where('article_id', $id)->first();
        $stock = ArticleStock::where('article_id', $id)->first();
        $financial = ArticleFinancial::where('article_id', $id)->first();
        $building_name = CompanyBuilding::find($article->building)->name;

        $data = [
            'company_id' => $company_id,
            'buildings' => $companyBuildings,
            'article' => $article,
            'stock' => $stock,
            'price' => $price,
            'financial' => $financial,
            'building_name' => $building_name,
        ];

        //dd($article);
        return view('company.rental.articles.edit', $data);
    }

    /**
     * Update the specified Room in storage.
     *
     * @param  int              $id
     * @param UpdateRoomRequest $request
     *
     * @return Response
     */
    public function update($id, Request $request)
    {
        $input = $request->except('_token');

        $article = CompanyArticle::find($id);
        if(empty($article)) {
            $success = 0;
            $msg = "Article not found";
        }else {
            /*echo "<pre>";
            print_r($input);
            echo "</pre>";*/
            $article = CompanyArticle::whereId($id)->update($input);
            $success = 1;
            $msg = "Company Article has been updated successfully";
        }

        return response()->json(['success'=>$success, 'msg'=>$msg, 'article'=>$article]);
    }

    /**
     * Remove the specified Room from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id, Request $request)
    {
        return redirect(route('company.contracts.index'));
    }

    /**
     * Articles Normal Search by ID, Name
     */
    public function normal_search(Request $request)
    {
        $input = $request->all();
        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        if($input['data'] !== '') {
            $articles = CompanyArticle::where('company_id', $company_id)
                ->where(function($q) use($input){
                    $q->where('id', $input['data'])
                        ->orWhere('article_name_swedish', 'like', '%'.$input['data'].'%')
                        ->orWhere('article_name_english', 'like', '%'.$input['data'].'%');
                })->get();
        } else {
            $articles = CompanyArticle::where('company_id', $company_id)->get();
        }

        $data = [
            'company_id' => $company_id,
            'articles' => $articles,
        ];

        return response()->json(['success'=>1, 'msg'=>'', 'data'=>$data]);
    }


    /**
     * Articles Normal Search by building, floor
     */
    public function advance_search(Request $request)
    {
        $input = $request->all();

        $company_id = Auth::guard('company')->user()->companyUser()->first()->company_id;
        if($input['building'] !== '') {
            $articles = CompanyArticle::where('company_id', $company_id)
                ->where('building', $input['building'])
                ->get();
        } else {
            $articles = CompanyArticle::where('company_id', $company_id)->get();
        }

        $data = [
            'company_id' => $company_id,
            'articles' => $articles,
        ];

        return response()->json(['success'=>1, 'msg'=>'', 'data'=>$data]);
    }
}
