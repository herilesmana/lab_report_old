<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\VariantProduct;
class VariantProductController extends Controller
{
    public function index()
    {
      return view('variant_product.index');
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
          if ($list->status == 'Y') $status = 'Aktif';
          else $status = 'Tidak aktif';
          $row[] = $status;
          $row[] = '<div class="btn-group">
                    <a onClick="editForm('.$list->mid.')" class="btn btn-primary btn-sm text-white"><i class="fa fa-pencil"></i></a>
                    <a onClick="deleteData('.$list->mid.')" class="btn btn-danger btn-sm text-white"><i class="fa fa-trash"></i></a>
                    </div>';
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
            'name' => 'required|max:255'
        ]);
        if($validator->passes()){
          $vp = new VariantProduct;
          $vp->mid = $request['mid'];
          $vp->name = $request['name'];
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
