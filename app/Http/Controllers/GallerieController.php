<?php

namespace App\Http\Controllers;
use App\Models\Gallerie;
use Illuminate\Http\Request;
use App\Http\Requests\CreateGalleryRequest;
use App\Models\User;

class GallerieController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index(Request $request)
  {
      $name = $request->query('name', '');
      $results = Gallerie::search($name)->orderBy('id','DESC')->with('images')->with('user');
      $galleries = $results->get();

      return response()->json($galleries);
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(CreateGalleryRequest $request)
    {
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id){

    $gallerie = Gallerie::findOrFail($id);
        $images = $gallerie->images;
        $user = $gallerie->user;
        $results= [
            'id' => $gallerie->id,
            'name'=>$gallerie->name,
            'description'=>$gallerie->description,
            'created_at'=>$gallerie->created_at,
            'updated_at'=>$gallerie->updated_at,
            'images'=>$images,
            'user'=>$user,
        ];

        return response()->json($results);

}

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function update()
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {

  }
}
