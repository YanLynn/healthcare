<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/myJs.js') }}" defer></script>
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script> -->
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.5.13/vue.js"></script>
<!-- Include after Vue (before closing body) -->
<script src="https://unpkg.com/vue-fullpage.js/dist/vue-fullpage.min.js"></script>
<!-- <script src="{{asset('js/vue.js')}}"></script>
<script src="{{asset('js/vue-scrollto.js')}}"></script> -->
<!-- Fonts -->
<!-- <link rel="dns-prefetch" href="//fonts.gstatic.com"> -->
<!--mailbox-->
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.scrolling-tabs.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/fullpage.js/dist/fullpage.min.css">
<!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css"> -->
    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
    </style>
<!-- link for editor -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<!-- end link for editor -->
</head>
<body>
<div id="app">
  <index></index>
</div>







<script src="/js/app.js" type="text/javascript"></script>

  <!-- script for editor -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

  <!-- end script for editor -->



<script src="{{ asset('js/jssor.slider-27.5.0.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.scrolling-tabs.min.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/adsslider.js') }}" type="text/javascript"></script>

<script src="{{ asset('js/jquery.dataTables.min.js') }}" type="text/javascript"></script>

<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


<script type="text/javascript">

 $(document).ready(function() {



    // $('.DataTable').DataTable();
    var csrf = "{{ csrf_token() }}";

    $.ajax({
        url: '/api/advertisement/ads',
        type: 'GET',
        data: {'_token': csrf},
        success: function( data ) {
            // console.log(data);
            var top_ad = "";
            var side_ad = "";
            for (var i = 0; i < data.length; i++) {
                if(data[i].location.includes("topbar") ) {
                    top_ad += '<div class="list-group-item adslist-card"><a href="' + data[i].link + '"><div class="slide-img"><img class="img-fluid ads-img" src="/upload/advertisement/' + data[i].photo + '" /></div><h3 class="smallads-title">' + data[i].title + '</h3></a></div>';
                    if(data[i].location.includes("sidebar")) {
                        side_ad += '<div><a href="' + data[i].link + '"><img data-u="image" style="width:100%" src="/upload/advertisement/' + data[i].photo + '" /><div class="side_slider_lbl"><p>' + data[i].title + '</p></div></a></div>';
                    }
                }
                else if(data[i].location.includes("sidebar"))  {
                    side_ad += '<div><a href="' + data[i].link + '"><img data-u="image" style="width:100%" src="/upload/advertisement/' + data[i].photo + '" /><div class="side_slider_lbl"><p>'+ data[i].title +'</p></div></a></div>';
                }

            }
            $(".top-ad-slider").html(top_ad);
            jssor_1_slider_init();
            $(".side-ad-slider").html(side_ad);
            // jssor_slider2_init();
        }
    });
});
</script>
</body>
</html>