<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\City;
use App\Models\Courier;
use Illuminate\Http\Request;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class HomeController extends Controller
{

    public function index(){
        $province = $this->getProvince();
        $courier = $this->getCourier();
        return view("welcome", compact("province", "courier"));
    }

    public function store(Request $request){
        // dd($request->all()); // untuk mengecek datanya saat melakukan submit apakah sesuai dengan inputan dd artinya dumb and die
        // $ongkir = RajaOngkir::ongkosKirim([
        //     'origin'        => $request->origin_city,     // ID kota/kabupaten asal
        //     'destination'   => $request->destination_city,      // ID kota/kabupaten tujuan
        //     'weight'        => 1300,    // berat barang dalam gram anggapa aja 1300 gram
        //     'courier'       => $request->courier[0]    // kode kurir pengiriman yang dipilih di checkbox: ['jne', 'tiki', 'pos'] untuk starter
        // ])->get();

        // dd($ongkir);

        // buat seperti ini agar kita bisa menampilkan data ongkirnya sesuai dengan banyaknya jasa ongkir yang kita pilih pada checkbox
        // $courier = $request->input('courier');
        // if($courier){
        //     $result = [];
        //     foreach ($courier as $row) {
        //         $ongkir = RajaOngkir::ongkosKirim([
        //             'origin'        => $request->origin_city,     // ID kota/kabupaten asal
        //             'destination'   => $request->destination_city,      // ID kota/kabupaten tujuan
        //             'weight'        => 1300,    // berat barang dalam gram anggapa aja 1300 gram
        //             'courier'       => $row    // ubah menjadi row karena tidak perlu lagi index key dan sudah diwakilkan dengan variabel row untuk masing-masing kurir yang kita dapatkan dari variabel courier
        //         ])->get();
        //         $result[] = $ongkir;
        //     }
        // }

        $courier = $request->input("courier");
        if($courier){
            $data = [
                "origin" => $this->getCity($request->origin_city),
                "destination" => $this->getCity($request->destination_city),
                "weight" => 1300,
                "result" => []
            ];
            foreach($courier as $row){
                $ongkir = RajaOngkir::ongkosKirim([
                    "origin" => $request->origin_city,
                    "destination" => $request->destination_city,
                    "weight" => $data['weight'],
                    "courier" => $row
                ])->get();

                $data["result"][] = $ongkir;
            }
            return view('costs')->with($data);
        }

        //kalau tidak ada data courier
        return redirect()->back();

    }
    
    public function getCourier(){
        return Courier::all();
    }

    // Untuk mendapatkan provinsi
    public function getProvince(){
        return Province::pluck("title", "code");
    }

    public function getCities($id){
        return City::where("province_code", $id)->pluck("title", "code");
    }

    public function getCity($code){
        return City::where("code",$code)->first(); // untuk mendapatkan nama dari lokasi yang kita pilih baik dari maupun tujuan sehingga bisa ditampilkan di layout
    }

    public function searchCities(Request $request){
        $search = $request->search;
        if(empty($search)){
            $cities = City::orderBy("title","asc")
                ->select("id", "title")
                ->limit(5)
                ->get();
        } else {
            $cities = City::orderBy("title","asc")
                ->where("title", "like", "%" . $search . "%")
                ->select("id", "title")
                ->limit(5)
                ->get();
        }

        $response = [];

        foreach ($cities as $city) {
            $response[] = [
                "id" => $city->id,
                "text" => $city->title
            ];
        }

        return json_encode($response); //untuk mengubah menjadi data json
    }
}

