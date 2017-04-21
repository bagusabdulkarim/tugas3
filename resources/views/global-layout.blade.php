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
      <style type="text/css">::selection{background-color:#E13300;color:#fff}::-moz-selection{background-color:#E13300;color:#fff}body{background-color:#fff;margin:40px;font:16px/24px normal Oxygen,sans-serif;color:#4F5155}a{color:#039;background-color:transparent;font-weight:400}h1{color:#444;background-color:transparent;border-bottom:1px solid #D0D0D0;font-size:19px;font-weight:400;margin:0 0 14px;padding:14px 15px 10px}code{font-family:Consolas,Monaco,Courier New,Courier,monospace;font-size:12px;background-color:#f9f9f9;border:1px solid #D0D0D0;color:#002166;display:block;margin:14px 0;padding:12px 10px}#body{margin:0 15px}p.footer{text-align:right;font-size:11px;border-top:1px solid #D0D0D0;line-height:32px;padding:0 10px;margin:20px 0 0}#container{margin:10px;border:1px solid #D0D0D0;background: #DDD;max-width: 1000px;box-shadow:0 0 8px #D0D0D0}
         .modal-footer {
    min-height:150px;
}
#image-gallery-link {
    clear:both;
    width:100%;
    text-align:center;
    padding:0px;
    margin:0px;
}
#image-gallery-caption {
    max-width:60%;
    text-align:center;
}

           
         </style>
   </head>

   <body style="padding-top:30px;">
      @include('layouts.headnav')
        <p> @yield('body')
  
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.js"></script>
      <script src="/assets/js/masonry.pkgd.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function(){

    loadGallery(true, 'a.thumbnail');

    //This function disables buttons when needed
    function disableButtons(counter_max, counter_current){
        $('#show-previous-image, #show-next-image').show();
        if(counter_max == counter_current){
            $('#show-next-image').hide();
        } else if (counter_current == 1){
            $('#show-previous-image').hide();
        }
    }

    /**
     *
     * @param setIDs        Sets IDs when DOM is loaded. If using a PHP counter, set to false.
     * @param setClickAttr  Sets the attribute for the click handler.
     */

    function loadGallery(setIDs, setClickAttr){
        var current_image,
            selector,
            counter = 0;
$(document).keydown(function(e){
       var code = e.keyCode || e.which;
       switch (code){
          case 37:
          if(current_image==1){
            current_image=1;
          } else{
            current_image--;
          }               
          break;
          case 39:          
         current_image++;         
          break;
          default: return;
       }
        selector = $('[data-image-id="'+ current_image +'"]');
          updateGallery(selector);
          console.log(selector);
           e.preventDefault();
          
  });
        $('#show-next-image, #show-previous-image').click(function(){
            if($(this).attr('id') == 'show-previous-image'){
                current_image--;
            } else {
                current_image++;
            }

            selector = $('[data-image-id="' + current_image + '"]');
            updateGallery(selector);
        });

        function updateGallery(selector) {
            var $sel = selector;
            current_image = $sel.data('image-id');
            $('#image-gallery-caption').text($sel.data('caption'));
            $('#image-gallery-title').text($sel.data('title'));
            $('#image-gallery-image').attr('src', $sel.data('image'));
            $('#image-gallery-link a').text('Edit');
            $('#image-gallery-link a').attr('href', $sel.data('href'));
            $('#image-gallery-link1 a').text($sel.data('href1'));
            $('#image-gallery-link1 a').attr('href', $sel.data('href1'),'DELETE');
            disableButtons(counter, $sel.data('image-id'));
        }

        if(setIDs == true){
            $('[data-image-id]').each(function(){
                counter++;
                $(this).attr('data-image-id',counter);
            });
        }
        $(setClickAttr).on('click',function(){
            updateGallery($(this));
        });
    }
});

      </script>  
      <script src="/assets/js/bootstrap/bootstrap.js"></script>

      <script src="/assets/js/material-design/material.js"></script>

      <script src="/assets/js/material-design/ripples.js"></script>

      <script src="/assets/js/custom/layout.js"></script>
   </body>
</html>