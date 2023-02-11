<?php

namespace domain\Medical;

// use Illuminate\Support\Facades\Auth;
use App\Models\MedicalDetail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class MedicalService
{
    protected $medical;

    public function __construct()
    {
        $this->medical = new MedicalDetail();
    }

    /**
     * All fine
     */
    public function all()
    {
        return $this->medical->orderBy('id', 'desc')->get();
    }

        /**
     * get fine
     */
    public function get($id)
    {
        return $this->medical->where('user_id',$id)->first();
    }
    /**
     * Create fine
     * @param  $request
     */
    public function store($request)
    {
        $data['birthday'] =  $request->birthday;
        $data['hight'] =  $request->hight;
        $data['weight'] =  $request->weight;
        $data['blood_pressure'] =  $request->blood_pressure;
        $data['em_address'] =  $request->em_address;
        $data['cholestreol'] =  $request->cholestreol;
        $data['blood_type'] =  $request->blood_type;
        $data['mr_status'] =  $request->mr_status;
        $data['em_name'] =  $request->em_name;
        $data['em_phone'] =  $request->em_phone;
        $data['user_id'] =  Auth::user()->id;
        $user=$this->get(Auth::user()->id);
        if ($user) {
            $this->medical->where('id', $user->id)
                ->update(array('birthday'=>$request->birthday,
                'hight'=>$request->hight,
                'weight'=>$request->weight,
                'blood_pressure'=>$request->blood_pressure,
                'em_address'=>$request->em_address,
                'cholestreol'=>$request->cholestreol,
                'blood_type'=>$request->blood_type,
                'em_name'=>$request->em_name,
                'em_phone'=>$request->em_phone,
                'em_phone'=>$request->em_phone,
                'mr_status'=>$request->mr_status));
        }
        $res=$this->medical->create($data);

    }


}
