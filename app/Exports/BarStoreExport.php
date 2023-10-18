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

   public function __construct() {

    $this->barstore = BarStore::find(18);
    $this->event =  Event::find(34);
    $this->barmans = Barman::where('bar_store_id',18)->get();

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
