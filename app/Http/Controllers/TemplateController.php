<?php

namespace App\Http\Controllers;

use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */

     //Hiển thị dữ liệu
    public function index(Request $request)
    {
        $template = Template::orderBy('created_at','desc');
        if($request->has('name') && request()->input('name') != ''){
             $template->where('name', 'LIKE', '%'.request()->input('name').'%');
        }
        if($request->has('category') && request()->input('category') != 0){
            $template->where('category', request()->input('category'));
        }
        if($request->has('date') && request()->input('date') != ''){
            $template->whereDate('created_at', '=' ,request()->input('date'));
        }

        return $template->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): \Illuminate\Http\Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

     //Lưu dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'content' => 'required'
        ]);
        
        $template = Template::create($request->all());
        return response()->json($template, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */

    //Hiển thị dữ liệu theo id
    public function show(Template $template)
    {
        return $template;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */
    public function edit(Template $template)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */

      //Sửa dữ liệu
    public function update(Request $request, Template $template)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'content' => 'required',
        ]);

        $template->update($request->only([
            'name', 'category', 'content'
        ]));

        return request()->json([
            'messages' => 'Update success',
            'template' => $template,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Template  $template
     * @return \Illuminate\Http\Response
     */

     //Xóa dữ liệu
    public function destroy(Template $template)
    {
        $template->delete();
        return response()->json([
            'messages' => 'delete success'
        ]);
    }

    public function getTemplateInternApi(){
        return Template::where('category', 2)->get();
    }

    public function getTemplateOfferApi(){
        return Template::where('category', 3)->get();
    }

    public function getTemplateThankApi(){
       return Template::where('category', 1)->get();
    }

    public function previewMail(Request $request){
        $template = Template::find($request->id);
        return $template->content;
    }
}
