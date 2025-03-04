<?php

namespace App\Http\Controllers;

use App\Models\Persyaratan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

use PhpOffice\PhpWord\IOFactory;
use Dompdf\Dompdf;
use Dompdf\Options;

use Mpdf\Mpdf;

use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;
use PhpOffice\PhpWord\TemplateProcessor;


class PersyaratanController extends Controller
{
    // function __construct()
    // {
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
    // }
    public function index()
    {
        if($_GET['convert']=="pdf"){
            // Lokasi LibreOffice
            $libreOfficePath = '"C:\Program Files\LibreOffice\program\soffice.exe"';

            // Lokasi file Word
            $wordFilePath = public_path('storage\template\output.docx');
            // Lokasi folder output
            $outputDirectory = public_path('storage\template');
            // Lokasi file PDF output
            $pdfFilePath = $outputDirectory . '\template_ba.pdf';

            // Cek apakah file Word ada
            if (!file_exists($wordFilePath)) {
                return response()->json(['error' => 'File Word tidak ditemukan!'], 404);
            }

            // Pastikan folder output ada
            if (!is_dir($outputDirectory)) {
                mkdir($outputDirectory, 0777, true);
            }

            // Perintah konversi LibreOffice
            $command = "{$libreOfficePath} --headless --convert-to pdf --outdir \"{$outputDirectory}\" \"{$wordFilePath}\"";
            // $command ='"C:\Program Files\LibreOffice\program\soffice.exe" --headless --convert-to pdf --outdir "E:\xampp\htdocs\projects\laksamana\public\storage\template" "E:\xampp\htdocs\projects\laksamana\public\storage\template\template_ba.docx"';

            // Jalankan proses dengan timeout 120 detik
            // $process = Process::fromShellCommandline($command);
            // $process->setTimeout(120); // Tambahkan timeout agar tidak berhenti mendadak
            // $process->run();
            // if (!$process->isSuccessful()) {
            //     return response()->json([
            //         'error' => 'Gagal mengonversi Word ke PDF!',
            //         'details' => $process->getErrorOutput()
            //     ], 500);
            // }

            $process=exec($command);
            // Cek apakah proses berhasil
            if (!file_exists($pdfFilePath)) {
                return response()->json([
                    'error' => 'Gagal mengonversi Word ke PDF!',
                    'details' => 'File output tidak ditemukan setelah konversi.'
                ], 500);
            }

            return response()->json([
                'message' => 'Konversi berhasil!',
                'pdf_url' => asset('storage/template/template_ba.pdf')
            ]);
        }
        if($_GET['convert']=="word"){
            // Lokasi template Word
            $templatePath = public_path('storage/template/xtemplate.docx');
            
            // Cek apakah template ada
            if (!file_exists($templatePath)) {
                return response()->json(['error' => 'Template tidak ditemukan!'], 404);
            }

            // Membuat TemplateProcessor dari template yang ada
            $templateProcessor = new TemplateProcessor($templatePath);

            // Data untuk menggantikan placeholder
            $data = [
                'name' => 'John Doe',
                'tanggal' => '31 Juli 2024',
                'total' => '1.500.000'
            ];

            // Mengganti placeholder di template dengan data
            $templateProcessor->setValues($data);

            // Lokasi file output yang akan disimpan
            $outputPath = public_path('storage/template/output.docx');

            // Simpan file di folder yang sama dengan nama output.docx
            $templateProcessor->saveAs($outputPath);

            // Cek apakah file berhasil disimpan
            if (!file_exists($outputPath)) {
                return response()->json([
                    'error' => 'Gagal menyimpan file Word!',
                ], 500);
            }

            return response()->json([
                'message' => 'File Word berhasil disimpan!',
                'word_url' => asset('storage/template/output.docx')
            ]);
        }
    }
    public function store(Request $request)
    {
        $request->validate([
            'persyaratan' => 'required|string|max:255',
        ]);

        $lastSort = Persyaratan::max('sort') ?? 0;

        Persyaratan::create([
            'id' => Str::uuid()->toString(),
            'persyaratan' => $request->persyaratan,
            'sort' => $lastSort + 1,
        ]);

        return response()->json(['message' => 'Data berhasil ditambahkan.']);
    }

    public function edit(Request $request)
    {
        $persyaratan = Persyaratan::findOrFail($request->id);
        return response()->json($persyaratan);
    }

    public function update(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:laksa_ms_persyaratan,id',
            'persyaratan' => 'required|string|max:255',
        ]);

        $persyaratan = Persyaratan::findOrFail($request->id);
        $persyaratan->update([
            'persyaratan' => $request->persyaratan,
        ]);

        return response()->json(['message' => 'Data berhasil diperbarui.']);
    }

    public function destroy($id)
    {
        try {
            // Cari dan hapus data
            $persyaratan = Persyaratan::findOrFail($id);
            $persyaratan->delete();

            return response()->json(['message' => 'Data deleted successfully!'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Failed to delete data.'], 500);
        }
    }

    public function load_data()
    {
        $persyaratan = Persyaratan::orderby("sort","asc")->get();
        $no=0;
        foreach ($persyaratan as $val) {
            $data[$no]['No']            =($no+1);
            $data[$no]['Persyaratan']   =$val->persyaratan;
            $data[$no]['Urutan']        =$val->sort;
            $data[$no]['Aksi']          ='<div class="btn-group" role="group" aria-label="Group Aksi">
                                            <button class="btn btn-sm btn-icon btn-warning" Onclick="update_form(\''.$val->id.'\')">
                                                <span class="btn-inner">
                                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" class="icon-20" width="20" height="20" viewBox="0 0 24 24"><path fill-rule="evenodd" clip-rule="evenodd" d="M9.3764 20.0279L18.1628 8.66544C18.6403 8.0527 18.8101 7.3443 18.6509 6.62299C18.513 5.96726 18.1097 5.34377 17.5049 4.87078L16.0299 3.69906C14.7459 2.67784 13.1541 2.78534 12.2415 3.95706L11.2546 5.23735C11.1273 5.39752 11.1591 5.63401 11.3183 5.76301C11.3183 5.76301 13.812 7.76246 13.8651 7.80546C14.0349 7.96671 14.1622 8.1817 14.1941 8.43969C14.2471 8.94493 13.8969 9.41792 13.377 9.48242C13.1329 9.51467 12.8994 9.43942 12.7297 9.29967L10.1086 7.21422C9.98126 7.11855 9.79025 7.13898 9.68413 7.26797L3.45514 15.3303C3.0519 15.8355 2.91395 16.4912 3.0519 17.1255L3.84777 20.5761C3.89021 20.7589 4.04939 20.8879 4.24039 20.8879L7.74222 20.8449C8.37891 20.8341 8.97316 20.5439 9.3764 20.0279ZM14.2797 18.9533H19.9898C20.5469 18.9533 21 19.4123 21 19.9766C21 20.5421 20.5469 21 19.9898 21H14.2797C13.7226 21 13.2695 20.5421 13.2695 19.9766C13.2695 19.4123 13.7226 18.9533 14.2797 18.9533Z" fill="currentColor"></path></svg>
                                                </span>
                                            </button>
                                            <button class="btn btn-sm btn-icon btn-danger"  Onclick="delete_form(\''.$val->id.'\')">
                                                <span class="btn-inner">
                                                    <svg fill="none" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M20.2871 5.24297C20.6761 5.24297 21 5.56596 21 5.97696V6.35696C21 6.75795 20.6761 7.09095 20.2871 7.09095H3.71385C3.32386 7.09095 3 6.75795 3 6.35696V5.97696C3 5.56596 3.32386 5.24297 3.71385 5.24297H6.62957C7.22185 5.24297 7.7373 4.82197 7.87054 4.22798L8.02323 3.54598C8.26054 2.61699 9.0415 2 9.93527 2H14.0647C14.9488 2 15.7385 2.61699 15.967 3.49699L16.1304 4.22698C16.2627 4.82197 16.7781 5.24297 17.3714 5.24297H20.2871ZM18.8058 19.134C19.1102 16.2971 19.6432 9.55712 19.6432 9.48913C19.6626 9.28313 19.5955 9.08813 19.4623 8.93113C19.3193 8.78413 19.1384 8.69713 18.9391 8.69713H5.06852C4.86818 8.69713 4.67756 8.78413 4.54529 8.93113C4.41108 9.08813 4.34494 9.28313 4.35467 9.48913C4.35646 9.50162 4.37558 9.73903 4.40755 10.1359C4.54958 11.8992 4.94517 16.8102 5.20079 19.134C5.38168 20.846 6.50498 21.922 8.13206 21.961C9.38763 21.99 10.6811 22 12.0038 22C13.2496 22 14.5149 21.99 15.8094 21.961C17.4929 21.932 18.6152 20.875 18.8058 19.134Z" fill="currentColor" />
                                                    </svg>
                                                </span>
                                            </button>
                                        </div>';
            $no++;
        }
        return \response()->json($data);
    }
}
