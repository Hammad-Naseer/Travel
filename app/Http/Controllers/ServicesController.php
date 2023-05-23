<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Service;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'All Service';
        $data['services'] = Service::all();
      
        return view('services.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Add Service';
        return view('services.create', $data);
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
        $service = Service::create($info);
        if(!empty($service))
        return redirect(route('services.index'))->with('message',"Services has been Added Successfull ");
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
            return redirect(route('services.index'));
            }
            $data['title'] = 'Edit Service';
            $data['amenity'] = $service = Service::where('id','=',$id)->first();
            // id does't exist
            if(empty($service)){
                return redirect (route('services.index'));
            }
            return view('services.update', $data);
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

        Service::where('id','=',$id)->update([
        'title' => $title,
        'url_title' => $url_title
        ]);
        return redirect(route('services.edit',$id))->with('message','Service has been  update successfull');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Service::where('id','=',$id)->delete();
        return redirect(route('services.index'))->with('message','Service has been  Deleted successfull');
    }
}
