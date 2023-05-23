<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Hotel;
use App\Models\Amenity;
use App\Models\Country;
use App\Models\Service;
use App\Models\HotelImages;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['amenties'] = Amenity::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Hotels';
        $data['countries'] = Country::all();
        $data['amenties'] = Amenity::all();
        $data['services'] = Service::all();
        return view('hotels.create', $data);
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
            'title' => 'required|unique:countries|max:255',
            'country_id' => 'required|numeric',
            'city_id' => 'required|numeric',
            'ratings' => 'required|numeric',
           
        ]);
        $title = $request->input('title');
        $slug =Str::slug($title,'-');
        $country_id = $request->input('country_id');
        $city_id = $request->input('city_id');
        $ratings = $request->input('ratings');
        $google_map = $request->input('google_map');
        $description = $request->input('description');
        $featured_image = $request->input('featured_image');
        $amenities = $request->input('amenity');
        $services = $request->input('service');
        $url_title = generate_hotels_url_title($slug);

        $info = array(
            'country_id' => $country_id,
            'city_id' => $city_id,
            'title' => $title,
            'url_title' => $url_title,
            'ratings' => $ratings,
            'google_map' => $google_map,
            'description' => $description,
        );  
        
        $path = $this->saveFeatureImage($request);
        if(!empty(trim($path))){
       $info['featured_image'] = $path;
        }   
        $hotel = Hotel::create($info);
        if(!empty($hotel) and $hotel -> id >0){
           $this->saveMultipleImages($request,$hotel->id);
            return redirect()->back()->with('message',"Hotel has been added");
        }else{
            return redirect()->back()->with('error',"Error Please Try again");
        }
    
    }

    function saveFeatureImage($request){
        $savepath = 'uploads/hotels/feature-images';
        $croppedpath = 'uploads/hotels/feature-images/cropped';
        if($request->hasFile('featured_image')){
            $filenameWithExtension =$request->file('featured_image')->getClientOriginalName();
            $filename =pathinfo($filenameWithExtension,PATHINFO_FILENAME);
            $extension =$request->file('featured_image')->getClientOriginalExtension();
            $fileNameToStore = $filename.'-'.time().'.'.$extension;
            $path = $request->file('featured_image')->storeAs($croppedpath,$fileNameToStore);
            return $request->file('featured_image')->storeAs($savepath,$fileNameToStore);
           

        }
    }
    function saveMultipleImages($request,$hotel_id){
        if($hotel_id > 0 and is_numeric($hotel_id)){
        $savepath = 'uploads/hotels/feature-images';
        if($request->hasFile('images')){
            foreach($request->file('images') as $image) {
                $filename = $image->getClientOriginalName();
                $path = $image->storeAs($savepath, $filename);
                $info =array(
                    'hotel_id' => $hotel_id,
                    'image' => $path,
                );
                HotelImages::create($info);
            }
        }
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
}
