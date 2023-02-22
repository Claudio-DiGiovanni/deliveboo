<?php

namespace App\Http\Controllers\Admin;
use App\Dish;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class RestaurantController extends Controller
{

    private $validations = [
        'slug'      => [
            'required',
            'string',
            'max:100',
        ],
        'name'          => 'required|string|max:100',
        'price'         => 'required|integer',
        'image'         => 'url|max:200',
        'visibility'    => 'tinyinteger',
        'description'   => 'required|string',

    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */ public function index(Request $request)
    {
        $query = $request->input('search');
        $user = Auth::user();
        $dishes = Dish::where('name', 'like', '%'.$query.'%')->get();

        return view('admin.dishes.index', [
            'dishes' => $dishes,
            'user' => $user
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dishes.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $data = $request->all();
        $dish = new Dish;
        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->image = $data['image'];
        $dish->description = $data['description'];
        $dish->visibility = $data['visibility'];
        $dish->slug = $data['slug'];
        $dish->user_id = $user->id ;
        $dish->save();
        return redirect()->route('admin.dishes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dish $dish)
    {
        return view('admin.dishes.show',compact('dish'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Dish $dish)
    {
        return view('admin.dishes.edit', ['dish' => $dish]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dish $dish)
    {
        $data = $request->all();
        $dish->name = $data['name'];
        $dish->price = $data['price'];
        $dish->image = $data['image'];
        $dish->description = $data['description'];
        $dish->visibility = $data['visibility'];
        $dish->slug = $data['slug'];
        $dish->update();
        return redirect()->route('admin.dishes.show', ['dish' => $dish]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dish $dish)
    {
        $dish->orders()->detach();
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }


}
