<?php

namespace domain\Fine;

// use Illuminate\Support\Facades\Auth;
use App\Models\Fine;
use App\Models\UserFine;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use domain\Facades\UserFacade;
/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class FineService
{
    protected $fine;
    protected $user_fine;

    public function __construct()
    {
        $this->fine = new Fine();
        $this->user_fine = new UserFine();
    }

    /**
     * All fine
     */
    public function all()
    {
        return $this->fine->orderBy('id', 'desc')->get();
    }

        /**
     * get fine
     */
    public function get($id)
    {
        return $this->fine->find($id);
    }
    /**
     * Create fine
     * @param  $request
     */
    public function store($request)
    {
        $data['act'] =  $request->act;
        $data['offence'] =  $request->offence;
        $data['amount'] =  $request->amount;
        $res=$this->fine->create($data);

    }

    public function update($request)
    {
        $this->fine->where('id', $request->id)
        ->update(array('offence'=>$request->offence,'act'=>$request->act,'amount'=>$request->amount));
    }

    /**
     * Create user fine
     * @param  $request
     */
    public function storeUserFine($request)
    {
        $user=UserFacade::getUser($request->licence_number);
        if ($user) {
            $data['licence_number'] =  $request->licence_number;
            $data['fine_id'] =  $request->fine_id;
            $data['police_id'] =  Auth::user()->id;
            $data['police_user_id'] =  $request->police_id;
            $data['date'] =  $request->date;

            $data['user_id'] =  $user->id;

            $fine=$this->get($request->fine_id);

            $data['amount'] =  $fine->amount;
            $endMonth = Carbon::parse($request->date)->addMonth(1)->format('Y-m-d');
            $data['expire_date'] =  $endMonth;
            $res=$this->user_fine->create($data);
            return 1;
        }return 0;



    }

    /**
     * All fine
     */
    public function allUserFines()
    {
        return $this->user_fine->where('police_id', Auth::user()->id)->orderBy('id', 'desc')->get();
    }


    /**
     * All fine
     */
    public function getUserFines($licence)
    {
        return $this->user_fine->where('licence_number', $licence)->orderBy('id', 'desc')->get();
    }
         /**
     * get fine
     */
    public function getUserFine($id)
    {
        return $this->user_fine->find($id);
    }

    public function updateUserFine($request)
    {

        $fine=$this->get($request->fine_id);
        $endMonth = Carbon::parse($request->date)->addMonth(1)->format('Y-m-d');

        $this->user_fine->where('id', $request->id)
        ->update(array('licence_number'=>$request['licence_number'],
                    'police_user_id'=>$request['police_id'],
                    'amount'=>$fine->amount,
                    'date'=>$request['date'],
                    'expire_date'=>$endMonth,
                    'fine_id'=>$request['fine_id']
                ));
    }

    public function payment($request)
    {
        $this->user_fine->where('id', $request->id)
        ->update(array('status'=>1));
    }
}
