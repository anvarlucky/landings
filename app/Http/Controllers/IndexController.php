<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Service;
use App\Models\Portfolio;
use App\Models\People;
use DB;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    public function execute(Request $request){

        if ($request->isMethod('post'))
        {
           $data = $request->all();
            $result = Mail::send('site.email',['data' => $data],function($message) use($data){
                $mail_admin = env('MAIL_ADMIN');
                $message->from($data['email'],$data['name']);
                $message->to($mail_admin,'Mr.Admin')->subject('Question');
            });
            if($result)
            {
                return redirect()->route('home');
            }
        }

        $pages = Page::all();
        $portfolios = Portfolio::all();
        $services = Service::all();
        $peoples = People::take(3)->get();
        $tags = DB::table('portfolios')->select('filter')->distinct()->get();
        $menu = [];
        foreach($pages as $page)
        {
            $item = ['title' => $page->name, 'alias' => $page->alias];
            array_push($menu,$item);
        }
        $item = ['title' => 'Services', 'alias' => 'service'];
        array_push($menu,$item);
        $item = ['title' => 'Portfolio', 'alias' => 'Portfolio'];
        array_push($menu,$item);
        $item = ['title' => 'Team', 'alias' => 'team'];
        array_push($menu,$item);
        $item = ['title' => 'Contact', 'alias' => 'contact'];
        array_push($menu,$item);

        return view('site.index',[
            'menu' => $menu,
            'pages' => $pages,
            'services' => $services,
            'portfolios' => $portfolios,
            'peoples' => $peoples,
            'tags' => $tags
        ]);
    }
}
