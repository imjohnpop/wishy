<?php

namespace App\Http\Controllers;

use App\Wishes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishController extends Controller
{
    public function store(Request $request)
    {
        if(request()->input('is_public') == 'on'){
            $public = 1;
        } else {
            $public = 0;
        }

        $wish = new Wishes();
        $wish->fill([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_public' => $public,
            'user_id' => Auth::user()->id,
            'wish_picture' => $request->file('wish_picture')->storeAs('wishPictures', $request->input('description').Auth::user()->id.'.jpg', 'uploads'),
        ]);
        $wish->save();


        return redirect()->action('ProfileController@index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $wish = Wishes::find($id);

        if(request()->input('is_public') == 'on'){
            $public = 1;
        } else {
            $public = 0;
        }

        $wish->fill([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'is_public' => $public,
        ]);

        if($request->file('wish_picture')) {
            $wish->wish_picture =$request->file('wish_picture')->storeAs('wishPictures', $request->input('description').Auth::user()->id.'.jpg', 'uploads');
        };

        $wish->save();

        return redirect()->action('ProfileController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $wish = Wishes::findOrfail($id);

        $wish->delete();

        return redirect()->action('ProfileController@index');
    }
}
