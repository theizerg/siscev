@extends('layouts.admin')
@section('title', 'Inicio')
@section('content')

 @if ( Auth::user()->hasRole('Administrador'))
  <div class="container">
      <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box blue darken-3 text-white">
              <div class="inner">
                <h3>{{ App\Models\User::count() }}</h3>

                <p>Usuarios registrados.</p>
              </div>
                <div class="icon">
                   <i class="fas fa-user-tie"></i>
                </div>
                </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box green darken-3 text-white">
                  <div class="inner">
                    <h3>{{Spatie\Permission\Models\Role::count()}}</h3>

                    <p>Roles registrados.</p>
                  </div>
                    <div class="icon">
                       <i class="fas fa-lock"></i>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box purple darken-3 text-white">
                  <div class="inner">
                    <h3>{{Spatie\Permission\Models\Permission::count()}}</h3>

                    <p>Permisos registrados.</p>
                  </div>
                    <div class="icon">
                       <i class="fas fa-lock-open"></i>
                    </div>
              </div>
          </div>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box orange darken-3 text-white">
                  <div class="inner">
                    <h3> {{App\Models\Log\LogSistema::count()}}</h3>

                    <p>Histórico del sistema.</p>
                  </div>
                    <div class="icon">
                       <i class="fas fa-file-archive"></i>
                    </div>
              </div>
          </div>
    </div>

    
</div>
      
   
@else 

       <div class="container">
          <!-- Small boxes (Stat box) -->
          <div class="row">
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box green darken-3 text-white">
                <div class="inner">
                  <h3>{{ App\Models\Personal::where('ente_id',1)->count() }}</h3>

                  <p>FUNCIONARIOS </p>
                </div>
                <div class="icon">
                  <i class="fas fa-user-tie"></i>
                </div>
                <a href="/personal" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box green darken-3 text-white">
                <div class="inner">
                  <h3>{{ App\Models\Gerencias::where('ente_id',1)->count() }}</h3>

                  <p>GERENCIAS </p>
                </div>
                <div class="icon">
                  <i class="fas fa-building"></i>
                </div>
                <a href="/gerencias" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box green darken-4 text-white">
                <div class="inner">
                  <h3>{{ App\Models\Votantes::where('confirmed',1)->count() }}</h3>

                  <p>FUNCIONARIOS QUE EJERCIERON EL VOTO</p>
                </div>
                <div class="icon">
                  <i class="fas fa-check"></i>
                </div>
                <a href="/personal" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-lg-6 col-6">
              <!-- small box -->
              <div class="small-box green darken-4 text-white">
                <div class="inner">
                  <h3>{{ App\Models\Votantes::where('confirmed',0)->count() }}</h3>

                  <p>FUNCIONARIOS QUE NO EJERCIERON EL VOTO</p>
                </div>
                <div class="icon">
                  <i class="fas fa-not-equal"></i>
                </div>
                <a href="/personal" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
              </div>
            </div>
            <div class="col-sm-12">
              <div class="card">
                <div class="card-body">
                   @php
                    $gerencias = App\Models\Gerencias::pluck('descricion','id');
                  @endphp
                {!! Form::open(['url' => ['/resultado/votantes'],'method' => 'POST','id'=>'marca']) !!}
                 <div class="row">
                   <div class="col-sm-12">
                    <label for="">Buscar resultados por gerencia</label>
                      {!! Form::select('estado_id', $gerencias, null,array('class' => 'form-control input-sm select2','placeholder'=>'Selecione una gerencia','data-width'=>'100%','id'=>'gerencias' ,'required')) !!}  
                   </div>
                 </div>
                 <div class="col-sm-12 mt-5">
                    <button type="submit" class="btn blue darken-4 form-control text-white">
                        Bsucar gerencia
                    </button>
                </div>
                 {!! Form::close() !!}
                </div>
              </div>
            </div>
            <div class="col-sm-6">
             <di class="card">
               <div class="card-header">
                 <h4>Porcentaje de votos generales</h4>
               </div>
               <div class="card-body">
                  <div  id="chart7" style="width:100%; min-height:300px;"></div>
               </div>
             </di>
             
            </div>
             <div class="col-sm-6">
             <div class="card">
               <div class="card-header">
                 <h4>Porcentaje de votos por gerencia</h4>
               </div>
              <div class="card-body">
                  <div  id="chart9" style="width:100%; min-height:300px;"></div>
               </div>
             </div>
             
            </div>
            <!-- /.card -->
          </div>
          

  
@endif




@endsection
 
@push('scripts')

<script>
  
$(function () {

    chart7();
    chart8();
});
function chart7() {
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  // Create chart instance
  var chart = am4core.create("chart7", am4charts.PieChart);

  // Add data
  chart.data = [{
    "country": "Funcionarios que no ejercieron el voto",
    "litres": {{ App\Models\Votantes::where('confirmed',0)
                    ->count() }}
  }, {
    "country": "Funcionarios que ejercieron el voto",
    "litres":  {{ App\Models\Votantes::where('confirmed',1)
                    ->count() }}
  }
  ];

  // Add and configure Series
  var pieSeries = chart.series.push(new am4charts.PieSeries());
  pieSeries.dataFields.value = "litres";
  pieSeries.dataFields.category = "country";
  pieSeries.slices.template.stroke = am4core.color("#1A8F03");
  pieSeries.slices.template.strokeWidth = 0;
  pieSeries.width = 100;
  pieSeries.slices.template.strokeOpacity = 1;
  pieSeries.labels.template.fill = am4core.color("#027538");

  // This creates initial animation
  pieSeries.hiddenState.properties.opacity = 1;
  pieSeries.hiddenState.properties.endAngle = 40;
  pieSeries.hiddenState.properties.startAngle = 40;
 
}
function chart8() {
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  // Create chart instance
  var chart = am4core.create("chart9", am4charts.PieChart);

  // Add data
  chart.data = [{
    "country": "CONSULTORIA JURIDICA",
    "litres":  {{App\Models\Votantes::where('gerencia_id',1)->count() }},
  }, 
  {
    "country": "GESTION DEL TALENTO HUMANO",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',2)->count() }},
  },
  {
    "country": "ADMINISTRACION",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',3)->count() }},
  },
  {
    "country": "TECNOLOGIA DE LA INFORMACION",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',4)->count() }},
  },
  {
    "country": "RESGUARDO INSTITUCIONAL",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',5)->count() }},
  },
  {
    "country": "COOP Y FINANC  NACIONAL",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',6)->count() }},
  },
  {
    "country": "PLANIFI Y GESTION ESTRATEGICA",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',7)->count() }},
  },
  {
    "country": "ADMINISTRACION DE FONDOS",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',8)->count() }},
  },
  {
    "country": "AUDITORIA INTERNA",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',9)->count() }},
  },
  {
    "country": "FINANZAS",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',10)->count() }},
  },
  {
    "country": "PRESIDENCIA",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',11)->count() }},
  },
  {
    "country": "INFOR Y RELACIONES PUBLICAS",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',12)->count() }},
  },
  {
    "country": "FONDOS PARA EL DESARROLLO",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',13)->count() }},
  },
  {
    "country": "PREINVERSION Y ASISTENCIA TECNICA",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',14)->count() }},
  },
  {
    "country": "VICEPRESIDENCIA EJECUTIVA",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',15)->count() }},
  },
  {
    "country": "SECRETARIA DE LA PRESIDENCIA",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',16)->count() }},
  },
  {
    "country": "COOP Y FINANC INTERNACIONAL",
    "litres":                 {{ App\Models\Votantes::where('gerencia_id',17)->count() }}
  }
    ];

  // Add and configure Series
  var pieSeries = chart.series.push(new am4charts.PieSeries());
  pieSeries.dataFields.value = "litres";
  pieSeries.dataFields.category = "country";
  pieSeries.slices.template.stroke = am4core.color("#1A8F03");
  pieSeries.slices.template.strokeWidth = 0;
  pieSeries.width = 100;
  pieSeries.slices.template.strokeOpacity = 1;
  pieSeries.labels.template.fill = am4core.color("#027538");

  // This creates initial animation
  pieSeries.hiddenState.properties.opacity = 1;
  pieSeries.hiddenState.properties.endAngle = 40;
  pieSeries.hiddenState.properties.startAngle = 40;
 
}
 
</script>
@endpush
