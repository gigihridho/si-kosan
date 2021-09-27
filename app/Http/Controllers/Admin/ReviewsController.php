<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Review;
use RealRashid\SweetAlert\Facades\Alert;

class ReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index(){
        $reviews = Review::with('user')->get();
        return view('pages.admin.reviews.index',[
            'reviews' => $reviews
        ]);
    }

    public function destroy($id){
        $item = Review::findOrFail($id);
        $item->delete();

        Alert::success('SUCCESS','Data berhasil dihapus!');
        return redirect()->route('reviews.index');
    }
}
