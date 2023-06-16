<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\LikeEvent;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $events = Event::where('user_id',Auth::user()->id)->orderBy('id','desc')->paginate(10);
        return view('user.dashboard.eventos',compact('events'));
        
    }

    public function search(Request $request){
        $data = $request->all();

        if($data['province'] != null && $data['category']!=null){
            $province = Province::where('name',$data['province'])->first();
            $category = Category::where('name',$data['category'])->first();

            $events = Event::where('province_id',$province->id)->where('main_category_id',$category->id)->where('status_id',2)->get();

            return view('frontend.search',compact('events'));
        }else{
            if($data['province'] != null){
                $province = Province::where('name',$data['province'])->first();
                return redirect('/provincia/'.$province->id.'/eventos');
            }
            if($data['category'] != null){
                $category = Category::where('name',$data['category'])->first();
                return redirect('/categoria/'.$category->id.'/eventos');
                
            }
            return redirect('/todos-eventos');

        }

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('user.criar-evento.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();

        $imagePath = request('image')->store('event','public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
        $image->save();

        Event::create([
            'user_id'=> Auth::user()->id,
            'name' => $data['name'],
            'image' => $imagePath,
            'province_id' => $data['province_id'],
            'city_id' => $data['city_id'],
            'description' => $data['description'],
            'main_category_id' => $data['main_category_id'],
            'second_category_id' => $data['second_category_id'],
            'address' => $data['address'],
            'start_date' => $data['start_date'],
            'start_time' => $data['start_time'],
            'end_date' => $data['end_date'],
            'end_time' => $data['end_time'],
            'email' => $data['email'],
            'phone' => $data['phone'],
            'website' => $data['website'],
            'instagram' => $data['instagram'],
            'facebook' => $data['facebook'],
            'twitter' => $data['twitter'],
            'youtube' => $data['youtube'],
            'status_id' => 3,
            'tax' => 10,
        ]);

        return redirect()->route('painel.index')->with('message','O seu evento foi adicionado com sucesso. Termine a configurações do seu evento no menu "Meus Eventos"');


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
        //
        $event = Event::find($id);
        return view('user.criar-evento.edit',compact('event'));
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
        //
        $event = Event::find($id);
        $data = $request->all();

        if(request('image')){
            $imagePath = request('image')->store('event','public');
            $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
            $image->save();
            $imageArray = ['image'=> $imagePath ];

            try {
                //code... 
                unlink("storage/".$event->image);
            } catch (\Throwable $th) {
                //throw $th;
            }

           
        }

        $event->update(array_merge(
            $data,
            $imageArray ?? []
        ));

        
        return redirect()->route('eventos.index')->with('message','Evento editado com sucesso');

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


    public function likeevent($event_id){

        $like = LikeEvent::where('user_id',Auth::user()->id)->where('event_id',$event_id)->first();

        if($like == null){
            return LikeEvent::create([
                'user_id'=> Auth::user()->id,
                'event_id'=>$event_id
            ]);

        }else{
            return $like->delete();
        }


        // $event = Event::find($event_id);
        // return $event->name;
    }






    /**All Events */


    public function frontedAllEvents(Request $request)
    {
        //
        $data = $request->all();

        if($data == []){

            $search_events = null;
            $events = Event::orderBy('id','desc')->where('status_id',2)->paginate(10);
            return view('frontend.all-events',compact('events','search_events'));
        }else{
            $events = null;
            $search =$data['search'];
            $province_id = $data['province_id'];
            $province = Province::where('name',$province_id)->first();

            if($province!= null){
                $search_events = Event::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->where('status_id',2)
                ->where('description', 'LIKE', "%{$search}%")->where('province_id',$province->id)->get();
            }else{

                $search_events = Event::query()
                ->where('name', 'LIKE', "%{$search}%")
                ->where('status_id',2)
                ->where('description', 'LIKE', "%{$search}%")->get();
            }


            return view('frontend.all-events',compact('events','search_events'));
            
        }


        
        
    }


    public function frontedAllCategories()
    {
        //
        $categories = Category::orderBy('name','asc')->get();
        return view('frontend.all-categories',compact('categories'));
        
    }


    public function detailevents($evento){
        
        $event = Event::find($evento);
        $event_id = $evento;

        $event_recomended = Event::where('status_id',2)->inRandomOrder()->limit(4)->get();

        if (Auth::check()) {
            $user_id = Auth::user()->id;
        }else{
            $user_id = 0;
        }

        if( LikeEvent::where('user_id',$user_id)->where('event_id',$evento)->first() == null){
            $like = false;
        }else{
            $like = true;
        }

       

   

        return view('frontend.event-detail',compact('event','event_id','like','event_recomended'));
    }


    
}
