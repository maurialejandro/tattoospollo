<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Tattoo;
use Illuminate\Http\File;

class TattooController extends Controller
{
    //crear video
    public function create(){
        return view('tattoo.createTattoo');
    }

    public function index()
    {
        $tattos = DB::table('tattos')
                ->orderBy('id', 'desc')
                ->get();   
        //$tattoos = Tattoo::paginate(1000000);
        return view('tattoo.tattoos',array(
            'tattoos' => $tattos
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
           
                //Storage::disk('local')->putFileAs('tattoos', $request->file('image'), $imagePath);

                //guardar usuario 
                $tattoo = new Tattoo();
                $tattoo->user_id = $user->id;
                $tattoo->title = $request->input('title');
                $tattoo->description = $request->input('description');
                $tattoo->price = $request->input('price');
                $path = $request->image->store('tattoos');
                $tattoo->img = $path;
                $tattoo->save();
            
                $data = array(
                    'tatto' => $tattoo,
                    'status' => 'success',
                    'code' => 200, 
                );
                return redirect()->route('home')->with(array(
                    'message' => 'El Tattoo se guardo satisfactoriamente!!'
                ));     
    }
    public function getImage($filename){
        $file = Storage::disk('tattoos')->get($filename);
        return response($file,200);
    }
    public function destroy($id, Request $request){
            $user = \Auth::user();
            $tattoo = Tattoo::find($id);
            //ver que existe tatto  eliminar
            if($tattoo){
                $tattoo->delete();
                Storage::disk('local')->delete($tattoo->img);
                return redirect()->route('home')->with(array(
                    'message' => 'El Tattoo se elimino satisfactoriamente!!'
                )); 
            }else{
                return redirect()->route('home')->with(array(
                    'message' => 'Error no se pudo eliminar el Tattoo!!'
                ));    

            }
        
    }
    public function edit($id){
        $user = \Auth::user();
        $tattoo = Tattoo::find($id);
        
        if($user && $tattoo->user_id == $user->id){
            
            return view('tattoo.update', array(
                'tattoo' => $tattoo 
            ));
        }else{
            return view('home');
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
            $tattoo = Tattoo::findOrFail($id);
            Storage::delete($tattoo->img); 
            if($user && $tattoo->user_id == $user->id){
            //actualizar tattoo  
            $path = $request->image->store('tattoos');
            $tatto = Tattoo::where('id',$id)
                ->update([ 'title' => $request->title,
                           'description' => $request->description,
                           'price' => $request->price,
                           'img' => $path
                        ]
            );
            return redirect()->route('home')->with(array(
                'message' => 'Se actualizo el Tattoo!!'
            ));    
            }else{
                return view('welcome');
            }

    }
}
