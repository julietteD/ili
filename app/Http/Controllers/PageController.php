<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class PageController extends Controller
{
    public function index($location_id = 0, $tag_id = 0, $view = 'list')
    {
       
        $activeTag = $tag_id;
        $tag = Tag::where('id', '=', $tag_id)->first();

        if($tag_id){ 
            $locations = $tag->locations()->latest()->filter()->get();
        }
        else{  $locations = Location::latest()->filter()->get();}

        if($location_id){ 
            $article = Location::where('slug', '=', $location_id)->first();
        }
        else{ 
            $location_id='welcome';   
            $article = Location::where('slug', '=', 'welcome')->first();
            
        }

        return view('welcome', ['locations' => $locations, 'view' => $view, 'tags' => Tag::get(), 'tag' => $tag, 'activeTag' => $activeTag , 'article' => $article]);
    }


   

}
