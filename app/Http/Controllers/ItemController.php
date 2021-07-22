<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Dotenv\Validator;
use GuzzleHttp\Psr7\Message;
use Illuminate\Support\MessageBag;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

class ItemController extends Controller
{

    public function welcome()
    {
        
        $items = Item::all();
        return view('welcome', compact('items'));
    }

    public function showAll()
    {
        return Item::all();
    }

    public function showOne(Request $request)
    {
        return Item::where('id', $request->id)->get();
        //return $request->name;
    }

    public function store(Request $request)
    {

        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        Item::create($request->all());
        $items = Item::all();

        $objDemo = new \stdClass();
        $objDemo->title = 'this is the title';
        $objDemo->body = 'this is the body';
        $objDemo->sender = 'mo.acedo@gmail.com';
        $objDemo->receiver = 'movilmacedo@gmail.com';
 
        //Mail::to("movilmacedo@gmail.com")->send(new DemoMail($objDemo));


        return view('welcome', compact('items')); 
    }

    public function update(Request $request)
    {

        
        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255'
        ]);

        
        $item = Item::find($request->id);
        $item->name = $request->name;
        $item->description = $request->description;
        $item->save();
        $items = Item::all();

        $objDemo = new \stdClass();
        $objDemo->title = 'this is the title';
        $objDemo->body = 'this is the body';
        $objDemo->sender = 'mo.acedo@gmail.com';
        $objDemo->receiver = 'movilmacedo@gmail.com';
 
        //Mail::to("movilmacedo@gmail.com")->send(new DemoMail($objDemo));

        return view('welcome', compact('items') );

        
    }

    public function delete(Request $request)
    {
        $deletedRows = Item::where('id', $request->id)->delete();
        $items = Item::all();

       
        
        

        return view('welcome', compact('items') );
    }
}
