<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\User;

use Session;
use Sentinel;
use Validator;

class UserController extends Controller
{
    public function __construct(User $User)
    {
        $data               = [];
        $this->base_model   = $User; 
        $this->title        = "Users";
        $this->url_slug     = "user";
        $this->folder_path  = "admin/users/";
    }

    public function index()
    {
        $arr_data = [];
        $data     = $this->base_model->where('role','<>','admin')->get();

        if(!empty($data))
        {
            $arr_data = $data->toArray();
        }
        $login_user_details  = Session::get('user');
         //dd($login_user_details);
        if($login_user_details->role!='admin')
        {
            Session::flash('error', 'Unauthorized Access.');
            return \Redirect::to('admin/dashbord');
        }

        $data['data']      = $arr_data;
        $data['page_name'] = "Manage";
        $data['url_slug']  = $this->url_slug;
        $data['title']     = $this->title;
        return view($this->folder_path.'index',$data);
    }
 
    public function add()
    {
        $city_data = \DB::table('city')
                     ->orderBy('id','DESC')
                     ->groupBy('city')
                     ->get()->toArray();

        $data['page_name'] = "Add";
        $data['city']      = $city_data;
        $data['title']     = $this->title;
        $data['url_slug']  = $this->url_slug;
        return view($this->folder_path.'add',$data);
    }

    public function getArea(Request $request)
    {
        $city_name = $request->city;
        $location_data = \DB::table('locations')
                          ->where(['is_active'=>1,'city'=>$city_name])
                          ->orderBy('id','DESC')
                          ->get()->toArray();
        $html = "";
        $html = "<option value=''>-Select-</option>";
        foreach ($location_data as $key => $value) 
        {
          $html.="<option value=".$value->area.">".$value->area."</option>";                
        }                 
        return $html;
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'first_name' => 'required',
                'last_name'  => 'required',
                'email'      => 'required',
                'password'   => 'required',
                'city'       => 'required',
                'area'       => 'required'
            ]);

        if ($validator->fails()) 
        {
            return $validator->errors()->all();
        }
      
        $is_exist = $this->base_model->where(['email'=>$request->input('email')])->count();

        if($is_exist)
        {
            Session::flash('error', "Email already exist!");
            return \Redirect::back();
        }

        $arr_data                 = [];
        $arr_data['first_name']   = $request->input('first_name');
        $arr_data['last_name']    = $request->input('last_name');
        $arr_data['email']        = $request->input('email');
        $arr_data['password']     = bcrypt($request->input('password'));
        $arr_data['city']         = $request->input('city');
        $arr_data['area']         = $request->input('area');
        $arr_data['role']         = 'user';

        $user = $this->base_model->create($arr_data);
      
        if(!empty($user))
        {
            //it is use for user activator
            $arr_dat = []; 
            $arr_dat['user_id'] = $user->id; 
            $arr_dat['completed_at'] = 1; 
            $arr_dat['completed'] = 1;   
            $activations = \DB::table('activations')->insert($arr_dat);

            Session::flash('success', 'Success! Record added successfully.');
            return \Redirect::to('admin/manage_users');
        }
        else
        {
            Session::flash('error', "Error! Oop's something went wrong.");
            return \Redirect::back();
        }
    }

    public function edit($id)
    {
        $arr_data = [];
        $data     = $this->base_model->where(['id'=>$id])->first();

        if(!empty($data))
        {
            $arr_data = $data->toArray();
        }
        $city_data = \DB::table('city')->orderBy('id','DESC')->groupBy('city')->get()->toArray();
        
        $data['city']      = $city_data;
        $data['data']      = $arr_data;
        $data['page_name'] = "Edit";
        $data['url_slug']  = $this->url_slug;
        $data['title']     = $this->title;
        return view($this->folder_path.'edit',$data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                'category'     => 'required',
            ]);

        if ($validator->fails()) 
        {
            return $validator->errors()->all();
        }

        $is_exist = $this->base_model->where('id','<>',$id)->where(['category'=>$request->input('category')])->count();

        if($is_exist)
        {
            Session::flash('error', "Record already exist!");
            return \Redirect::back();
        }

        $arr_data               = [];
        $arr_data['category']     = $request->input('category');
        if(isset($_FILES["image"]["name"]) && !empty($_FILES["image"]["name"]))
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyz';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < 18; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
      
            $file_name                         = $_FILES["image"]["name"];
            $file_tmp                          = $_FILES["image"]["tmp_name"];
            $ext                               = pathinfo($file_name,PATHINFO_EXTENSION);
            $random_file_name                  = $randomString.'.'.$ext;
            $latest_image                   = 'upload/category_image/'.$random_file_name;

            if(move_uploaded_file($file_tmp,env('BASE_PATH').$latest_image))
            {
                $arr_data['category_image']      = $latest_image;
            }
        }   
        
        $category = $this->base_model->where(['id'=>$id])->update($arr_data);
            Session::flash('success', 'Success! Record update successfully.');
            return \Redirect::to('admin/manage_collection');
        /*if (!empty($category))
        {
        }
        else
        {
            Session::flash('error', "Error! Oop's something went wrong.");
            return \Redirect::back();
        }*/
    }

    public function delete($id)
    {
        $this->base_model->where(['id'=>$id])->delete();
        Session::flash('success', 'Success! Record deleted successfully.');
        return \Redirect::back();
    }
}
