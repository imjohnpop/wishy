<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Wishes;

class EncourageController extends Controller
{
    //
    public function post()
    {
        
    }

    public function wish($id)
    {
        $wish = Wishes::where('id', $id)->get();
        $encouragements = $wish[0]->value('nr_encouragements');
        $encouragements++;
        $wish[0]->update('nr_encouragements', $encouragements); 
        $wish[0]->save();
    }

    public function goal()
    {
        
    }
}
