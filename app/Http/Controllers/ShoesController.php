<?php

namespace App\Http\Controllers;
use App\Shoe;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\ShoeRequest;
use App\Http\Controllers\Controller;

class ShoesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $shoes = Shoe::all();

        return view('shoes.index', compact('shoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $shoes = Shoe::all();

        return view('shoes.create', compact('shoes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(ShoeRequest $request)
    {
        Shoe::create($request->all());

        flash()->success('Success!', 'Your awesome shoes were successfully added!');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $shoe = Shoe::findOrFail($id);
        //$shoeName = Shoe::find()

        return view('shoes.show', compact('shoe'));
    }

    public function addPhoto(Request $request)
    {
        $file = $request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('imgs/shoes', $name);

        $shoe = Shoe::where(compact('id'))->first();

        //dd($shoe);

        $shoe->photos()->create(['path' => '/imgs/shoes/' . $name]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $shoe = Shoe::findOrFail($id);

        $shoes = Shoe::all();

        // show the edit form and pass the nerd
        return view('shoes.update', compact('shoe', 'shoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $shoe = Shoe::findOrFail($id);

        $this->validate($request, [
            'name' => 'required'
        ]);

        $input = $request->all();

        $shoe->fill($input)->save();

        flash()->success('Updated', 'You successfully updated your shoe');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $shoe = Shoe::find($id);
        $shoe->delete();

        return redirect('/');
    }
}
