<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Models\Master\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $document_all =Document::all();
        return view('Master.document',compact('document_all'));
    }


    public function create(Request $request){
        $store=new Document;
        $store->document_name=$request->get('document_name');
        $store->save();
        return redirect(route('document'))->with(['success' => true, 'message' => 'Data Inserted Successfully  !']);
    }

    public function delete(Request $request)  
    {  
      $data=Document::where('id',$request->id)->delete();   
        return redirect(route('document'))->with(['success' => true, 'message' => 'Data Deleted Successfully  !']); 
    } 

    public function edit(request $request)
    {
   // echo json_encode($request->all());
      $data1=document::find($request->id);
      $document_all =Document::all();

      
      // exit();
    return view('Master.edit_document',['edit_data'=>$data1,'document_all'=>$document_all]);
    }


    public function update(Request $request)
    {
      //dd($request->all());
   $store =document::find($request->id);
   //echo json_encode($data);
       // exit();
   $store->document_name = $request->document_name;
   $store->save();
   return redirect(route('document'))->with(['success' => true, 'message' => 'Data Update Successfully  !']);
  }
}
