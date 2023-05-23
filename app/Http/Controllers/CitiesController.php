<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Country;
use Illuminate\Support\Facades\DB;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All City';
        $data['cities'] = City::all();
        // $data['cities'] = City::with('country')->get();
        // dd( $data['cities']);
        return view('cities.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add City';
        $data['countries'] = Country::all();
        return view('cities.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate( [
        'country_id' => 'required|min:1',
        ]);
        $country_id = $request->input('country_id');
        $cities = $request->input('title');

        if(count(array_filter($cities)) > 0){
        foreach($cities as $city){
        if(!empty(trim($city))){
        $url_title = Str::slug($city,'-');
        $info = array(
        'country_id' => $country_id,
        'city_title' => $city,
        'url_title' => $url_title,
        );
        City::create($info);
        }
        }
        }
        return redirect(route('cities.create'))->with('message','Cities has been Added');
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
    public function edit($id)
    {
        if(empty( trim($id) ) or !is_numeric( $id )){
            return redirect(route('countries.index'));
            }
            $data['title'] = 'Edit City';
            $data['countries'] = Country::all();
            $data['city'] = $country = City::where('city_id','=',$id)->first();
            return view('cities.update', $data);
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
        $request->validate( [
            'country_id' => 'required|max:255',
            'city_title' => 'required|max:255',
            'url_title' => 'required|max:255',
        ]);

        $country_id = $request->input('country_id');
        $title = $request->input('city_title');
        $url_title = $request->input('url_title');

         City::where('city_id','=',$id)->update([
        'country_id' => $country_id,
        'city_title' => $title,
        'url_title' => $url_title
        ]);
        return redirect(route('cities.edit',$id))->with('message','City has been  update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::where('city_id','=',$id)->delete();
        return redirect(route('cities.index'))->with('message','City has been  Deleted successfull');
    }
}
