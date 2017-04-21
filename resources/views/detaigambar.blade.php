<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      
      <meta httpequiv="XUACompatible" content="IE=edge">
      
      <title>MyGaleri</title>
      <link href='http://fonts.googleapis.com/css?family=Oxygen' rel='stylesheet' type='text/css'>
      
      <link href="/assets/css/material-design/ripples.css" rel="stylesheet" />
      <link href="/assets/css/custom/layout.css" rel="stylesheet" />
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
      <style type="text/css">::selection{background-color:#E13300;color:#fff}::-moz-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:16px/24px normal Oxygen,sans-serif;color:#4F5155}a{color:#039;background-color:transparent;font-weight:400}h1{color:#444;background-color:transparent;border-bottom:1px solid #D0D0D0;font-size:19px;font-weight:400;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;border:1px solid #D0D0D0;color:#002166;display:block;margin:14px 0;padding:12px 10px}#body{margin:0 15px}p.footer{text-align:right;font-size:11px;border-top:1px solid #D0D0D0;line-height:32px;padding:0 10px;margin:20px 0 0}#container{margin:10px;border:1px solid #D0D0D0;box-shadow:0 0 8px #D0D0D0}
         
         .grid:{
           background: transparent;
           max-width: 1200px;
         }

         /* clearfix */
         .grid:after {

           content: '';
           display: block;
           clear: both;
         }


         /* ---- grid-item ---- */

         .grid-item {
           width: 160px;
           height: 120px;
           float: left;
           background: transparent;
         border-radius: 10px;
         }
         .grid-item--gigante {
           width: 320px;
           height: 360px;
         }

         .grid-item:hover {
           background: transparent;
           border-color: white;
           cursor: pointer;
         }
         </style>
   </head>

   <body style="padding-top:30px;">
      @include('layouts.headnav')
      
        <div class="row">
   @if(count($images) > 0)
         <div class="col-md-12 text-center" >
            <a href="{{ url('/image/create') }}" class="btn btn-primary" role="button">
               Add New Image
            </a>
            <a href="{{ url('/image/detailgambar') }}" class="btn btn-primary" role="button">
               Detail Gambar
            </a>

            
            @include('error-notification')
         </div><br>
      @endif
   <p><br>

   <div class="grid">
     
      @forelse($images as $image)

         <div class="grid-item">
            <div class="thumbnail">

               <img src="{{asset($image->file)}}" />
                  <h4>{{$image->caption}}</h4>
                  <p><h6>{!! substr($image->description, 0,100) !!}</h6></p>
                  <p>
                     <div class="row text-center" style="padding-left:1em;">
                     <a href="{{ url('/image/'.$image->id.'/edit') }}" class="btn btn-warning pull-left">Edit</a>
                     <span class="pull-left">&nbsp;</span>
                     {!! Form::open(['url'=>'/image/'.$image->id, 'class'=>'pull-left']) !!}
                        {!! Form::hidden('_method', 'DELETE') !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger', 'onclick'=>'return confirm(\'Are you sure?\')']) !!}
                     {!! Form::close() !!}
                     </div>
                  </p>
            </div>
         </div>
      @empty
         <p>No images yet, <a href="{{ url('/image/create') }}">add a new one</a>?</p>
      @endforelse
   
   </div></p>
</div>
   <div align="center">{!! $images->render() !!}</div>
  
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
      <script src="/assets/js/masonry.pkgd.min.js"></script>

      <script type="text/javascript">
         var $grid = $('.grid').masonry({
  itemSelector: '.grid-item',
  columnWidth: 160
});

$grid.on( 'click', '.grid-item', function() {
  // change size of item via class
  $( this ).toggleClass('grid-item--gigante');
  // trigger layout
  $grid.masonry();
});

$grid.on( 'layoutComplete', function( event, laidOutItems ) {
  console.log( 'Masonry layout complete with ' + laidOutItems.length + ' items' );
});

      </script>  
      <script src="/assets/js/bootstrap/bootstrap.js"></script>

      <script src="/assets/js/material-design/material.js"></script>

      <script src="/assets/js/material-design/ripples.js"></script>

      <script src="/assets/js/custom/layout.js"></script>
   </body>
</html>