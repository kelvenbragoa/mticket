<?php

namespace App\Exports;

use App\Models\Barman;
use App\Models\BarStore;
use App\Models\Event;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

// class BarStoreExport implements FromCollection
// {
//     /**
//     * @return \Illuminate\Support\Collection
//     */
//     public function collection()
//     {
//         //
//     }
// }


class BarStoreExport implements FromView,ShouldAutoSize
{
   use Exportable;

   private $barstore;
   private $event;
   private $barmans;

   private $barstore_id;
   private $event_id;

   public function __construct($barstore_id,$event_id) {

    $this->$barstore_id = $barstore_id;
    $this->$event_id = $event_id;

    $this->barstore = BarStore::find($this->$barstore_id);
    $this->event =  Event::find($this->$event_id);
    $this->barmans = Barman::where('bar_store_id',$this->$barstore_id)->get();

    // $this->barstore = BarStore::find(4);
    // $this->event =  Event::find(17);
    // $this->barmans = Barman::where('bar_store_id',4)->get();

   }

   public function view() : View{

        return view('superadmin.events.bar-store-report',[
            'event'=>$this->event,
            'barstore'=>$this->barstore,
            'barmans'=>$this->barmans
        ]);

   }
}
