@extends ('adminsite.layout')
@section('ContenidoSite-01')
<link href="/chosen/component-chosen.min.css" rel="stylesheet">

 <div class="content-header">
     <ul class="nav-horizontal text-center">
      
      <li>
       <a href="/gestion/elearning"><i class="fa fa-clipboard"></i> Cursos</a>
      </li>
      <li>
       <a href="/gestion/elearning/instructores"><i class="fa fa-cubes"></i> Instructores</a>
      </li>
      <li>
       <a href="/gestion/elearning/version"><i class="fa fa-arrow-circle-up"></i> Versión</a>
      </li>
      <li>
       <a href="/gestion/elearning/competencias"><i class="fa fa-arrow-circle-down"></i> Competencias</a>
      </li>
   
     </ul>
    </div>


                            
                       
                           

                            
            








<div class="container">


  <!-- si se necesita cambiar tamaño de modal agregar modal-lg a la linea 
  <div class="modal-dialog"> por <div class="modal-dialog modal-lg">-->

  <!-- Modal-->
  <div class="modal fade" id="mi_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">
            <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
          </button>
          <h4 class="modal-title" id="myModalLabel">TITULO</h4>
        </div>
        <div class="modal-body" style="padding:30px">
        
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/elearning/crearleccion'))) }}
                                
        <div class="form-group">
         <label for="exampleInputEmail1">Titulo Lección:</label>
          {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
        </div>

        <div class="form-group">
         <label for="exampleInputEmail1">Descripción Lección:</label>
          {{Form::textarea('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
        </div>

        <div class="form-group">
         <label for="exampleInputEmail1">Estado Lección:</label>
          {{ Form::select('estado', [
          '1' => 'Activo',
          '2' => 'Inactivo',
          '3' => 'Suspendido'
          ], null, array('class' => 'form-control')) }}
        </div>

        <div class="form-group">
         <label for="exampleInputEmail1">Url Video:</label>
          {{Form::text('url_video', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
        </div>

        <div class="form-group">
         <label for="exampleInputEmail1">Versión</label>
          <div id="output"></div>
          <select id="optgroup" class="form-control form-control-chosen" name="version[]" data-placeholder="Seleccione Versión" multiple>
           @foreach($version as $versions)
            <option value="{{$versions->version}}">{{$versions->version}} {{$versions->producto}}</option>
           @endforeach
          </select>
        </div>
                                
        {{Form::hidden('curso_id', Request::segment(4), array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
                                    
        {{Form::hidden('leccion_id', '', array('class' => 'form-control','id'=>'comisionId', 'placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
            
       <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="ubmit" class="btn btn-primary">Save changes</button>
      </div>

      {{ Form::close() }}

      </div>
     </div>
    </div>
   </div>
 












<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Creación Tema General</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      <div class="card-body">
       <div class="col-lg-12 card-form__body card-body">
        
        {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/elearning/contenidogeneral'))) }}
                                
        <div class="form-group">
         <label for="exampleInputEmail1">Titulo Lección:</label>
          {{Form::text('titulo', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
        </div>

        <div class="form-group">
         <label for="exampleInputEmail1">Descripción Lección:</label>
          {{Form::textarea('descripcion', '', array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}
        </div>

        <div class="form-group">
         <label for="exampleInputEmail1">Versión</label>
          <div id="output"></div>
           <select id="optgroup" class="form-control form-control-chosen" name="version[]" data-placeholder="Seleccione Versión" multiple>
           @foreach($version as $versions)
            <option value="{{$versions->version}}">{{$versions->version}} {{$versions->producto}}</option>
           @endforeach
           </select>
          </div>
        </div>

        <div class="form-group">
         <label for="exampleInputEmail1">Estado Lección:</label>
          {{ Form::select('estado', [
          '1' => 'Activo',
          '2' => 'Inactivo',
          '3' => 'Suspendido'
          ], null, array('class' => 'form-control')) }}
        </div>

         {{Form::hidden('curso_id', Request::segment(4), array('class' => 'form-control','placeholder'=>'Ingrese descripción', 'maxlength' => '159'))}}

    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="ubmit" class="btn btn-primary">Save changes</button>
      </div>
      {{ Form::close() }}
     </div>
      </div>
    </div>

    </div>
  </div>
</div>








 <!-- Page content -->
                    <div id="page-content">
                        <!-- Courses Header -->
                       
                        <ul class="breadcrumb breadcrumb-top">
                            <li>Pages</li>
                            <li>e-Learning</li>
                            <li><a href="">Intro to HTML5</a></li>
                        </ul>
                        <!-- END Courses Header -->

                        <!-- Main Row -->
                        <div class="row">
                            <div class="col-md-8">
                               <button type="button" class="btn btn-primary ml-lg-3 btn-block mb-3" data-toggle="modal" data-target="#exampleModal">Crear Tema General </button>
                                <!-- Course Widget -->
                                <div class="widget">
                                    <div class="widget-advanced">
                                        <!-- Widget Header -->
                                        @foreach($curso as $curso)
                                        <div class="widget-header text-center themed-background-dark">
                                            <div class="widget-options">
                                               <!-- <button class="btn btn-xs btn-default" data-toggle="tooltip" title="Love it!"><i class="fa fa-heart text-danger"></i></button>
                                               -->
                                            </div>
                                            <h3 class="widget-content-light">
                                            <a href="page_ready_elearning_course_lessons.html">{{$curso->nombre}}</a><br>
                                                <small>Web Design</small>
                                            </h3>
                                        </div>
                                        <!-- END Widget Header -->
                                        
                                        <!-- Widget Main -->
                                        <div class="widget-main">
                                            <a href="javascript:void(0)" class="widget-image-container animation-fadeIn">
                                                <span class="widget-icon themed-background"><i class="fa fa-globe"></i></span>
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-default pull-right">
                                                {{$curso->sum}} Lecciones,
                                                <i class="fa fa-clock-o"></i> 8 hours
                                            </a>
                                            <a href="javascript:void(0)" class="btn btn-sm btn-success">Free with Subscription</a>
                                            <hr>
                                            @endforeach
                                            <!-- Lessons -->
                                            @foreach($contenido as $contenido)
                                            <table class="table table-vcenter">
                                                <thead>
                                                    <tr class="active">
                                                        <th>1.  {{$contenido->titulo}} </th>
                                                        <th class="text-right"><small><em>
                                                          <button data-toggle="modal" data-id="{{$contenido->id}}" href="#mi_modal" class="open-AddBookDialog btn btn-primary"><i class="fa fa-list"></i></button>

                                                        </em></small></th>
                                                    </tr>
                                                </thead>
                                                
                                                <tbody>

                                                   @foreach($lecciones as $leccionesa)
                                                    @if($contenido->id == $leccionesa->general_id)
                                                    <tr>
                                                        <td>1.1 {{$leccionesa->titulo}}</td>
                                                        <td class="text-right">
                                                          <a href="page_ready_elearning_course_lesson.html" class="btn btn-xs btn-default" data-toggle="tooltip" title="Done!">Versión: {{$leccionesa->version}}</a>
                                                          <a href="page_ready_elearning_course_lesson.html" class="btn btn-xs btn-success" data-toggle="tooltip" title="Done!"><i class="fa fa-check"></i></a>

                                                        </td>
                                                    </tr>
                                                    @else
                                                    @endif
                                                    @endforeach
                                                </tbody>
                                            </table>
                                           @endforeach
                                            
                                            <!-- END Lessons -->
                                        </div>
                                        <!-- END Widget Main -->
                                    </div>
                                </div>
                                <!-- END Course Widget -->
                            </div>
                            <div class="col-md-4">
                                <!-- About Block -->
                                <div class="block">
                                    <!-- About Content -->
                                    <div class="block-section">
                                        <a href="page_ready_elearning_course_lesson.html" class="btn btn-lg btn-primary btn-block"><i class="fa fa-play"></i> Start Learning</a>
                                    </div>
                                    <div class="block-section">
                                        <a href="javascript:void(0)" class="btn btn-lg btn-default btn-block"><i class="fa fa-download"></i> Download files</a>
                                    </div>
                                    <!-- END About Content -->
                                </div>
                                <!-- END About Block -->

                                <!-- Share Block -->
                                <div class="block">
                                    <!-- Share Title -->
                                    <div class="block-title">
                                        <h2><strong>Share</strong> Course</h2>
                                    </div>
                                    <!-- END Share Title -->

                                    <!-- Share Content -->
                                    <div class="block-section text-center">
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Facebook"><i class="si si-facebook"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Twitter"><i class="si si-twitter"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Google Plus"><i class="si si-google_plus"></i></a>
                                            <a href="javascript:void(0)" class="btn btn-default" data-toggle="tooltip" title="Pinterest"><i class="si si-pinterest"></i></a>
                                        </div>
                                    </div>
                                    <!-- END Share Content -->
                                </div>
                                <!-- END Share Block -->

                                <!-- Your Account Block -->
                                <div class="block">
                                    <!-- Your Account Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default" data-toggle="tooltip" title="Settings">
                                                <i class="fa fa-cog"></i>
                                            </a>
                                        </div>
                                        <h2><strong>Account</strong> Status</h2>
                                    </div>
                                    <!-- END Your Account Title -->

                                    <!-- Your Account Content -->
                                    <div class="block-section">
                                        <table class="table table-borderless table-striped table-vcenter">
                                            <tbody>
                                                <tr>
                                                    <td class="text-right" style="width: 30%;">
                                                        <img src="img/placeholders/avatars/avatar2.jpg" alt="avatar" class="img-circle">
                                                    </td>
                                                    <td><a href="page_ready_user_profile.html"><strong>John Doe</strong></a><br><em>e-Learner</em></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Account</td>
                                                    <td>
                                                        <strong>Basic</strong> <a href="page_ready_pricing_tables.html">Upgrade?</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-right">Courses</td>
                                                    <td>
                                                        <i class="fa fa-plus fa-fw text-info"></i> <a href="javascript:void(0)"><strong>3</strong> New</a><br>
                                                        <i class="fa fa-heart fa-fw text-danger"></i> <a href="javascript:void(0)"><strong>5</strong> Favorites</a><br>
                                                        <i class="fa fa-check fa-fw text-success"></i> <a href="javascript:void(0)"><strong>10</strong> Completed</a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- END Your Account Content -->
                                </div>
                                <!-- END Your Account Block -->

                                <!-- Most Viewed Courses Block -->
                                <div class="block">
                                    <!-- Most Viewed Courses Title -->
                                    <div class="block-title">
                                        <h2><strong>Most Viewed</strong> Courses</h2>
                                    </div>
                                    <!-- END Most Viewed Courses Title -->

                                    <!-- Most Viewed Courses Content -->
                                    <table class="table table-striped table-vcenter">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Intro to HTML5</a><br>
                                                    <small>Web Design</small>
                                                </td>
                                                <td class="text-center" style="width: 70px;">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Vector Graphics</a><br>
                                                    <small>Design &amp; Illustration</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Using Cinema 4D</a><br>
                                                    <small>3D & Motion Graphics</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Intro to Illustrator</a><br>
                                                    <small>Design &amp; Illustration</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Photoshop for Photographers</a><br>
                                                    <small>Photography</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Learn Javascript in a Month</a><br>
                                                    <small>Code</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Intro to Lightroom</a><br>
                                                    <small>Photography</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Learn CSS3 in a Week</a><br>
                                                    <small>Web Design</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <a href="page_ready_elearning_course_lessons.html">Jquery: The Essentials</a><br>
                                                    <small>Code</small>
                                                </td>
                                                <td class="text-center">
                                                    <div class="btn-group btn-group-xs">
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-shopping-cart"></i></a>
                                                        <a href="javascript:void(0)" class="btn btn-default"><i class="fa fa-heart text-danger"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <!-- END Most Viewed Courses Content -->
                                </div>
                                <!-- END Most Viewed Courses Block -->
                            </div>
                        </div>
                        <!-- END Main Row -->
                    </div>
                    <!-- END Page Content -->

         
              



 <footer>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script>
$(document).on("click", ".open-AddBookDialog", function () {
     var mycomisionId = $(this).data('id');

     $(".modal-body #comisionId").val( mycomisionId );
    $('#exampleModala').modal('show');
});
</script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    document.getElementById('button-image').addEventListener('click', (event) => {
      event.preventDefault();
      window.open('/file-manager/fm-button', 'fm', 'width=900,height=500');
    });
  });
  // set file link
  function fmSetLink($url) {
    document.getElementById('image_label').value = $url;
  }
</script>

    <!-- jQuery -->
    <script src="/lms/assets/vendor/jquery.min.js"></script>
    <!-- Flatpickr -->
    <script src="/lms/assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="/lms/assets/js/flatpickr.js"></script>

    <!-- DateRangePicker -->

     <script src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

  
    <script type="text/javascript">
document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script>

<script type="text/javascript">
    $('.form-control-chosen').chosen();
</script>
 

   
</footer>


@stop