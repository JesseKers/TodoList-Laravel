<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\listItem;


class TodoListController extends Controller
{
    public function index() {
        return view('welcome', ['listItem' => listItem::where('is_complete', 0)->get()]);
    }
    public function complete($id) {
        $listItem = listItem::find($id);
        $listItem->is_complete = 1; 
        $listItem->save();
        return redirect('/');
     }
    public function saveItem(Request $request) {

        $newListItem = new listItem;
        $newListItem->name = $request->listItem;
        $newListItem->is_complete = 0;
        $newListItem->save();
        
        return redirect('/');
    }
}
