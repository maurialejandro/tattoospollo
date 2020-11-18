<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Pintura;
use Illuminate\Http\File;

class PinturaController extends Controller
{
    public function createPintura(){
        return view('pintura.createPintura');
    }
    public function index(){
        $pinturas = DB::table('pinturas')
            ->orderBy('id', 'desc')
            ->get();   
        return view('pintura.pinturas',array(
            'pinturas' => $pinturas
        ));
    }
    public function store(Request $request){
     
        $user = \Auth::user();
       
         
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,mp4,mov,ogg,qt',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);

            //guardar usuario 
            $pintura = new Pintura();
            $pintura->user_id = $user->id;
            $pintura->title = $request->input('title');
            $pintura->description = $request->input('description');
            $pintura->price = $request->input('price');
            $path = $request->image->store('pinturas');
            $pintura->img = $path;
            $image = $request->file('image');
            $pintura->save();

            return redirect()->route('home')->with(array(
                'message' => 'La Pintura se guardo satisfactoriamente!!'
            ));     
            
        }
        public function getImage($filename){
            $file = Storage::disk('pinturas')->get($filename);
            return response($file,200);
        }
        public function destroy($id, Request $request){
            
            $user = \Auth::user();
            $pintura = Pintura::find($id);
            //ver que existe tatto  eliminar
            if($pintura){
                $pintura->delete();
                Storage::disk('local')->delete($pintura->img);
                return redirect()->route('home')->with(array(
                    'message' => 'La Pintura se elimino satisfactoriamente!!'
                )); 
            }else{
                return redirect()->route('home')->with(array(
                    'message' => 'Error no se pudo eliminar la Pintura!!'
                ));    

            }
        
    }
    public function update($id, Request $request){
        
        $user = \Auth::user();
        //validar
        
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,doc,docx,pdf,mp4,mov,ogg,qt',
            'title' => 'required',
            'description' => 'required',
            'price' => 'required|numeric',
        ]);
        //actualizar tattos
        $pintura = Pintura::findOrFail($id);
        Storage::delete($pintura->img);  
        if($user && $pintura->user_id == $user->id){
        
       
        //falta eliminar la imagen de tatto
        $pintura->user_id = $user->id;
        $pintura->title = $request->input('title');
        $pintura->description = $request->input('description');
        $pintura->price = $request->input('price');
        $path = $request->image->store('pinturas');
        $pintura->img = $path;
        $pintura->save();

        //$tattoo = Tattoo::where('id',$id)->update($params_array);
        return redirect()->route('home')->with(array(
            'message' => 'Se actualizo la Pintura!!'
        ));    
        }else{
            return view('welcome');
        }

}
    public function edit($id){
        $user = \Auth::user();
        $pintura = Pintura::find($id);
        if($user && $pintura->user_id == $user->id){
            return view('pintura.update', array(
                'pintura' => $pintura 
            ));
        }else{
            return view('welcome');
        }
       
    }
}
