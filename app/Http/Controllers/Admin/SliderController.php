<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;


class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->get();
        return view ('admin.pages.slider.index', [
            'form_type' => 'create',
            'sliders'   =>  $sliders
        ]);
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
        
        //return $request->all(); for check

        //Manage Data(Validation)
        $this->validate($request, [
            'title'         =>'required',
            'subtitle'     =>'required',
            'photo'         =>'required|mimes:jpg,png,jpeg|max:5048',            
        ]);        
        
        //Button Management
        $buttons = [];
        for( $i = 0; $i < count($request->btn_title); $i++){
            array_push($buttons, [
                'btn_title' =>  $request->    btn_title[$i],
                'btn_link'  =>  $request->    btn_link[$i],
                'btn_type'  =>  $request->    btn_type[$i]
            ] );
        }
        
        //return $buttons; [for check]
        
        //Slider image Manage
        if ($request->hasFile('photo') ) {
            
            $img=$request->file('photo');
            $file_name = md5( time().rand() ) .'.'. $img->clientExtension();
            
            $image=Image::make($img->getRealPath() );
            
            $image->save(storage_path('app/public/sliders/' . $file_name ) );
        }
        
        //Add New Slide 
        Slider::create([
            'title'         =>$request->title,
            'subtitle'      =>$request->subtitle,
            'photo'         =>$file_name,
            'btns'          =>json_encode($buttons)
        ]);
        return back()->with('success', 'Slide Added Successful');
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
     $slider = Slider::findOrFail($id);
     $sliders = Slider::latest()->get();
        return view ('admin.pages.slider.index', [
            'form_type' => 'edit',
            'sliders'   =>  $sliders,
            'slider'    =>  $slider  
        ]);
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
        //return $request->all(); For Check
        //get slider
        $slider = Slider::findOrFail($id);

        //button MANAGEMENT
        $buttons = [];
        for( $i = 0; $i < count($request->btn_title); $i++){
            
            array_push($buttons, [
                'btn_title' =>  $request->    btn_title[$i],
                'btn_link'  =>  $request->    btn_link[$i],
                'btn_type'  =>  $request->    btn_type[$i]
            ] );
        }

        //UPDATED sLIDER 
        $slider->  update([
            'title'         =>$request->title,
            'subtitle'      =>$request->subtitle,
            'btns'          =>json_encode($buttons)
        ]);
        
        return back()->with('success', 'Slide Updated Successful');
        
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