@extends ('adminsite.layout')

@section('ContenidoSite-01')

 <div class="content-header">
     <ul class="nav-horizontal text-center">
      
      <li>
       <a href="/gestion/elearning"><i class="fa fa-clipboard"></i> Cursos</a>
      </li>
      <li>
       <a href="/gestion/elearning/crear-curso"><i class="fa fa-clipboard"></i> Crear Curso</a>
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


<div class="container mt-5">
 

  <?php $status=Session::get('status');?>
    @if($status=='ok_create')
      <div class="alert alert-success">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Curso registrada con exito</strong> SD ...
      </div>
    @endif

    @if($status=='ok_delete')
      <div class="alert alert-danger">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Curso eliminada con exito</strong> DS ...
      </div>
    @endif

    @if($status=='ok_update')
      <div class="alert alert-warning">
       <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
       <strong>Curso actualizada con exito</strong> SD ...
      </div>
    @endif
   

@foreach($cursos as $curso)
<!-- Course Widget -->
                                    <div class="col-sm-6">
                                        <div class="widget">
                                            <div class="widget-advanced">
                                                <!-- Widget Header -->
                                                <div class="widget-header text-center themed-background-dark-fire">
                                                    <div class="widget-options">
                                                        <button class="btn btn-xs btn-default" data-toggle="tooltip" title="Love it!"><i class="fa fa-heart text-danger"></i></button>
                                                    </div>
                                                    <h3 class="widget-content-light">
                                                        <a href="page_ready_elearning_course_lessons.html" class="themed-color-fire">{{$curso->nombre}}</a><br>
                                                        <small>Photography</small>
                                                    </h3>
                                                </div>
                                                <!-- END Widget Header -->

                                                <!-- Widget Main -->
                                                <div class="widget-main">
                                                    <a href="page_ready_elearning_course_lessons.html" class="widget-image-container animation-fadeIn">
                                                        <span class="widget-icon themed-background-fire"><i class="gi gi-camera"></i></span>
                                                    </a>
                                                    <a href="page_ready_elearning_course_lessons.html" class="btn btn-sm btn-default pull-right">
                                                        19 lessons,
                                                        <i class="fa fa-clock-o"></i> 18 hours
                                                    </a>
                                                    <a href="/gestion/elearning/eliminar/{{$curso->id}}" class="btn btn-sm btn-danger"><i class="fa fa-trash fa-fw"></i></a>
                                                    <a href="/gestion/elearning/editarcurso/{{$curso->id}}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o"></i></a>
                                                    <a href="/gestion/elearning/general/{{$curso->id}}" class="btn btn-sm btn-success"><i class="fa fa-bars"></i></a>
                                                </div>
                                                <!-- END Widget Main -->
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END Course Widget -->
@endforeach

	<div class="row">
@foreach($cursos as $curso)

  <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">

                                <div class="d-flex flex-column flex-sm-row">
                                    <a href="#" class="avatar mb-3 w-xs-plus-down-100 mr-sm-3">
                                        <img src="{{$curso->imagen}}" alt="Card image cap" class="avatar-course-img">
                                    </a>
                                    <div class="flex" style="min-width: 200px;">

                                        <div class="d-flex">
                                            <div>
                                                <h5 class="card-title mb-1"><b>{{$curso->nombre}}</b></h5>
                                                <p style="text-transform: capitalize; text-align: justify; color: red">{!!substr($curso->descripcion, 0, 160)!!} ...</p>
                                            </div>
                                            <div class="dropdown ml-auto">
                                                <a href="#" class="dropdown-toggle text-muted" data-caret="false" data-toggle="dropdown">
                                                    <i class="material-icons">more_vert</i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="/gestion/elearning/editarcurso/{{$curso->id}}">Editar Curso</a>
                                                    <a class="dropdown-item" href="/gestion/elearning/general/{{$curso->id}}">Contenido</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="/gestion/elearning/eliminar/{{$curso->id}}">Eliminar</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="d-flex align-items-end">
                                            <div class="d-flex flex flex-column mr-3">
                                                <div class="d-flex align-items-center py-2 border-bottom">
                                                    @if($curso->inversion == '')
                                                    <span class="badge badge-vuejs mr-2">GRATIS</span>
                                                    @else
                                                    <span class="badge badge-dark mr-2">$ {{ number_format($curso->inversion, 2) }}</span>
                                                    @endif
                                                    <small class="text-muted ml-auto">{{$curso->lecciones}} Lecciones - {{$curso->tiempo}}</small>
                                                </div>
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>

</div>
</div>
</div>


@endforeach

</div>
<div class="text-center">
  {{ $cursos->links() }}
</div>
</div>


                                
   <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>


@stop