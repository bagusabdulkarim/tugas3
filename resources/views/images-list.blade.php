@extends('global-layout')

@section('body')
<div class="row">
      @if(count($images) > 0)
         <div class="col-md-12 text-center" >
            <a href="{{ url('/image/create') }}" class="btn btn-primary" role="button">
               Add New Image
            </a>
            <hr />
            @include('error-notification')
         </div>
      @endif
      @forelse($images as $image)
            <div class="col-lg-12">
        
            <div class="item">
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                   <div align="center"><b>Tittle :</b>{{$image->caption}}</div> 
                  <a class="thumbnail" href="#" data-image-id="{{asset($image->id)}}" data-toggle="modal" data-title="{{$image->caption}}" data-caption="{!! substr($image->description, 0,100) !!}" data-image="{{asset($image->file)}}" data-href="{{ url('/image/'.$image->id.'/edit') }}"  data-href1="{{ url('/image/'.$image->id) }}" data-target="#image-gallery">                 
                      <img class="img-responsive" src="{{asset($image->file)}}">
                  </a>
                  <div class="caption" align="center">
                  <p>{!! substr($image->description, 0,100) !!}</p>
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
            </div>      
      </div>
      @empty
         <p>No images yet, <a href="{{ url('/image/create') }}">add a new one</a>?</p>
      @endforelse

               <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
             <div class="modal-dialog">
                 <div class="modal-content" >
                     <div class="modal-header">
                         <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                         <h4 class="modal-title" id="image-gallery-title" align="center">
                     </div>
                     <div class="modal-body" align="center">
                         <img id="image-gallery-image" class="img-responsive" src=""> 
                     </div>
                     <div class="modal-footer">

                         <div class="col-md-2 pull-left">
                             <button type="button" class="btn btn-primary" id="show-previous-image">Previous</button>
                         </div>

                        

                         <div class="col-md-2 pull-right">
                             <button type="button" id="show-next-image" class="btn btn-default">Next</button>
                         </div>                         
                     </div>
                 </div>
             </div>
         </div>

</div>


  
   <div align="center">{!! $images->render() !!}</div>
   @stop

