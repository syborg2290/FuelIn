<?php

namespace domain\Police;

// use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\PoliceDetail;
use App\Models\PoliceUser;
use Illuminate\Support\Facades\Hash;
/**
 * Created by Vs COde.
 * Date: 05/07/2022
 * Time: 07:10 PM
 */
class PoliceService
{
    protected $police;
    protected $user;
    protected $police_men;

    public function __construct()
    {
        $this->user = new User();
        $this->police = new PoliceDetail();
        $this->police_men = new PoliceUser();
    }

    /**
     * All police
     */
    public function all()
    {
        return $this->police->orderBy('id', 'desc')->get();
    }

        /**
     * get police
     */
    public function get($id)
    {
        return $this->police->find($id);
    }
    /**
     * Create police
     * @param  $request
     */
    public function store($request)
    {
        $data['name'] =  $request->name;
        $data['password'] = Hash::make($request->password);
        $data['email'] =  $request['email'];
        $data['user_role'] =  1;
        $res=$this->user->create($data);

        $newdata['user_id']=$res->id;
        $newdata['province'] =  $request['province'];
        $newdata['district'] =  $request['district'];
        $newdata['division'] =  $request['division'];
        $newdata['address'] =  $request['address'];
        $newdata['phone'] =  $request['phone'];
        $pol=$this->police->create($newdata);

        $rescode='POL'.$pol->id.'#';
        $this->police->where('id', $pol->id)
        ->update(array('ref_number' => $rescode));
    }

    public function update($request)
    {

        $this->user->where('id', $request->user_id)
        ->update(array('name'=>$request->name));

        $this->police->where('id', $request->id)
        ->update(array('province'=>$request['province'],
                    'district'=>$request['district'],
                    'division'=>$request['division'],
                    'address'=>$request['address'],
                    'phone'=>$request['phone']
                ));
    }

    public function policeUserStore($request)
    {
        $newdata['name'] =  $request['name'];
        $newdata['nic'] =  $request['nic'];
        $newdata['address'] =  $request['address'];
        $newdata['mobile'] =  $request['mobile'];
        $pol=$this->police_men->create($newdata);

        $rescode='POL/'.$pol->id;
        $this->police_men->where('id', $pol->id)
        ->update(array('code' => $rescode));
    }

            /**
     * get policemen
     */
    public function getPolice($id)
    {
        return $this->police_men->find($id);
    }

        /**
     * All police
     */
    public function allPolice()
    {
        return $this->police_men->orderBy('id', 'desc')->get();
    }

    public function policeUserUpdate($request)
    {
        $this->police_men->where('id', $request->id)
        ->update(array('name'=>$request->name,'address'=>$request->address,'mobile'=>$request->mobile));
    }
}
