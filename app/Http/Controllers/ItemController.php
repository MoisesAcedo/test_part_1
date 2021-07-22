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

    //welcome method load on view load
    public function welcome()
    {
        
        //items contains all the records to be used in the view
        $items = Item::all();
        return view('welcome', compact('items'));
    }

    //this method show on a table all items
    public function showAll()
    {
        return Item::all();
    }

    //this method show id item object format
    public function showOne(Request $request)
    {
        return Item::where('id', $request->id)->get();
        
    }

    //this method save a new item
    public function store(Request $request)
    {

        //Validate that the field is not left empty and does not exceed 255 characters
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
 
        //Configure Email server before uncommenting the following line
        //Mail::to("demo@gmail.com")->send(new DemoMail($objDemo));


        return view('welcome', compact('items')); 
    }

    //this method update an item
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
 
        //Configure Email server before uncommenting the following line
        //Mail::to("demoo@gmail.com")->send(new DemoMail($objDemo));

        return view('welcome', compact('items') );

        
    }

    //this method delete an item
    public function delete(Request $request)
    {
        $deletedRows = Item::where('id', $request->id)->delete();
        $items = Item::all();

       
        
        

        return view('welcome', compact('items') );
    }
}
