<?php

namespace App\Http\Controllers\Panel;

use App\Section;
use App\Setting;
use App\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TemplateController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }


    public function settings()
    {
        return view('panel.template.settings');
    }

    public function update_settings(Request $request, Setting $constant)
    {
        $inputs = $request->except('_token');
        foreach ($inputs as $i => $input) {
            $constant->updateOrCreate(['key' => $i],['value' => (isset($input)) ? $input : '']);
        }
        return response()->json(['status' => true, 'message' => 'Website Settings Edited Successfully']);
    }


    public function socials()
    {
        return view( 'panel.template.social');
    }


    public function update_socials(Request $request, SocialMedia $socials)
    {
        $inputs = $request->except(['_token', '_method']);
        foreach ($inputs as $i => $input) {
            $social = $socials->where('key', $i)->first();
            if (!isset($social)) {
                return $this->response_api(false, 'Unknown Error Occurred');
            }
            $social->updateItem($input);
        }
        return $this->response_api(true, 'SocialMedia Accounts Edited Successfully');
    }


    public function about(){
        return view('panel.template.about');
    }

    public function contribute(){
        return view('panel.template.contribute');
    }

    public function faq()
    {
        return view('panel.template.faq');
    }

    public function slider(){
        return view('panel.template.slider');
    }
    public function donation(){
        $data['section'] = Section::donation();
        return isset($data['section'])? view('panel.template.donation',$data) : redirect()->route(get_current_locale().'panel.dashboard');
    }

    public function store_section(Request $request){
        $item = Section::create($request->all());
        return (isset($item)) ? $this->response_api(true, 'Section Added Successfully') : $this->response_api(false, 'Unknown Error Occurred');
    }

    public function get_section_data($id)
    {
        $item = Section::find($id);
        return (isset($item)) ? $this->response_api(true, 'success', $item) : $this->response_api(false, 'success');
    }


    public function edit_section($id, Request $request)
    {
        $item =  Section::find($id) ;
        return (isset($item) && $item->update($request->all())) ? $this->response_api(true, 'Section Edited Successfully') : $this->response_api(false, 'Unknown Error Occurred');
    }
    public function delete_section($id){
        $item =  Section::find($id) ;
        return (isset($item) && $item->delete()) ? $this->response_api(true, 'Section Deleted Successfully') : $this->response_api(false, 'Unknown Error Occurred');
    }

}
