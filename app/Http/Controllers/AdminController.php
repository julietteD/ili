<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Str;
use Response;
use Cache;
use DB;

class AdminController extends Controller
{
  /* LOCATIONS */
  public function locations()
  {
      $locations = Location::paginate(15);
      return view('admin.locations', ['locations' => $locations]);
  }
  
  
    public function editLocation($id = null)
  {
      $location = Location::where('id', $id )->first();

      return view('admin.locations.edit', ['location' => $location]);
  }
  
  public function deleteLocation( $id = null)
  {
      $location = Location::where('id', $id )->first();

      if ($location) {
          $location->delete();
      }
     
      Cache::flush();
      return redirect()->route('admin.locations');
  }

  public function deleteTags( $id = null)
  {
      $tag = Tag::where('id', $id )->first();

      if ($tag && $tag->locations->count()==0) {
         $tag->delete();
         Cache::flush();
         return 'ok';
      }
      else{
        return 'not ok';
      }
     
     
  }

  public function deleteAllTags( )
  {
    $tags = Tag::all();
    foreach($tags as $tag){
    

      if ($tag && $tag->locations->count()==0) {
         $tag->delete();
         Cache::flush();
        
      }
    
    }
    return 'done';
     
    
     
  }
  
  public function editLocationAction(Request $request)
  {
      
      $newId = $request->input('id');
      $location = false;
      if ($newId) {
          $location = Location::where('id', $newId)->first();
      }
      if (!$location) {
          $location = new Location();
      }
      
      /*$deletePicture = $request->input('deletepict');
      if($deletePicture=='oui'){$new->banner =''; }
      else{ 
          $banner = $request->file('banner');
          if ($banner) {
              $pictName=md5(time());
               Image::make($banner->getRealPath())->fit(1000, 400)->save(public_path('img/news/'.$pictName.'_banner.jpg'));
              $imagePath =  $pictName.'_banner.jpg';
              $new->banner = $imagePath;
          }
      }
      
          


      $thumb = $request->file('thumb');
      if ($thumb) {
          $pictName=md5(time());
           Image::make($thumb->getRealPath())->fit(800, 600)->save(public_path('img/news/'.$pictName.'thumb.jpg'));
           Image::make($thumb->getRealPath())->fit(650, 700)->save(public_path('img/news/'.$pictName.'hg.jpg'));

           $imagePath =  $pictName.'thumb.jpg';
           $imagePathhg =  $pictName.'hg.jpg';

          $new->thumb = $imagePath;
          $new->thumbhg = $imagePathhg;
      }*/
      
      $location->name = $request->input('name'); 
      $location->description = $request->input('description');    
      $location->saveTags($request->input('tags'));
      $location->slug = Str::slug($request->input('name'));


      $location->save();


      Cache::flush();
      return redirect()->route('admin.locations');
  }
  

}
