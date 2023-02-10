<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class PageController extends Controller
{
    public function index()
    {
        $locations = Location::latest()->filter()->get();
        return view('welcome', ['locations' => $locations,  'tags' => Tag::get() ]);
    }

    

    public function detail($id)
    {
        $locations = Location::latest()->filter()->get();
        $article = Location::where('id', '=', $id)->first();
        return view('welcome', ['locations' => $locations, 'article' => $article,  'tags' => Tag::get() ]);
    }

    public function tags($id)
    {
    
        $tag = Tag::where('id', '=', $id)->first();
        $locations = $tag->locations()->get();
        return view('welcome', ['locations' => $locations, 'tags' => Tag::get(), 'tag' => $tag ]);
    }

}
