@extends('layout.master')
@section('title', 'SimpelAsik')
@section('add-css')

@endsection
@section('content')
<div class="row ">
    <div class="col-xl-12 col-lg-12">
        <div class="row">    
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="bg-info text-white rounded p-3">
                            <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="text-end">
                            Resindensial<br>&nbsp;
                                <h2 class="counter" style="visibility: visible;">{{number_format($nilai_total['residensial'])}}</h2>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                         <div class="bg-success text-white rounded p-3">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M12.2744 19.75V4.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M18.299 13.7002L12.275 19.7502L6.25 13.7002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                   
                         </div>
                         <div class="text-end">
                            Perstujuan<br>Kepala
                               <h2 class="counter" style="visibility: visible;">{{number_format($nilai_total['gedungasrama'])}}</h2>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                         <div class="bg-success text-white rounded p-3">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M12.2744 19.75V4.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M18.299 13.7002L12.275 19.7502L6.25 13.7002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                   
                         </div>
                         <div class="text-end">
                            Assessment<br>&nbsp;
                               <h2 class="counter" style="visibility: visible;">{{number_format($nilai_total['gedungasrama'])}}</h2>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                         <div class="bg-success text-white rounded p-3">
                            <svg class="icon-20" xmlns="http://www.w3.org/2000/svg" width="20px" viewBox="0 0 20 20" fill="currentColor">
                               <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path>
                            </svg>
                         </div>
                         <div class="text-end">
                            Rehabilitasi<br>&nbsp;
                               <h2 class="counter" style="visibility: visible;">{{number_format($nilai_total['rehabilitasi'])}}</h2>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card border-bottom border-4 border-0 border-primar">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="bg-warning text-white rounded p-3">
                                <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.87651 15.2063C6.03251 15.2063 2.74951 15.7873 2.74951 18.1153C2.74951 20.4433 6.01251 21.0453 9.87651 21.0453C13.7215 21.0453 17.0035 20.4633 17.0035 18.1363C17.0035 15.8093 13.7415 15.2063 9.87651 15.2063Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M9.8766 11.886C12.3996 11.886 14.4446 9.841 14.4446 7.318C14.4446 4.795 12.3996 2.75 9.8766 2.75C7.3546 2.75 5.3096 4.795 5.3096 7.318C5.3006 9.832 7.3306 11.877 9.8456 11.886H9.8766Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M19.2036 8.66919V12.6792" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M21.2497 10.6741H17.1597" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                            
                            </div>
                            <div class="text-end">
                                PPKS<br>&nbsp;
                                    <h2 class="counter" style="visibility: visible;">{{number_format(($nilai_total['ppks']))}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                         <div class="bg-success text-white rounded p-3">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M12.2744 19.75V4.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M18.299 13.7002L12.275 19.7502L6.25 13.7002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                   
                         </div>
                         <div class="text-end">
                            Gedung Asrama<br>&nbsp;
                               <h2 class="counter" style="visibility: visible;">{{number_format($nilai_total['gedungasrama'])}}</h2>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                         <div class="bg-success text-white rounded p-3">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M12.2744 19.75V4.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M18.299 13.7002L12.275 19.7502L6.25 13.7002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                   
                         </div>
                         <div class="text-end">
                            Terminasi<br>&nbsp;
                               <h2 class="counter" style="visibility: visible;">{{number_format($nilai_total['gedungasrama'])}}</h2>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                   <div class="card-body">
                      <div class="d-flex justify-content-between align-items-center">
                         <div class="bg-success text-white rounded p-3">
                            <svg class="icon-20" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">                                    <path d="M12.2744 19.75V4.75" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                    <path d="M18.299 13.7002L12.275 19.7502L6.25 13.7002" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>                                </svg>                                                   
                         </div>
                         <div class="text-end">
                            Intervensi<br>&nbsp;
                               <h2 class="counter" style="visibility: visible;">{{number_format($nilai_total['gedungasrama'])}}</h2>
                         </div>
                      </div>
                   </div>
                </div>
            </div>
        </div>
        <div class="row">
            
        </div>    
    </div>
</div>
 
@endsection
@section('add-js')

@endsection