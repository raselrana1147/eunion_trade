@extends("layouts.admin")
@section("title","Admin | Customer Location")
@section('css')
  <link rel="stylesheet" type="text/css" href="{{ asset('assets/backend/style/css/example.css') }}">
@endsection
@section("breadcrumb","Customer Location")
@section("content")
  <a href="javascript:history.back();" class="btn btn-primary btn-icon float-right mb-2"> <span class="btn-icon-label"><i class="fas fa-arrow-left mr-2"></i></span>Back</a><br><br><br>
<div>
  <div id="map"></div>
</div>
@endsection
@section('js')

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script src="{{ asset('assets/backend/style/js/gmap.js') }}"></script>

  <script type="text/javascript">
    var map;
    $(document).ready(function(){
      
      map = new GMaps({
        el: '#map',
        lat: <?php echo $order->latitude;?>,
        lng: <?php echo $order->longitude;?>,
         zoom:19
      });
      map.addMarker({
        lat: <?php echo $order->latitude;?>,
        lng: <?php echo $order->longitude;?>,
        title: 'Lima',
        zoom:19
       
      });
    
    });
  </script>

@endsection()