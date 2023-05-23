<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Country;
use App\Models\City;
use Illuminate\Support\Facades\DB;

class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $filter = $request->input('apply_filter');
        // $country_id = $request->input('loc_country');
        // $province_id = $request->input('loc_province');
        // $loc_city = $request->input('loc_city');
        //print_r($country_id);
        // print_r($province_id);
        // print_r($loc_city);
        
        // $user_filter = "";
		// if(isset($filter) && ($filter == 1))
        // {
        //     $user_filter = "where country_id = ".$country_id." ";
        // }

        // if(!empty($filter) && $filter == 1){
        // $data['countries'] = DB::table('countries')
        // ->where('country_id', '=', $user_filter)
        // ->get();
        // print_r($data['countries']);
        // }

        // else{
        $data['title'] = 'All countries';
        //$data['countries'] = Country::all();
        $data['countries'] = DB::table('countries')
        ->join('province', 'countries.country_id', '=', 'province.country_id')
        ->join('cities', 'province.province_id', '=', 'cities.province_id')
        ->select('countries.*', 'province.province_title', 'cities.city_title')
        ->get();
        // }
        return view('countries.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Country';
        return view('countries.create', $data);
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
        ]);
        $title = $request->input('title');
        $url_title = Str::slug($title,'-');
        $info =array(
            'title' => $title,
            'url_title' => $url_title
        );
        $country = Country::create($info);
        if(!empty($country))
        return redirect(route('countries.create'))->with('message',"Country has been Added Successfull ");
        else
        return redirect()->back() -> with('error',"Error! Please Try Again");
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
        $data['title'] = 'Edit Country';
        $data['country'] = $country = Country::where('country_id','=',$id)->first();
        // id does't exist
        if(empty($country)){
            return redirect (route('countries.index'));
        }
        return view('countries.update', $data);
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
            'title' => 'required|max:255',
        ]);

        $title = $request->input('title');
        $url_title = $request->input('url_title');

         Country::where('country_id','=',$id)->update([
        'title' => $title,
        'url_title' => $url_title
        ]);
        return redirect(route('countries.edit',$id))->with('message','Country has been  update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::where('country_id','=',$id)->delete();
        return redirect(route('countries.index'))->with('message','Country has been  Deleted successfull');
    }
    function get_province(Request $request)
        {
            $country_id = $request->input('country_id');
             echo province_option_list($country_id);
        }
        function get_city(Request $request)
        {
             $province_id = $request->input('province_id');
             echo city_option_list($province_id);
        }
        function fetch_cities($country_id){
           $data['cities'] = $city =City::where(['city_id' => $country_id])->get();
           return view('countries.cities',$data);
        }
            
}
