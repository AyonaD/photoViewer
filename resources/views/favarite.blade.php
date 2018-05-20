<!doctype html>
<html lang="{{ app()->getLocale() }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link rel="stylesheet" type="text/css" href="http://www.kawdo.com/ayona/kawdo/css/kawdoco.css">

        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://code.jquery.com/ui/1.11.1/jquery-ui.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
             <a href="/" style="text-decoration: none;">
                 <p style="font-weight: 900; font-size:18px;"> Go To Home Page</p>
             </a>
         </div>
         <div class="container-edit" style="padding-bottom:120px;">
           <div class="col-md-12" style="margin:10px 0 20px 0;">
             <h1 style="text-align:center; color:#e7753f;">Your Favarite Images</h1>
           </div>
           <?php
           foreach ($photo as $pho) {
             if($pho->img_url){ ?>
               <div class="col-md-4" style="border:1px solid black; padding:5px;">
                 <img src=" {{ $pho->img_url }} " class="img-responsive" width="100%" style="height:200px;"/>
                 <div class="col-md-12">
                     <?php
                     if($pho->discription){ ?>
                       <div class="col-md-12" style="margin-top:10px; margin-bottom:10px; padding:0;">
                         <span> {{ $pho->discription }}</span>
                       </div>
                        <div class="col-md-6" style="padding:0;">
                          <a href=""  id="plan" data-toggle="modal" data-target="#myModal" style="text-decoration: none;">
                            <p style="font-weight: 900;">Edit Description</p>
                          </a>
                        </div>
                     <?php }
                     else { ?>
                       <div class="col-md-6" style="padding:0;">
                         <a href=""  id="plan" data-toggle="modal" data-target="#myModal" style="text-decoration: none;">
                           <p style="font-weight: 900;">Add Description</p>
                         </a>
                       </div>

                    <?php }
                    ?>
                   <div class="col-md-6">
                     <form action = "/delete" method = "post">
                        {{ csrf_field()}}
                       <input type="text" name="url" value="{{ $pho->img_url }}" hidden/>
                       <div class="form-group">
                           <button type="submit" class="btn btn-success btn-lg" style="border-radius: 0; font-size: 18px; background-color:#e7753f; border: none; " name="submit" value="submit">Delete</button>
                       </div>
                   </form>
                   </div>
                 </div>
               </div>

               <!-- Modal -->
        <div class="modal fade" id="myModal" role="dialog" style="margin-top: 120px;">
         <div class="modal-dialog modal-lg">
           <div class="modal-content">
             <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal">&times;</button>
             </div>
               <div class="modal-header">
                   <h3 class="text-center">Add Description</h3>
               </div>
             <!--<div class="modal-body">-->
                <form action="/insertDes"  method="post">
                  {{ csrf_field() }}
                  <div class="col-md-6">
                    <img src=" {{ $pho->img_url }} " class="img-responsive" width="100%" style="height:220px;"/>
                  </div>
                  <div class="col-md-6">
                    <div class="col-md-12">
                       <div class="form-group">
                         <textarea class="form-control" name="des" placeholder="Description" rows="8">{{ $pho->discription }}</textarea>
                         <input type="text" name="url" value="{{ $pho->img_url }}" hidden/>
                     </div>
                    </div>
                  </div>
                    <div class="col-md-12 text-center" style="margin-top:20px;">
                         <div class="form-group">
                             <button type="submit" class="btn btn-success btn-lg" style="border-radius: 0; font-size: 18px; background-color:#e7753f; border: none; " name="submit" value="submit">Save</button>
                         </div>
                     </div>

                 </form>

             <!--</div>-->
             <div class="modal-footer">
             </div>
           </div>
         </div>
       </div>
      <!--    model         -->

            <?php }
            else{
              echo "no favarite images";
            }
            }
            ?>
         </div>

       </div>

       <script>

        $( document ).ready(function() {
          $("#add").hide();
        });

        //add favorite image to database
            $(document).on("click", '.add_button1',function (data) {
              $("#plan").hide();
              // $("#add").show();

                var parentTag = $( this).attr('data-value');
                 // console.log(parentTag);

                // $.ajax({
                //     headers: {
                //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                //     type:'POST',
                //     url:'/insert',
                //     // dataType: 'JSON',
                //     data:{url:parentTag},
                //     success:function(){
                //       alert("Sucess");
                //       // $("#parentTag").hide();
                //
                //     }
                // });
            });
       </script>
    </body>
</html>
