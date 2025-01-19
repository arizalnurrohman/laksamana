<!doctype html>
<html lang="en" data-bs-theme="light" data-bs-theme-color="default" dir="ltr">
    
<!-- Mirrored from templates.iqonic.design/hope-ui/pro/html/dashboard/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jan 2025 14:38:19 GMT -->
<head>
        @include('layout.meta')
        <!-- Favicon -->
        <link rel="shortcut icon" href="https://templates.iqonic.design/hope-ui/pro/html/assets/images/favicon.ico" >
        <!-- Library / Plugin Css Build -->
        <link rel="stylesheet" href="{{ url('assets/css/core/libs.min.css') }}" >
        <!-- Hope Ui Design System Css -->
        <link rel="stylesheet" href="{{ url('assets/css/hope-ui.min1fc6.css?v=4.0.0') }}" >
        <link rel="stylesheet" href="{{ url('assets/css/pro.min1fc6.css?v=4.0.0') }}" >
        <!-- Custom Css -->
        <link rel="stylesheet" href="{{ url('assets/css/custom.min1fc6.css?v=4.0.0') }}" >
        <!-- RTL Css -->
        <link rel="stylesheet" href="{{ url('assets/css/rtl.min1fc6.css?v=4.0.0') }}" >
        <!-- Customizer Css -->
        <link rel="stylesheet" href="{{ url('assets/css/customizer.min1fc6.css?v=4.0.0') }}" >
        <!-- Google Font -->
        <link rel="preconnect" href="https://fonts.googleapis.com/">
        <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet">
        @yield('add-css')
    </head>
    <body class="  ">
        <!-- loader Start -->
        <div id="loading">
        <div class="loader simple-loader">
            {{-- <div class="loader-body">
                <img src="https://templates.iqonic.design/hope-ui/pro/html/assets/images/loader.webp" alt="loader" class="light-loader img-fluid w-25" width="200" height="200">
            </div> --}}
        </div>
        </div>
        <!-- loader END -->
        @include('layout.sidebar')
        <main class="main-content">
            <div class="position-relative  iq-banner ">
            <!--Nav Start-->
                @include('layout.top-navigation')
                @include('layout.nav-header')                    
            <!-- Nav Header Component End -->
            <!--Nav End-->
            </div>
            <div class="content-inner container-fluid pb-0" id="page_layout">
                @yield('content')
            </div>
            <!-- Footer Section Start -->
            <footer class="footer">
                @include('layout.footer')
            </footer>
            <!-- Footer Section End -->
        </main>
        
        <!-- Live Customizer start -->
        <!-- Setting offcanvas start here -->
        <?php /*@include('layout.setting') */ ?>
        <!-- Wrapper End-->
        <!-- Library Bundle Script -->
        <script src="{{ url('assets/js/core/libs.min.js') }}"></script>
        <!-- Plugin Scripts -->
        
        <!-- Slider-tab Script -->
        <script src="{{ url('assets/js/plugins/slider-tabs.js') }}"></script>
       
        <!-- Lodash Utility -->
        <script src="{{ url('assets/vendor/lodash/lodash.min.js') }}"></script>
        <!-- Utilities Functions -->
        <script src="{{ url('assets/js/iqonic-script/utility.min.js') }}"></script>
        <!-- Settings Script -->
        <script src="{{ url('assets/js/iqonic-script/setting.min.js') }}"></script>
        <!-- Settings Init Script -->
        <script src="{{ url('assets/js/setting-init.js') }}"></script>
        <!-- External Library Bundle Script -->
        <script src="{{ url('assets/js/core/external.min.js') }}"></script>
        <!-- Widgetchart Script -->
        <script src="{{ url('assets/js/charts/widgetcharts1fc6.js?v=4.0.0') }}" defer></script>
        <!-- Dashboard Script -->
        <script src="{{ url('assets/js/charts/dashboard1fc6.js?v=4.0.0') }}" defer></script>
        <script src="{{ url('assets/js/charts/alternate-dashboard1fc6.js?v=4.0.0') }}" defer></script>
        <!-- Hopeui Script -->
        <script src="{{ url('assets/js/hope-ui1fc6.js?v=4.0.0') }}" defer></script>
        <script src="{{ url('assets/js/hope-uipro1fc6.js?v=4.0.0') }}" defer></script>
        <script src="{{ url('assets/js/sidebar1fc6.js?v=4.0.0') }}" defer></script>
        <script type="text/javascript">
            
            function loadTabelData(table_id, url, columnNames,datasrc = "0.Members") {
                //contoh penggunaan
                // const columnNames = ['No', 'Kategori', 'Aksi']; // Data kolom yang diinginkan
                // loadTabelData("list-data", "{{route('load_kategorikkps')}}", columnNames);
                // Variabel columns diisi menggunakan looping
                const columns = columnNames.map(columnName => {
                    return { "data": columnName };
                });

                // Inisialisasi DataTable
                $("#" + table_id).DataTable().clear().destroy();
                $("#" + table_id).DataTable({
                    "ajax": {
                        url: url,
                        dataSrc: ''
                    },
                    "dataSrc": datasrc,
                    lengthMenu: [
                        [10, 20, 50, -1],
                        [10, 20, 50, "Semua"],
                    ],
                    columns: columns,
                    bLengthChange: false
                });
            }

        </script>
        @yield('add-js')    
    </body>
<!-- Mirrored from templates.iqonic.design/hope-ui/pro/html/dashboard/blank-page.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Jan 2025 14:38:19 GMT -->
</html>
