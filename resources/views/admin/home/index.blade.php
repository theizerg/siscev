@extends('layouts.admin')
@section('title', 'Inicio')
@section('content')
<section class="container">
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

    <div class="col-sm-12">
         <div class="card ">
                <div class="card-header">
                   <div class="card-body">
                     <div class="container-fluid">
                      <div class="card-panel">
                      <canvas id="employee"></canvas>
                       </div>
                   </div>
               </div>
            </div>
        </div>
    </div>
</div>
      
   
@else 
<section class="content">
     <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box green darken-3 text-white">
              <div class="inner">
                <h3>{{ App\Models\Personal::count() }}</h3>

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
                <h3>{{ App\Models\Gerencias::count() }}</h3>

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
              <a href="/gerencias" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
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
              <a href="/gerencias" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
           <div class="col-sm-12">
             <div class="card">
                <div class="card-header">
                    <h3>Datos generales</h3>
                </div>
                 <div class="card-body">
                      <div id="chart7"></div>
                 </div>
             </div>
            </div>
            <div class="col-sm-12">
                 <div class="card">
                <div class="card-header">
                    <h3>Datos generales</h3>
                </div>
                 <div class="card-body">
                      <div id="chart8"></div>
                 </div>
             </div>
            </div>
            
        </div>
      </div>
  </div>
</section>
@endif




</section>
@endsection
 
@push('scripts')

<script>
  
$(function () {

    chart7();
    chart8();
});
    function chart7() {
    var options = {
        chart: {
            width: 850,
            type: 'pie',
        },
        labels: ['Personal que ejerció el voto', 'Personal que no ejerció el voto'],
        series: [{{ App\Models\Votantes::where('confirmed',1)
                    ->count() }}, {{ App\Models\Votantes::where('confirmed',0)
                    ->count() }}],
        responsive: [{
            breakpoint: 850,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var chart = new ApexCharts(
        document.querySelector("#chart7"),
        options
    );

    chart.render();
}
function chart8() {
    var options = {
        chart: {
            width: 850,
            type: 'pie',
        },
        labels: [

                 'CONSULTORIA JURIDICA',
                 'GCIA EJEC DE GESTION DEL TALENTO HUMANO',
                 'GCIA EJEC DE ADMINISTRACION',
                 'GCIA EJEC TECNOLOGIA DE LA INFORMACION',
                 'GCIA EJEC DE RESGUARDO INSTITUCIONAL',
                 'GCIA EJEC DE COOP Y FINANC  NACIONAL',
                 'GCIA EJEC  PLANIFI Y GESTION ESTRATEGICA',
                 'GCIA. EJEC.  DE ADMINISTRACION DE FONDOS',
                 'AUDITORIA INTERNA',
                'GCIA EJEC DE FINANZAS',
                'PRESIDENCIA',
                'GCIA EJEC DE INFOR Y RELACIONES PUBLICAS',
                'GCIA. EJEC. FONDOS PARA EL DESARROLLO',
                'GCIA PREINVERSION Y ASISTENCIA TECNICA',
                'VICEPRESIDENCIA EJECUTIVA',
                'GCIA EJEC SECRETARIA DE LA PRESIDENCIA',
                'GCIA EJEC DE COOP Y FINANC INTERNACIONAL'
                 ],
        series: [
                {{App\Models\Votantes::where('gerencia_id',1)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',2)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',3)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',4)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',5)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',6)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',7)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',8)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',9)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',10)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',11)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',12)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',13)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',14)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',15)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',16)->count() }},
                {{ App\Models\Votantes::where('gerencia_id',17)->count() }}],
        responsive: [{
            breakpoint: 800,
            options: {
                chart: {
                    width: 400
                },
                legend: {
                    position: 'bottom'
                }
            }
        }]
    }

    var chart = new ApexCharts(
        document.querySelector("#chart8"),
        options
    );

    chart.render();
}
</script>
@endpush
