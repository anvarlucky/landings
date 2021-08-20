<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;
class PagesEditController extends Controller
{
    public function execute(Page $page,Request $request) //vnedrenie zavisimost
    {
        //$page = Page::find($id);
        $old = $page->toArray();
        if (view()->exists('admin.pages_edit')){
            $data = [
                'title' => 'Redaktirovanie stranitsi - '.$old['name'],
                'data'  => $old
            ];
            return view('admin.pages_edit',$data);
        }
    }
}
