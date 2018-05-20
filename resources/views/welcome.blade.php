<!doctype html>
<html lang="en">
<meta name="csrf-token" content="{{ csrf_token() }}">
<head>
  <meta charset="utf-8">
  <title>Small Photo Applications</title>
  <link rel="stylesheet" type="text/css" href="http://www.kawdo.com/ayona/kawdo/css/kawdoco.css">

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>

</head>
<style>
.left_div{
  height:180px;
   width:120px;
   border-radius: 90px 0 0 90px;
   background:#e7753f;
   position: fixed;right: 0;
   top: 40%;
   padding: 20px 0 0 10px;
   color: #fff;
   font-weight: 600;
   z-index: 10;
}
</style>
<body>
<div class="container-edit-fluid" style="background-image: url('back.jpg'); background-repeat: no-repeat; background-attachment: fixed; background-size: cover;">
  <div class="left_div" style="padding:40px 0px 0px 40px;">
      <a href="/favarite" style="text-decoration: none;">
          <p style="font-weight: 900; font-size:18px;"> See favarite Photo</p>
      </a>
  </div>
<div class="container-edit" style="padding-bottom:30px;">
  <div class="col-md-12" style="margin:10px 0 20px 0;">
    <h1 style="text-align:center; color:#e7753f;">Images From Flicker</h1>
  </div>
  <div class="pictures">
  </div>
</div>
</div>
<script>
(function() {
  var flickerAPI = "https://api.flickr.com/services/feeds/photos_public.gne?jsoncallback=?";
  $.getJSON( flickerAPI, {
    tags: "flower",
    tagmode: "any",
    format: "json"
  })
    .done(function( data ) {
      $.each( data.items, function( i, item ) {

        // $('.pictures').append('<div class="item"><div class="item_description"><span><a  data-value="' + item.media.m + '" type="button"  class="btn btn-primary btn-sm align-right add_button">Add as favorite</a></span></div><img src="' + item.media.m + '" style="float: left; height: 12em; margin-right: 1%; margin-bottom: 0.5em;"/></div>');
        $('.pictures').append('<div class="col-md-3" style="border:1px solid black; padding:5px;" id="'+item.media.m+'"><img src="' + item.media.m + '" class="img-responsive" width="100%" style="height:200px;"/><div class="col-md-12"><span><a data-value="' + item.media.m + '" type="button" class="btn btn-primary add_button">Add as favorite</a></span></div></div>');

        // $( "<img>" ).attr( "src", item.media.m ).appendTo( "#images" );
        // $('.pictures').append('<div class="item"><img src="' + item.media.m + '" style="float: left; height: 12em; margin-right: 1%; margin-bottom: 0.5em;"/></div>');

        if ( i === 20 ) {
          return false;
        }
      });
    });

    //add favorite image to database
        $(document).on("click", '.add_button',function (data) {

            var parentTag = $( this).attr('data-value');
             // console.log(parentTag);

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                type:'POST',
                url:'/insert',
                // dataType: 'JSON',
                data:{url:parentTag},
                success:function(){
                  alert("Sucess");
                  // $("#parentTag").hide();

                }
            });
        });

})();

</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script src="https://www.jqueryscript.net/demo/Responsive-Justified-Gallery-jQuery-TJ-gallery/jquery-tjgallery.min.js"></script> -->
</body>
</html>
