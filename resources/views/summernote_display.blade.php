<!DOCTYPE html>
<html>
<head>
  @include('admin.template.head')
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('admin.template.header')

    <!-- Left side column. contains the logo and sidebar -->
    {{-- @include('admin.template.sidebar-left') --}}

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <h1>
          Dashboard
          <small>Control panel</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>
      </section>

      <!-- Main content -->
      
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h4>List Template</h4>
                  <ul>
                    @foreach( $summernote as $summernote)
                    <li>{{ $summernote->tipe }}
                      <button class="btn btn-xs btn-warning" onclick="summernoteupdate('{{$summernote->id}}')">Edit</button>
                    </li>
                    @endforeach
                  </ul>
              </div>
            </div>
          </div>
        </div>
    </section>
    <section class="content">
        <div class="row">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h4>List coba</h4>
              </div>
                  <form class="form-horizontal" method="POST" action="{{url('/summernote/update/'.$summernote->id)}}"
                      enctype="multipart/form-data" id="fsummernote">
                    {{ method_field('PUT') }}
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Tipe</label>
                        <div class="col-sm-10">
                            <input type="text" name="tipe" class="form-control" placeholder="Tipe" value="{{$summernote->tipe}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Konten</label>
                        <div class="col-sm-10">
                            <textarea id="konten_editor" name="konten" class="form-control summernote"
                                      placeholder="Konten">woke</textarea>
                        </div>
                    </div>

                    <div class="box-footer text-right">
                        <a href="{{URL::previous()}}" class="btn btn-default">Batal</a>
                        <button type="submit" class="btn btn-danger">Simpan</button>
                    </div>
                </form>
            </div>
          </div>
        </div>
    </section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->
@include('admin.template.footer')

<!-- Control Sidebar -->
@include('admin.template.sidebar-right')
<!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
   immediately after the control sidebar -->
   <div class="control-sidebar-bg"></div>
 </div>
 <!-- ./wrapper -->

 <!-- jQuery 3 -->
 @include('admin.template.setting')
 <!-- include libraries(jQuery, bootstrap) -->
 <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
 <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 
 
 <!-- include summernote css/js-->
 <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
 <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>    
 


<script type="text/javascript">
  $(document).ready(function() {
            //initialize summernote
            $('.summernote').summernote();
            //assign the variable passed from controller to a JavaScript variable.
            var content = {!! json_encode($summernote->content) !!};
            //set the content to summernote using `code` attribute.
            $('.summernote').summernote('code', content);
        });

</script>
</body>
</html>
