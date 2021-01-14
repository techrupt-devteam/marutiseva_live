<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Model\Permission;
use App\Model\Module;
use App\Model\ModuleType;
use App\Model\Role;
use Session;
use Sentinel;
use Validator;
use DB;
class PermissionController extends Controller
{
    public function __construct(Permission $Permission,Module $Module,ModuleType $moduletype,Role $Role)
    {
        $data               = [];
        $this->base_model   = $Permission; 
        $this->module       = $Module; 
        $this->moduletype   = $moduletype; 
        $this->role         = $Role; 
        $this->title        = "Permission";
        $this->url_slug     = "permission";
        $this->folder_path  = "admin/permission/";
    }

    public function index()
    {
        $arr_data = [];
        $data     = $this->base_model->get();
        if(!empty($data))
        {
            $arr_data = $data->toArray();
        }
        $data['data']      = $arr_data;
        $data['page_name'] = "Manage";
        $data['url_slug']  = $this->url_slug;
        $data['title']     = $this->title;
        return view($this->folder_path.'index',$data);
    }
 
    public function add()
    {
        $type = $this->moduletype->get();
        $role = $this->role->get();
        $data['page_name'] = "Add";
        $data['type']      = $type;
        $data['role']      = $role;
        $data['title']     = $this->title;
        $data['url_slug']  = $this->url_slug;
        return view($this->folder_path.'add',$data);
    }
    
    public function get_menu(Request $request)
    {
       $type_id = $request->type_id;
       $menu_list = $this->module->where(['type_id'=>$type_id])->get();
       dd($menu_list);     
    }



    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
                'module_name' => 'required',
                'type_id'  => 'required'
            ]);

        if ($validator->fails()) 
        {
            return $validator->errors()->all();
        }
      
        $is_exist = $this->base_model->where(['module_name'=>$request->input('module_name'),'type_id'=>$request->input('type_id')])->count();

        if($is_exist)
        {
            Session::flash('error', "module already exist!");
            return \Redirect::back();
        }

        $arr_data                 = [];
        $arr_data['module_name']   = $request->input('module_name');
        $arr_data['type_id']    = $request->input('type_id');
        $user = $this->base_model->create($arr_data);
      
        if(!empty($user))
        {
            Session::flash('success', 'Success! Record added successfully.');
            return \Redirect::to('admin/manage_module');
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
        $data     = $this->base_model->where(['module_id'=>$id])->first();
        if(!empty($data))
        {
            $arr_data = $data->toArray();
        }

        $type = $this->moduletype->get();        
        $data['type']      = $type;
        $data['data']      = $arr_data;
        $data['page_name'] = "Edit";
        $data['url_slug']  = $this->url_slug;
        $data['title']     = $this->title;
        return view($this->folder_path.'edit',$data);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
                'module_name' => 'required',
                'type_id'  => 'required'
            ]);
        if ($validator->fails()) 
        {
            return $validator->errors()->all();
        }
        $is_exist = $this->base_model->where('module_id','<>',$id)->where(['module_name'=>$request->input('module_name'),'type_id'=>$request->input('type_id')])
                    ->count();
        if($is_exist)
        {
            Session::flash('error', "Record already exist!");
            return \Redirect::back();
        }
        $arr_data               = [];
        $arr_data['module_name']   = $request->input('module_name');
        $arr_data['type_id']    = $request->input('type_id');
        $module_update = $this->base_model->where(['module_id'=>$id])->update($arr_data);
        Session::flash('success', 'Success! Record update successfully.');
        return \Redirect::to('admin/manage_module');
        
    }

    public function delete($id)
    {
        $this->base_model->where(['module_id'=>$id])->delete();
        Session::flash('success', 'Success! Record deleted successfully.');
        return \Redirect::back();
    }
}
