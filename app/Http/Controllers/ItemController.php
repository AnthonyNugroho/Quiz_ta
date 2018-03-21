<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ItemModel;
use DB;
use Exception;

class ItemController extends Controller
{
  protected $item;

    public function __construct(ItemModel $item)
    {
        $this->item = $item;
    }
    public function register(Request $request){
      $item = [
        "id_user" => $request->id_user,
        "name"    => $request->name,
        "price"   => $request->price,
        "stock"   => $request->stock
      ];

      try
      {
        $item = $this->item->create($item);
        return response('Created',201);
      }
      catch(Exception $ex)
      {
        return response('Failed',400);
      }
    }

    public function all()
    {
        $items = $this->item->all();
        return response()->json($items,200);
    }
}
