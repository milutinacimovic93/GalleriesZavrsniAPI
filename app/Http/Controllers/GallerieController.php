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
      $results = Gallerie::search($name)->orderBy('id','DESC')->with('images')->with('user')->with('comments');
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
        $data = $request->validated();
        $user = User::findOrFail($request['id']);
        $user_id = $user->id;
        $gallerie= Gallerie::create([
            "name"=>$data['name'],
            "description"=>$data['description'],
            'user_id' => $user_id
        ]);
        foreach($data['listOfSource'] as $source) {
            $gallerie->addImages($source, $gallerie['id']);
        }

        return response()->json($gallerie);
    }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function show($id){

    return Gallerie::with('photos')->with('user')->with('comments')->find($id);

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
    return Gallerie::find($id)->delete();
  }
}
