<?php

namespace App\Http\Controllers\Admin\Item;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ItemsRequest;
use App\Http\Resources\ItemResource;
use App\Models\Item;

class ItemsController extends Controller
{
    public function index(Request $request){
        

        $items = Item::get();

        // $item = ItemResource::collection($items);
            
        return view('admin.items')->with('data',$items);
    }

    public function store(ItemsRequest $request){
        $item = Item::createItem($request);

        // return new ItemResource($item);
        // View::make('blog')->with('posts', $posts);
        return view('admin.items')->with('item', $item);
        // return new ItemResource($item);
        // echo $request->header();
        // print_r($request->header());
    }
}
