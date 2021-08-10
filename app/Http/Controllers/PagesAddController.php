<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use Validator;

class PagesAddController extends Controller
{
    public function execute(Request $request){

        if($request->isMethod('post')){
            $input = $request->except('_token');

            $messages = [
                'required' => 'Pole :attribute obyazatelno k zapolneniyu',
                'unique' => 'Pole :attribute obyazatelno bit unikalnim',
            ];

            $validator = Validator::make($input,[
               'name' => 'required|max:255',
               'alias' => 'required|unique:pages|max:255',
               'text' => 'required'
            ], $messages);
            if($validator->fails()){
                return redirect()->route('pageAdd')->withErrors($validator)->withInput();
            }
            if ($request->hasFile('images')){
            $file = $request->file('images');
            $input['images'] = $file->getClientOriginalName();
            $file->move(public_path().'/assets/img',$input['images']);
            }

            $page = new Page();
            $page->fill($input);
            if ($page->save()){
                return redirect('admin')->with('status','Stranitsa dobavlen');
            }

        }

        if(view()->exists('admin.pages_add')){
            $data = [
              'title' => 'Novaya stranitsa'
            ];
            return view('admin.pages_add',$data);
        }
        abort('404');
    }
}
