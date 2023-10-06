@extends ('adminsite.layout')

@section('ContenidoSite-01')
<link href="/chosen/component-chosen.min.css" rel="stylesheet">
<!-- Header Layout Content -->

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




       


    <!-- Flatpickr -->
    <link type="text/css" href="/lms/assets/css/vendor-flatpickr.css" rel="stylesheet">
    <link type="text/css" href="/lms/assets/css/vendor-flatpickr.rtl.css" rel="stylesheet">
    <link type="text/css" href="/lms/assets/css/vendor-flatpickr-airbnb.css" rel="stylesheet">
    <link type="text/css" href="/lms/assets/css/vendor-flatpickr-airbnb.rtl.css" rel="stylesheet">

    <!-- DateRangePicker -->
    <link type="text/css" href="/lms/assets/vendor/daterangepicker.css" rel="stylesheet">




     <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 col-lg-offset-1 col-md-offset-1 col-sm-offset-1 col-xs-offset-1 topper">

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página registrada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página eliminada con exito</strong> US ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Página actualizada con exito</strong> US ...
      </div>
    @endif
   
 </div>




<div class="container">
  <div class="row">
                            <div class="col-md-12">
                                <!-- Basic Form Elements Block -->
                                <div class="block">
                                    <!-- Basic Form Elements Title -->
                                    <div class="block-title">
                                        <div class="block-options pull-right">
                                            <a href="javascript:void(0)" class="btn btn-alt btn-sm btn-default toggle-bordered enable-tooltip" data-toggle="button" title="Toggles .form-bordered class">No Borders</a>
                                        </div>
                                        <h2><strong>Crear</strong> Página</h2>
                                    </div>
                                    <!-- END Form Elements Title -->
                                
                                    {{ Form::open(array('method' => 'POST','class' => 'form-horizontal','id' => 'defaultForm1', 'url' => array('gestion/elearning/crearcurso'))) }}
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-text-input">Nombre Curso</label>
                                            <div class="col-md-9">
                                                {{Form::text('nombre', '', array('class' => 'form-control','placeholder'=>'Ingrese nombre curso','maxlength' => '50' ))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-email-input">Estado Curso</label>
                                            <div class="col-md-9">
                                                  {{ Form::select('estado', [
                                                 '1' => 'Activo',
                                                 '2' => 'Inactivo',
                                                 '3' => 'Suspendido'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-password-input">Visualización Curso</label>
                                            <div class="col-md-9">
                                                {{ Form::select('vista', [
                                                 '1' => 'Privado',
                                                 '2' => 'Público'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Modalidad Curso</label>
                                            <div class="col-md-9">
                                               {{ Form::select('modalidad', [
                                                 '1' => 'Vitual',
                                                 '2' => 'Presencial',
                                                 '3' => 'Semipresencial'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div> 
                                      

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Lugar Curso / Enlace Curso</label>
                                            <div class="col-md-9">
                                                  {{Form::text('lugar', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Valor Curso </label>
                                            <div class="col-md-9">
                                                  {{Form::text('inversion', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Genera Certificado</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('certificado', [
                                                 '1' => 'Si',
                                                 '2' => 'No'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Idioma</label>
                                            <div class="col-md-9">
                                                 {{ Form::select('idioma', [
                                                 '1' => 'Inglés',
                                                 '2' => 'Español'
                                                 ], null, array('class' => 'form-control')) }}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Horarios Curso</label>
                                            <div class="col-md-9">
                                                {{Form::text('horario', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Intensidad Horaria</label>
                                            <div class="col-md-9">
                                                  {{Form::text('duracion', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Email</label>
                                            <div class="col-md-9">
                                                 {{Form::text('correo', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Imagen</label>
                                            <div class="col-md-9">
                                                  <div class="input-group">
                                            <input type="text" id="image_label" class="form-control" name="imagen" placeholder="Seleccionar imagen" aria-label="Image" aria-describedby="button-image">
                                            <span class="input-group-btn"><button class="btn btn-primary" type="button" id="button-image">Seleccionar imagen</button></span>
                                           </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Programas / Enlace Curso</label>
                                            <div class="col-md-9">
                                                  <div id="output"></div>
                                    <select id="optgroup" class="form-control form-control-chosen" name="programa[]" data-placeholder="Seleccione Competencia" multiple>
                                    @foreach($programas as $programass)
                                     <option value="{{$programass->id}}">{{$programass->programa}}</option>
                                    @endforeach
                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Hábildiades que desarrolla</label>
                                            <div class="col-md-9">
                                                  <div id="output"></div>
                                    <select id="optgroup" class="form-control form-control-chosen" name="competencia[]" data-placeholder="Seleccione Competencia" multiple>
                                    @foreach($competencias as $competenciass)
                                     <option value="{{$competenciass->id}}">{{$competenciass->competencia}}</option>
                                    @endforeach
                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Instructores</label>
                                            <div class="col-md-9">
                                                    <div id="output"></div>
                                    <select id="optgroup" class="form-control form-control-chosen" name="instructor[]" data-placeholder="Seleccione Instructor" multiple>
                                    @foreach($instructores as $instructores)
                                     <option value="{{$instructores->id}}">{{$instructores->nombres}} {{$instructores->apellidos}}</option>
                                    @endforeach
                                    </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Cantidad Lecciones</label>
                                            <div class="col-md-9">
                                                  {{Form::number('lecciones', '', array('class' => 'form-control','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Fecha Curso</label>
                                            <div class="col-md-9">
                                                  {{Form::text('fecha', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','data-toggle'=>'flatpickr','data-flatpickr-mode'=>'range','data-flatpickr-date-format'=>'y-m-d'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Url / Enlace (Curso Externo)</label>
                                            <div class="col-md-9">
                                                 {{Form::text('enlace', '', array('class' => 'form-control','id'=>'flatpickrSample02','placeholder'=>'Ingrese palabras clave','maxlength' => '150', 'min' => '0'))}}
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Descripción Curso</label>
                                            <div class="col-md-9">
                                                  {{Form::textarea('descripcion', '', array('class' => 'ckeditor','id' => 'editor1','placeholder'=>'Ingrese descripción'))}}
                                            </div>
                                        </div>

                                         <div class="form-group">
                                            <label class="col-md-3 control-label" for="example-textarea-input">Alcane Curso</label>
                                            <div class="col-md-9">
                                                 {{Form::textarea('alcance', '', array('class' => 'ckeditor','id' => 'editor','placeholder'=>'Ingrese alcance'))}}
                                            </div>
                                        </div>
                                        <div class="form-group form-actions">
                                            <div class="col-md-9 col-md-offset-3">
                                                <button type="submit" class="btn btn-sm btn-primary"><i class="fa fa-angle-right"></i> Submit</button>
                                                <button type="reset" class="btn btn-sm btn-warning"><i class="fa fa-repeat"></i> Reset</button>
                                            </div>
                                        </div>
                                    {{ Form::close() }}
                                    <!-- END Basic Form Elements Content -->
                                    
                                </div>
                                <!-- END Basic Form Elements Block -->
                            </div>
                          </div>
                          
</div>





<footer>

<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>

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
  <script src="/lms/assets/vendor/flatpickr/flatpickr.min.js"></script>
    <script src="/lms/assets/vendor/jquery.min.js"></script>
    
  
    <script src="/lms/assets/js/flatpickr.js"></script>


     <script src="//harvesthq.github.io/chosen/chosen.jquery.js"></script>

  
    <script type="text/javascript">
document.getElementById('output').innerHTML = location.search;
$(".chosen-select").chosen();
</script>

<script type="text/javascript">
    $('.form-control-chosen').chosen();
</script>
 

<script src="https://cdn.ckeditor.com/4.11.2/full/ckeditor.js"></script>

<script>
  CKEDITOR.replace( 'editor', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
</script>
   
</footer>

@stop