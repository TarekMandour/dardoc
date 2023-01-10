<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostGallery;
use App\Models\Offer;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostMonthResource;
use App\Http\Resources\OffersResource;

class ClientsController extends Controller
{

    public function category () {

        $results = Category::where('parent',0)->orderBy('id', 'asc')->paginate(6);

        $results = CategoryResource::collection($results)->response()->getData(true);

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $results]);

    }

    public function SubCategory (Request $request) {

        $results = Category::where('parent', $request->id)->orderBy('id', 'asc')->paginate(6);

        $results = CategoryResource::collection($results)->response()->getData(true);

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $results]);

    }

    public function CategoryPostsById (Request $request) {

        $results = Post::with('postgallery')->where('cat_id', $request->id)->orderBy('id', 'desc')->paginate(9);

        $results = PostResource::collection($results)->response()->getData(true);

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $results]);

    }

    public function CategoryPostsByMonth (Request $request) {

        $days = range(1, Carbon::now()->month($request->month)->daysInMonth) ;
        $results = NULL;

        foreach ($days as $key => $d) {
            $data = Post::with('postgallery')->where('cat_id', $request->id)->whereDate('created_at', date('Y').'-'.$request->month.'-'.$d)->orderBy('id', 'desc')->get();
            if ($data ->count() > 0) {
                $results[] = array(date('Y').'-'.$request->month.'-'.$d => $data ) ;
            }
        }
        
        // return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $results]);
        if (isset($results)) {
            $results = PostMonthResource::collection($results);
            return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $results]);
        } else {
            return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => NULL]);
        }


    }

    public function PostDetails (Request $request) {

        $results = Post::with('postgallery')->where('id', $request->id)->orderBy('id', 'desc')->get()->first();

        $data['id'] = $results->id;
        $data['title'] = $results->append_title;
        $data['content'] = $results->append_content;
        $data['main_photo'] = $results->photo;
        $data['cat_id'] = $results->cat_id;
        $data['created_at'] = $results->created_at;
        $data['photo_gallery'] = $results->postgallery;

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $data]);
    }

    public function offers () {

        $results = Offer::orderBy('id', 'desc')->paginate(9);

        $results = OffersResource::collection($results)->response()->getData(true);

        return response(['status' => 200, 'msg' => trans('lang.Successfully_done'), 'data' => $results]);

    }

}
