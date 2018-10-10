  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
    <div class="logo">
        <a href="#" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="<?php echo base_url(); ?>assets/img/logo-small.png">
          </div>
        </a>
        <a href="#" class="simple-text logo-normal">
          Marte RRHH
          <!-- <div class="logo-image-big">
            <img src="<?php echo base_url(); ?>assets/img/logo-big.png">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="active ">
            <a href="./dashboard ">
              <i class="nc-icon nc-chart-pie-36"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
            <a href="./ability ">
              <i class="nc-icon nc-user-run"></i>
              <p>Gestión Competencias</p>
            </a>
          </li>
          <li>
            <a href="./language ">
              <i class="nc-icon nc-globe"></i>
              <p>Gestión Lenguajes</p>
            </a>
          </li>
          <li>
            <a href="./training ">
              <i class="nc-icon nc-hat-3"></i>
              <p>Gestión Capacitaciones</p>
            </a>
          </li>
          <li>
            <a href="./company ">
              <i class="nc-icon nc-shop"></i>
              <p>Gestión Compañias</p>
            </a>
          </li>
          <li>
            <a href="./department ">
              <i class="nc-icon nc-shop"></i>
              <p>Departamentos</p>
            </a>
          </li>
          <li>
            <a href="./position ">
              <i class="nc-icon nc-circle-10"></i>
              <p>Gestión Puestos</p>
            </a>
          </li>
          <li>
            <a href="./applicant ">
              <i class="nc-icon nc-single-02"></i>
              <p>Gestión Candidatos</p>
            </a>
          </li>
          <li>
            <a href="./employee">
              <i class="nc-icon nc-badge"></i>
              <p>Candidatos / Empleado</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#pablo">Estadisticas</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <form>
              <!-- <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="h...">
                <div class="input-group-append">
                  <div class="input-group-text">
                    <i class="nc-icon nc-zoom-split"></i>
                  </div>
                </div>
              </div> -->
            </form>
            <!-- <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                  <i class="nc-icon nc-layout-11"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Stats</span>
                  </p>
                </a>
              </li>
              <li class="nav-item btn-rotate dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="nc-icon nc-bell-55"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Some Actions</span>
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Action</a>
                  <a class="dropdown-item" href="#">Another action</a>
                  <a class="dropdown-item" href="#">Something else here</a>
                </div>
              </li>
              <li class="nav-item">
                <a class="nav-link btn-rotate" href="#pablo">
                  <i class="nc-icon nc-settings-gear-65"></i>
                  <p>
                    <span class="d-lg-none d-md-block">Account</span>
                  </p>
                </a>
              </li>
            </ul> -->
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-lg">
  
  <canvas id="bigDashboardChart"></canvas>
  
  
</div> -->
      <div class="content">
        <div class="row">
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-globe text-warning"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Idiomas</p>
                      <p class="card-title"><span id="c_idiomas"></span>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-hat-3 text-success"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Capacitaciones</p>
                      <p class="card-title"><span id="c_capacitaciones"></span>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-shop text-danger"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Compañias</p>
                      <p class="card-title"><span id="c_companias"></span>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card card-stats">
              <div class="card-body ">
                <div class="row">
                  <div class="col-5 col-md-4">
                    <div class="icon-big text-center icon-warning">
                      <i class="nc-icon nc-single-02 text-primary"></i>
                    </div>
                  </div>
                  <div class="col-7 col-md-8">
                    <div class="numbers">
                      <p class="card-category">Candidatos</p>
                      <p class="card-title"><span id="c_candidatos"></span>
                        <p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Buscar Candidato</h5>
                <p class="card-category">Consulta por Criterio</p>
              </div>
              <div class="card-body ">
                <input type="text" id="buscador" class="form-control" placeholder="Escriba el valor del Criterio">
                <select id="criterio" class="form-control">
                  <option value="1">Nombre</option>
                  <option value="2">Puesto al que Aplica</option>
                  <option value="3">Empresa</option>
                  <option value="4">Fecha</option>
                </select>
                <table class="table table-striped" id="tabla">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Puesto al que Aplica</th>
                      <th scope="col">Empresa</th>
                      <th scope="col">Fecha de Aplicación</th>
                    </tr>
                  </thead>
                  <tbody id="datos_encontrados">
                    
                  </tbody>
                </table>
              </div>
              <div class="card-footer ">
                <hr>
                <div class="stats">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <!-- <div class="col-md-4">
            <div class="card ">
              <div class="card-header ">
                <h5 class="card-title">Email Statistics</h5>
                <p class="card-category">Last Campaign Performance</p>
              </div>
              <div class="card-body ">
                <canvas id="chartEmail"></canvas>
              </div>
              <div class="card-footer ">
                <div class="legend">
                  <i class="fa fa-circle text-primary"></i> Opened
                  <i class="fa fa-circle text-warning"></i> Read
                  <i class="fa fa-circle text-danger"></i> Deleted
                  <i class="fa fa-circle text-gray"></i> Unopened
                </div>
                <hr>
                <div class="stats">
                  <i class="fa fa-calendar"></i> Number of emails sent
                </div>
              </div>
            </div> -->
          </div>
          <div class="col-md-8">
            <div class="card card-chart">
              <div class="card-header">
                <h5 class="card-title">Lista de Empleados de Nuevo Ingreso</h5>
                <p class="card-category">Ordenados por Fechas</p>
              </div>
              <div class="card-body">
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Nombre</th>
                      <th scope="col">Compañia</th>
                    </tr>
                  </thead>
                  <tbody>
                   <?php foreach($data as $n) : ?>
                    <tr>
                      <th scope="row"><?=$n->id;?></th>
                      <td><?=$n->fullname;?></td>
                      <td><?=$n->name;?></td>
                    </tr>
                  </tbody>
                  <?php endforeach; ?>
                </table>
              </div>
              <div class="card-footer">
                <div class="chart-legend">
                  <i class="fa fa-circle text-info"></i><span id="c_empleados"></span> Empleados <br/>
 
                    <a href="<?php base_url();?>report_maker/employees_report" id="exportar" class="btn btn-dark" target="_blank">Exportar a PDF</a>
           
                </div>
                <hr/>
                <div class="card-stats">
                  <!-- <i class="fa fa-check"></i> Data information certified -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="<?php echo base_url(); ?>assets/js/dashboard-event-handler.js"></script>
     