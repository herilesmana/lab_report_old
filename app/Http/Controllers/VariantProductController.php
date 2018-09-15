<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\VariantProduct;
class VariantProductController extends Controller
{
    var $permissions = [];
    public function set_permissions()
    {
      // query untuk mendapatkan semua permission berdasarkan auth id milik user.
        $get_permissions = DB::table('auth_permission')
                          ->join('auth_group_permission', 'auth_permission.id', '=', 'auth_group_permission.permission_id')
                          ->join('auth_group', 'auth_group.id', '=', 'auth_group_permission.group_id')
                          ->select('auth_permission.codename as codename')
                          ->where('auth_group.id','=', Auth::user()->group_id)
                          ->get();
        foreach ($get_permissions as $permission) {
            array_push($this->permissions, $permission->codename);
        }
    }
    public function index()
    {
      $this->set_permissions();
      return view('variant_product.index', ['permissions' => $this->permissions]);
    }

    public function listData()
    {
        $vp = VariantProduct::orderBy('name', 'asc')->get();
        $no = 0;
        $data = array();
        foreach ($vp as $list) {
          $no++;
          $row = array();
          $row[] = $no;
          $row[] = $list->mid;
          $row[] = $list->name;
          $row[] = $list->jenis;
          if ($list->status == 'Y') $status = 'Aktif';
          else $status = 'Tidak aktif';
          $row[] = $status;
          $row[] = "<div class=\"btn-group\">
                    <a onClick=\"editForm('".$list->mid."')\" class=\"btn btn-primary btn-sm text-white\"><i class=\"fa fa-pencil\"></i></a>
                    <!-- <a onClick=\"deleteData('".$list->mid."')\" class=\"btn btn-danger btn-sm text-white\"><i class=\"fa fa-trash\"></i></a> -->
                    </div>";
          $data[] = $row;
        }
        $output = array("data" => $data);
        return response()->json($output);
    }
    public function store(Request $request)
    {
        if ($request['status']) $status = 'Y';
        else $status = 'N';

        $validator = Validator::make($request->all(), [
            'mid' => 'required|max:20|unique:m_variant_product',
            'name' => 'required|max:255',
            'jenis' => 'required|max:255'
        ]);
        if($validator->passes()){
          $vp = new VariantProduct;
          $vp->mid = $request['mid'];
          $vp->name = $request['name'];
          $vp->jenis = $request['jenis'];
          $vp->status = $status;
          $vp->created_by = '25749';
          $vp->updated_by = '25749';
          $vp->save();
          return response()->json(['success' => '1', 'action' => 'created']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }

    }

    public function edit($id)
    {
        $vp = VariantProduct::find($id);
        echo json_encode($vp);
    }

    public function update(Request $request, $id)
    {
        if ($request['status']) $status = 'Y';
        else $status = 'N';
        $validator = Validator::make($request->all(), [
            'mid' => 'required|max:20',
            'name' => 'required|max:255'
        ]);
        if($validator->passes()){
          $vp = VariantProduct::find($id);
          $vp->name = $request['name'];
          $vp->status = $status;
          $vp->jenis = $request['jenis'];
          $vp->updated_by = '25749';
          $vp->update();
          return response()->json(['success' => '1', 'action' => 'updated']);
        }else{
          return response()->json(['success' => '0','errors' => $validator->errors()]);
        }
    }

    public function status($status, $id)
    {
        $vp = VariantProduct::find($id);
        $vp->status = $status;
        $vp->update();
    }

    public function destroy($id)
    {
      $vp = VariantProduct::find($id);
      if($vp->delete())
        return response()->json(['action' => 'deleted']);

    }
}
