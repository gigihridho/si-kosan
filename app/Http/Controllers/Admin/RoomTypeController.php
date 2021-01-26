<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RoomTypeRequest;
use App\RoomType;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;


class RoomTypeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified']);
    }
    public function index(){
        if(request()->ajax()){
            $query = RoomType::query();

            return Datatables::of($query)
                ->addIndexColumn()
                ->addColumn('action', function($data){
                    return '
                    <div class="btn-group">
                        <a class="btn btn-info edit" href="' . route('tipe.edit', $data->id) . '" >
                            Sunting
                        </a>
                        <form action="' . route('tipe.destroy', $data->id) . '" method="POST"  style="margin-left:10%">
                            ' . method_field('delete') . csrf_field() . '
                            <button type="submit" class="btn btn-danger">
                                Hapus
                            </button>
                        </form>
                    </div>';
                })
                ->editColumn('photo', function($data){
                    return $data->photo ? '<img src="'. Storage::url($data->photo).'" style="max-height: 30px;"/>' : '';
                })
                ->rawColumns(['action','photo'])
                ->make();
            }
        return view('pages.admin.tipe.index');
    }

    public function edit(){
        return view('pages.admin.tipe.edit');
    }
    // public function show(){
    //     //
    // }

    // public function update(){
    //     //
    // }
    public function create(){
        return view('pages.admin.tipe.create');
    }

    public function store(RoomTypeRequest $request){
        $data = $request->all();
        $data['name'] = $request->name;
        $data['photo'] = $request->file('photo')->store('assets/facility','public');
        $data['description'] = $request->description;
        $data['price'] = $request->price;
        $data['size'] = $request->size;

        RoomType::create($data);
        return redirect()->route('tipe.index');
    }

    public function destroy(){
        return view('pages.admin.tipe.index');
    }
}
