<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
/*use DateTime;
use DateTimeZone;*/

class NewsLetterHomeController extends AppBaseController
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index', ['groups' => Auth::guard('company')->user()->groups()->get()]);
    }

    /**
     * Get Analytic Status data from sendgrid
     */
    public function analytic(Request $request)
    {
        /*$start_date = new DateTime($request->start_date, new DateTimeZone('Pacific/Nauru'));
        $start_date = $start_date->format("Y-m-d H:i:s");
        $end_date = new DateTime($request->end_date, new DateTimeZone('Pacific/Nauru'));
        $end_date = $end_date->format("Y-m-d H:i:s");*/
        //dd('https://api.sendgrid.com/v3/messages?limit=10&query=last_event_time%20BETWEEN%20TIMESTAMP%20%'.$start_date.'%22%20AND%20TIMESTAMP%20%22'.$end_date.'%22');

        // Get sendgrid data via sendgrid 3rd party api using GuzzleHttp
        $client = new Client(['headers' => ['authorization' => 'Bearer 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']]);
        $res = $client->request('GET', 'http://api.sendgrid.com/v3/messages?limit=100&query=from_email%3D%22'.Auth::guard('company')->user()->email.'%22');
        $status_code =  $res->getStatusCode();

        // Manipulate data if it's successed to get data from sendgrid api
        if($status_code == 200)
        {
            $data = json_decode($res->getBody(), true);
            $delivered = 0;
            $opened = 0;
            $clicked = 0;

            foreach($data['messages'] as $message){
                if ($message['status'] == 'delivered')
                    $delivered++;
                $opened+= $message['opens_count'];
                $clicked+= $message['clicks_count'];
            }
            return view('company.dashboard.newsletter', ['messages' => $data, 'delivered' => $delivered, 'opened' => $opened, 'clicked' => $clicked]);
        } else
            return view('company.dashboard.newsletter', ['messages' => '']);

    }
}
