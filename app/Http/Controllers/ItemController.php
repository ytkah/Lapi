<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;
use DB;
use App\Http\Controllers\Controller;
use Image;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = DB::table('items')->latest()->paginate(4);
        return view('items.index')->with('items',$items); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|unique:items|max:255',
            'price' => 'required|numeric',
            'img' => 'required|max:255',
            'description' => 'required|max:255',
        ]);//检查输入是否合法
        //
        $item = New Item;

        $item->name = $request->name;
        $item->price = $request->price;
        
        $item->description = $request->description;

        if($request->hasFile('img'))
        {            
            $image = $request->file('img');         
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->save($location);
            $item->img = url('img/' . $filename);
        }

        if($item->save())
        {
            return redirect('items');
        }
           
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = Item::find($id);
        return view('items.show')->with('item', $item);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $item = Item::find($id);
        return view('items.edit')->with('item', $item);

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
        //
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'img' => 'required|max:255',
            'description' => 'required|max:255',
        ]);//检查输入是否合法
        //
        $item = Item::find($id);

        $item->name = $request->name;
        $item->price = $request->price;
        //$item->img = $request->img;
        $item->description = $request->description;

        if($request->hasFile('img'))
        {            
            $image = $request->file('img');         
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('img/' . $filename);
            Image::make($image)->save($location);
            $item->img = url('img/' . $filename);
        }

        if($item->save())
        {
            return redirect('items');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $item = Item::find($id);
        $item->delete();
    }
}
