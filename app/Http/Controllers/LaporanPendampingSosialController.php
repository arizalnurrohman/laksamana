<?php

namespace App\Http\Controllers;

use Validator;
use Carbon\Carbon;
use App\Models\Agama;
use App\Models\Assessment;
use App\Models\Gedung;
use App\Models\Pasien;
use App\Models\Pegawai;
use App\Models\Petugas;
use App\Models\Pengampu;
use App\Models\Provinsi;
use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Pendidikan;
use App\Models\Residensial;
use Illuminate\Support\Str;
use App\Models\KategoriPPKS;
use App\Models\StatusUsulan;
use App\Models\Rehabilitasi;
use Illuminate\Http\Request;
use App\Models\SumberRujukan;
use App\Models\KategoriPPKSSub;
use App\Models\Perujuk;

class LaporanPendampingSosialController extends Controller
{
    function __construct()
    {
    //     $fix_roles      =array();
    //     $this->page_attribut  =getPageAttribute();
        
    //     $the_roles      =isset($this->page_attribut[0]['permission']) ? $this->page_attribut[0]['permission']  : array();
    //     $the_url        =isset($this->page_attribut[0]['menuURL']) ? $this->page_attribut[0]['menuURL']  : "";
    //     foreach($the_roles as $vall){
    //         $fix_roles[]=$vall->name;
    //     }
    //     $this->middleware(['permission:'.implode("|",$fix_roles)], ['only' => ['index', 'store']]);
    //     $this->middleware(['permission:create '.$the_url], ['only' => ['create', 'store']]);
    //     $this->middleware(['permission:update '.$the_url], ['only' => ['edit', 'update']]);
    //     $this->middleware(['permission:delete '.$the_url], ['only' => ['destroy','hapusMenu']]);
    //     // dd($fix_roles);
    //     /* OLD
    //     $this->middleware(['permission:read menu|create menu|update menu|delete menu'], ['only' => ['index', 'store']]);
    //     $this->middleware(['permission:create menu'], ['only' => ['create', 'store']]);
    //     $this->middleware(['permission:update menu'], ['only' => ['edit', 'update']]);
    //     $this->middleware(['permission:delete menu'], ['only' => ['destroy']]);
    //     */

    //     $this->error    =array();
    //     $this->success  =false;
    }
    public function index(Request $request)
    {
        $bln_awal=$request->bulan_awal ? $request->bulan_awal : date("m");
        $bln_akhr=$request->bulan_akhir ? $request->bulan_akhir : date("m");
        $tahun   =date("Y");

        $bln_awal=$request->bulan_awal ? $request->bulan_awal : date("m");
        $bln_akhr=$request->bulan_akhir ? $request->bulan_akhir : date("m");
        $tahun   =$request->tahun ? $request->tahun :date("Y");

        $pendamping=Petugas::orderBy("nama_petugas","ASC")->get();
        foreach($pendamping as $pdp){
            $pdp->ppks=$this->getPPKS($pdp->id,$bln_awal,$bln_akhr,$tahun);
            foreach($pdp->ppks as $ppks_d){
                $ppks_d->subklaster=$this->kategori_detail($ppks_d->kategori_ppks_json);
            }
        }
        // dd($pendamping);

        $data=$pendamping;
        return view('laporan_pendamping_sosial.index',\compact('data'))->with('no', 1);
    }

    public function download_excel(Request $request){
        $bln_awal=$request->bulan_awal ? $request->bulan_awal : date("m");
        $bln_akhr=$request->bulan_akhir ? $request->bulan_akhir : date("m");
        $tahun   =$request->tahun ? $request->tahun :date("Y");

        $pendamping=Petugas::orderBy("nama_petugas","ASC")->get();
        foreach($pendamping as $pdp){
            $pdp->ppks=$this->getPPKS($pdp->id,$bln_awal,$bln_akhr,$tahun);
            foreach($pdp->ppks as $ppks_d){
                $pdp->ppks->subklaster=$this->kategori_detail($ppks_d->kategori_ppks_json);
            }
        }
        // dd($pendamping);

        $filename = 'Lap. Dampingan Pendamping Sosia_' . date('Y_m_d_H_i_s') . '.xls';
        header("Content-Type: application/vnd-ms-excel");
        header("Content-Disposition: attachment; filename=$filename");


        echo "<table border='1'>";
        $no=1;
        $total_per_bulan=[];
        echo "Laporan Dampingan Pendamping Sosial";
        echo "<br>";
        echo '<thead>
                <tr>
                    <th width="30" style="vertical-align:middle">NO</th>
                    <th style="text-align:left">Nama Pendamping Sosial</th>
                    <th style="text-align:left">Nama PPKS yang didampingi</th>
                    <th style="text-align:left">Asal Rujukan</th>
                    <th style="text-align:left">Klaster</th>
                    <th style="text-align:left">Sub Klaster</th>
                </tr>
              <thead/>';
            echo "<tbody>";
            foreach ($pendamping as $row) {
                echo "<tr>";
                echo "<td>".$no++."</td>";
                echo '<td style="text-align:left" colspan="5">'.$row->nama_petugas.'</td>'; 
                echo '</tr>';

                foreach($row->ppks as $ppks){
                    echo "<tr>";
                    echo '<td style="text-align:left" colspan="2">&nbsp;</td>'; 
                    echo '<td style="vertical-align:middle">'.$ppks->nama_depan.'</td>';
                    echo '<td style="text-align:left">'.$ppks->sumber.'</td>'; 
                    echo '<td style="vertical-align:middle"></td>';
                    echo '<td style="text-align:left"></td>'; 
                    echo '</tr>';
                }
            }
            echo "</tbody>";
        echo "</table>";

        exit;
    }

    public function getPPKS($pendamping,$bln_awal,$bln_akhr,$tahun){
        $data=Rehabilitasi::where("laksa_tr_rehabilitasi.petugas_id",$pendamping);
        $data=$data->leftJoin('laksa_tr_layanan', 'laksa_tr_layanan.id', '=', 'laksa_tr_rehabilitasi.residensial_id');
        $data=$data->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $data=$data->leftJoin('laksa_ms_sumber_rujukan', 'laksa_tr_layanan.sumber_id', '=', 'laksa_ms_sumber_rujukan.id');
        $data=$data->leftJoin('laksa_ms_kategori_ppks', 'laksa_tr_layanan.kategori_ppks_id', '=', 'laksa_ms_kategori_ppks.id');
        $data=$data->whereRaw('MONTH(tgl_penerimaan) BETWEEN ? AND ?', [$bln_awal, $bln_akhr])->whereRaw('YEAR(tgl_penerimaan) = ?', [$tahun]);
        $data=$data->get();
        // dd($data);
        return $data;
    }

    public function kategori_detail($json){
        $json_decode = json_decode($json, true); // Decode sebagai array

        $key = array_keys($json_decode)[0]; // Ambil kunci pertama secara dinamis
        $value = $json_decode[$key]; // Ambil nilai berdasarkan kunci yang ditemukan

        $sub_klaster=KategoriPPKSSub::where("id",$value)->first();
        return $sub_klaster->sub_kategori_ppks;
    }
}
