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
use App\Models\LaporanTerminasi;
use App\Models\Perujuk;
class LaporanPPKSTerminasiController extends Controller
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
        
        $terminasi=LaporanTerminasi::where("laksa_tr_laporan_terminasi.id","!=",null);
        $terminasi=$terminasi->leftJoin('laksa_tr_layanan', 'laksa_tr_laporan_terminasi.layanan_id', '=', 'laksa_tr_layanan.id');
        $terminasi=$terminasi->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $terminasi=$terminasi->leftJoin('laksa_ms_sumber_rujukan', 'laksa_tr_layanan.sumber_id', '=', 'laksa_ms_sumber_rujukan.id');
        $terminasi=$terminasi->leftJoin('laksa_ms_kategori_ppks', 'laksa_tr_layanan.kategori_ppks_id', '=', 'laksa_ms_kategori_ppks.id');
        $terminasi=$terminasi->whereRaw('MONTH(tgl_penerimaan) BETWEEN ? AND ?', [$bln_awal, $bln_akhr])->whereRaw('YEAR(tgl_penerimaan) = ?', [$tahun]);
        $terminasi=$terminasi->get();
        $data=$terminasi;
        return view('laporan_ppks_terminasi.index',\compact('data'))->with('no', 1);
    }

    public function download_excel(Request $request){
        $bln_awal=$request->bulan_awal ? $request->bulan_awal : date("m");
        $bln_akhr=$request->bulan_akhir ? $request->bulan_akhir : date("m");
        $tahun   =$request->tahun ? $request->tahun :date("Y");

        $terminasi=LaporanTerminasi::where("laksa_tr_laporan_terminasi.id","!=",null);
        $terminasi=$terminasi->leftJoin('laksa_tr_layanan', 'laksa_tr_laporan_terminasi.layanan_id', '=', 'laksa_tr_layanan.id');
        $terminasi=$terminasi->leftJoin('laksa_ms_ppks', 'laksa_tr_layanan.pasien_id', '=', 'laksa_ms_ppks.id');
        $terminasi=$terminasi->leftJoin('laksa_ms_sumber_rujukan', 'laksa_tr_layanan.sumber_id', '=', 'laksa_ms_sumber_rujukan.id');
        $terminasi=$terminasi->leftJoin('laksa_ms_kategori_ppks', 'laksa_tr_layanan.kategori_ppks_id', '=', 'laksa_ms_kategori_ppks.id');
        $terminasi=$terminasi->whereRaw('MONTH(tgl_penerimaan) BETWEEN ? AND ?', [$bln_awal, $bln_akhr])->whereRaw('YEAR(tgl_penerimaan) = ?', [$tahun]);
        $terminasi=$terminasi->get();

        $filename = 'Laporan PPKS yang sudah diterminasi_' . date('Y_m_d_H_i_s') . '.xls';
            header("Content-Type: application/vnd-ms-excel");
            header("Content-Disposition: attachment; filename=$filename");


        echo "<table border='1'>";
        $no=1;
        $total_per_bulan=[];
        echo "Laporan PPKS yang sudah diterminasi";
        echo "<br>";
        echo '<thead>
                <tr>
                    <th width="30" style="vertical-align:middle">NO</th>
                    <th style="text-align:left">Nama Lengkap</th>
                    <th style="text-align:left">Tanggal Masuk/Penerimaan</th>
                    <th style="text-align:left">Sumber Rujukan</th>
                    <th style="text-align:left">NIK</th>
                    <th style="text-align:left">NO KK</th>
                    <th style="text-align:left">Kategori PPKS</th>
                    <th style="text-align:left">Tanggal Terminasi</th>
                </tr>
              <thead/>';
            echo "<tbody>";
            foreach ($terminasi as $row) {
                echo "<tr>";
                    echo "<td>".$no++."</td>";
                    echo '<td style="text-align:left">'.$row->nama_depan." ".$row->nama_belakang.'</td>';
                    echo '<td style="text-align:left">'.date("d M Y",strtotime($row->tgl_penerimaan)).'</td>';
                    echo '<td style="text-align:left">'.$row->sumber.'</td>';
                    echo '<td style="text-align:left">'.$row->nik.'</td>';
                    echo '<td style="text-align:left">'.$row->nokk.'</td>';
                    echo '<td style="text-align:left">'.$row->kategori.'</td>';
                    echo '<td style="text-align:left">'.date("d M Y",strtotime($row->tgl_terminasi)).'</td>';
                echo '</tr>';
            }
            echo "</tbody>";
        echo "</table>";

        exit;
    }

}
