<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Amenity;
use App\Exports\AmenitiesExport;
use App\Imports\AmenitiesImport;
use AmrShawky\LaravelCurrency\Facade\Currency;
use Excel;
use CSV;
use PDF;


class AmenitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Amenity';
        $data['amenities'] = Amenity::all();
      
        return view('amenities.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Amenity';
        return view('amenities.create', $data);
    }
    public function exportCSV(){
        return CSV::download(new AmenitiesExport,'amenities-record.csv');
    }
    public function importForm(){
        return view('amenities.import-form');
    }

    public function saveimportFile(Request $request){
        Excel::import(new AmenitiesImport,$request->file); 
        return "Data Imported";
    }
    public function createPDF(){  
        $data = Amenity::all();
      view()->share('amenities',$data);
      $pdf = PDF::loadView('amenities.pdf_view');
      return $pdf->stream();

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
        $amenity = Amenity::create($info);
        if(!empty($amenity))
        return redirect(route('amenities.create'))->with('message',"Amenity has been Added Successfull ");
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
            return redirect(route('amenities.index'));
            }
            $data['title'] = 'Edit Country';
            $data['amenity'] = $amenity = Amenity::where('id','=',$id)->first();
            // id does't exist
            if(empty($amenity)){
                return redirect (route('amenities.index'));
            }
            return view('amenities.update', $data);
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

        Amenity::where('id','=',$id)->update([
        'title' => $title,
        'url_title' => $url_title
        ]);
        return redirect(route('amenities.edit',$id))->with('message','Amenity has been  update successfull');
    }
    public function currency(Request $request){
        $converted = '';
          if ($request->filled('currency_from')) {
               
               $convertedObj = Currency::convert()
                         ->from($request->get('currency_from'))
                         ->to($request->get('currency_to'))
                         ->amount($request->get('amount'));

               if($request->filled('date')){

                    $convertedObj = $convertedObj->date($request->get('date'));
               }

               $converted = $convertedObj->get();
          }

          return view('amenities.currency',compact('converted'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Amenity::where('id','=',$id)->delete();
        return redirect(route('amenities.index'))->with('message','Amenity has been  Deleted successfull');
    }
}
