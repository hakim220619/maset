<?php

namespace App\Http\Controllers\General;

use App\Http\Controllers\Controller;
use App\Models\GeneralModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class GeneralController extends Controller
{
    function roleStructureView()
    {
        return view('content.general.role-Structure-View');
    }

    function roleStructureList()
    {
        $data = GeneralModel::GetListRoleStructure();
        return response()->json([
            'success' => true,
            'message' => 'Data',
            'data' => $data,
        ]);
    }
    function addRoleStructureProses(Request $request)
    {
        // dd($request->all());
        GeneralModel::ProsesAddRoleStructure($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Add Role Structure Successs',
        ]);
    }
    function updateRoleStructureProses(Request $request)
    {
        // dd($request->all());
        GeneralModel::ProsesUpdateRoleStructure($request);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Update Role Structure Successs',
        ]);
    }

    function deleteRoleStructureProses($id)
    {
        // dd($id);
        GeneralModel::ProsesDeletRoleStructure($id);
        // toast('', 'success');
        return response()->json([
            'success' => true,
            'message' => 'Delete Role Structure Successs',
        ]);
    }
}
