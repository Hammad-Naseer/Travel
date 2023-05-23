<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Hotel;


function print_data($string){
echo "<pre>";
print_r($string);
echo "</pre>";
}
function get_logged_in_user_name(){
    return Auth::user()->name;
}
function get_logged_in_user_id(){
    return Auth::user()->id;
}

function country_option_list($selected=0)
{
    $reg_array = DB::table('countries')->select('*')->get();
	$str='<option value="">Select Country</option>';
	foreach($reg_array as $row)
	{
		$opt_selected="";
		if($selected == $row->country_id){
			$opt_selected="selected";
		}
		$str .= '<option value="'.$row->country_id.'" '.$opt_selected.'>'.$row->title.'</option>';
	}	
	return $str;		
}
function province_option_list($country_id=0,$selected=0)
{
    //print_r($country_id);
    $reg_array = DB::table('province')->select('*')->where('country_id',$country_id)->get();
	$str='<option value="">Select Province / State</option>';
	foreach($reg_array as $row){
		$opt_selected="";
		if($selected == $row->province_id){
			$opt_selected="selected";
		}
		$str .= '<option value="'.$row->province_id.'" '.$opt_selected.'>'.$row->province_title.'</option>';
	}	
	return $str;	
}

function city_option_list($province_id,$selected=0)
{
    $reg_array = DB::table('cities')->select('*')->where('province_id',$province_id)->get();
	$str='<option value="">Select City</option>';
	foreach($reg_array as $row){
		$opt_selected="";
		if($selected == $row->city_id){
			$opt_selected="selected";
		}
		$str .= '<option value="'.$row->city_id.'" '.$opt_selected.'>'.$row->city_title.'</option>';
	}	
	return $str;	
}
function generate_hotels_url_title($url_title){
			$rows = Hotel::where(['url_title'=> $url_title])->count();
			if($rows >0){
				return $url_title.'-'.($rows+1);
			}else{
				return $url_title;
			}	
}
?>