<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Restaurant;
use App\Models\City;
use App\Models\Category;
use App\Models\Restaurant_category;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::with('City')->get();
        // return $restaurants;
        return view('admin/restaurants',compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $restaurant = new Restaurant;
        $restaurant->name_ar = $request->name_ar;
        $restaurant->name_en = $request->name_en;
        $restaurant->address = $request->address;
        $restaurant->latitude = $request->latitude;
        $restaurant->longitude = $request->longitude;
        $restaurant->phone = $request->phone;
        $restaurant->city_id = $request->city_id;
        $restaurant->table_count = $request->table_count;
        $restaurant->people_limit = $request->people_limit;
       
        $restaurant->save();

        $category_id = $request->input('category_id');
        foreach($category_id as $service){
          
            $restaurant_categories= new Restaurant_category;
            $restaurant_categories->category_id=$service;
            $restaurant_categories->restaurant_id= $restaurant->id;
            
            $restaurant_categories->save();

        }

        return redirect('/admin/restaurants');
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $cities = City::with('Country')->get();
        $categories = Category::all();
        $retaurant = Restaurant::find($id);
        
        return view('admin/restaurants_edit',compact('cities','categories','retaurant'));
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
        $retaurant = Restaurant::find($id);
        $retaurant ->update($request->all());
       return redirect('admin/restaurants');
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
    }

    public function addrestaurants()
    {
        $cities = City::with('Country')->get();
        $categories = Category::all();
        return view('admin/addrestaurants',compact('cities','categories'));
    }
}
