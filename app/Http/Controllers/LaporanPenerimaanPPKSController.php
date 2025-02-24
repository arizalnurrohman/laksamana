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

class LaporanPenerimaanPPKSController extends Controller
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
        // dd($request->all());
        $bln_awal=$request->bulan_awal ? $request->bulan_awal : date("m");
        $bln_akhr=$request->bulan_akhir ? $request->bulan_akhir : date("m");
        $tahun   =date("Y");

        $selisih=$bln_akhr-$bln_awal;

        $kategori=KategoriPPKS::orderBy("sort","ASC");
        $kategori=$kategori->select("kategori");
        for($x=0;$x<=$selisih;$x++){
            $kategori=$kategori->addSelect([
                date("M",strtotime(date($tahun."-".($x+1)."-01"))) => Residensial::selectRaw('COUNT(*)')
                    ->whereColumn('kategori_ppks_id', '=', 'laksa_ms_kategori_ppks.id')
                    ->whereRaw('MONTH(tgl_penerimaan) = ?', [$x + 1])
                    ->whereRaw('YEAR(tgl_penerimaan) = ?', [$tahun])
                    ->take(1)
            ]);
        }
        $kategori=$kategori->get();
        // dd($kategori);
        $data=$kategori;
        return view('laporan_penerimaan_ppks.index',\compact('data'))->with('no', 1);
    }

    public function download_excel(Request $request){
        // dd($request);
        $bln_awal=$request->bulan_awal ? $request->bulan_awal : date("m");
        $bln_akhr=$request->bulan_akhir ? $request->bulan_akhir : date("m");
        $tahun   =$request->tahun ? $request->tahun :date("Y");

        $selisih=$bln_akhr-$bln_awal;
        
        

        $kategori=KategoriPPKS::orderBy("sort","ASC");
        $kategori=$kategori->select("kategori","id");
        // for($x=0;$x<=$selisih;$x++){
        //     $kategori=$kategori->addSelect([
        //         date("F",strtotime(date($tahun."-".($x+1)."-01"))) => Residensial::selectRaw('COUNT(*)')
        //             ->whereColumn('kategori_ppks_id', '=', 'laksa_ms_kategori_ppks.id')
        //             ->whereRaw('MONTH(tgl_penerimaan) = ?', [$x + 1])
        //             ->whereRaw('YEAR(tgl_penerimaan) = ?', [$tahun])
        //             ->take(1)
        //     ]);
        // }
        $kategori=$kategori->get();
        foreach($kategori as $cat){
            $cat->bulan=$this->getPelayanan($cat->id,$bln_awal,$bln_akhr,$tahun,$selisih);
        }
        $filename = 'laporan_penerimaan_ppks_' . date('Y_m_d_H_i_s') . '.xls';
        // header("Content-Type: application/vnd-ms-excel");
        // header("Content-Disposition: attachment; filename=$filename");

        // Mulai output HTML
        echo "<table border='1'>";
        $no=1;
        echo '<thead>
                <tr>
                    <th width="30" style="vertical-align:middle">NO</th>
                    <th style="text-align:left">Kategori PPKS</th>';
                    for($x=0;$x<=$selisih;$x++){
                    echo '<th style="text-align:left">'.date("F",strtotime(date($tahun."-".($x+1)."-01"))).'</th>';
                    }
                    echo '<th width="5%" style="vertical-align:middle">Total</th>
                </tr>
            <thead/>';
            echo "<tbody>";
            $total_per_bulan=[];    
            foreach ($kategori as $row) {
                echo "<tr>";
                echo "<td>".$no++."</td>";
                echo '<td style="text-align:left">'.$row->kategori.'</td>'; // Ganti </th> menjadi </td>
                $jumlah_per_kategori=0;
                $angka=0;
                foreach ($row->bulan as $x => $bulanx) {
                    $jumlah_per_kategori=$jumlah_per_kategori + $bulanx;
                    $total_per_bulan[$angka]=$total_per_bulan[$angka] + $bulanx;
                    echo '<td style="text-align:left">'.$bulanx.'</td>'; // Ganti $row->date() menjadi date()
                    $angka++;
                }
                echo '<td style="vertical-align:middle">'.$jumlah_per_kategori.'</td>'; // Ganti </th> menjadi </td>
                echo '</tr>';
            }
            echo "<tr>";
                echo "<td>&nbsp;</td>";
                echo "<td>Grand Total</td>";
                for($x=0;$x<=$selisih;$x++){
                    echo '<th style="text-align:left">-</th>';
                }
                echo "<td>&nbsp;</td>";
            echo "</tr>";
            echo "</tbody>";
            
        echo "</table>";
        print "<pre>";
        print_r($total_per_bulan);

        exit;
    }

    public function getPelayanan($kategori,$bulan_awal,$bulan_akhir,$tahun,$selisih){
        for($x=0;$x<=$selisih;$x++){
            $pelayanan[date("F",strtotime(date($tahun."-".($x+1)."-01")))]=Residensial::
                    where('kategori_ppks_id', '=', $kategori)
                    ->whereRaw('MONTH(tgl_penerimaan) = ?', [$x+1])
                    ->whereRaw('YEAR(tgl_penerimaan) = ?', [$tahun])
                    ->count();
        }
        return $pelayanan;
    }
}
