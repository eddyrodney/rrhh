<body class="">
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
          <li>
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
          <li class="active ">
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
          <a class="navbar-brand" href="#pablo">Candidatos / Empleados</a>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Candidatos</h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                    <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <th>
                        Puesto al que aplica
                      </th>
                      <th>
                        Empresa
                      </th>
                      <th>
                        Fecha de Solicitud
                      </th>
                      <th class="text-right">
                        Convertir a Empleado
                      </th>
                    </thead>
                    <tbody>
                    <?php //var_dump($applicants); ?>  
                    <?php foreach($applicants as $n) : ?>
                      <tr>
                      <td>
                          <?= $n->id; ?>
                        </td>
                        <td>
                          <?= $n->fullname; ?>
                        </td>
                        <td>
                          <?= $n->position_name; ?>
                        </td>
                        <td>
                          <?= $n->company_name; ?>
                        </td>
                        <td class="">
                          <?= $n->date; ?>
                        </td>
                        <td class="text-right">
                          <button class="btn btn-primary btn-round converter" value="<?= $n->id?>">Convertir a Empleado</button>
                        </td>
                      </tr>
                      <?php endforeach; ?> 
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="card card-plain">
              <div class="card-header">
                <h4 class="card-title"> Empleados</h4>
                <p class="card-category"> Lista de Empleados</p>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        ID
                      </th>
                      <th>
                        Nombre
                      </th>
                      <th>
                        Puesto
                      </th>
                      <th>
                        Empresa
                      </th>
                      <th>
                        Departamento
                      </th>
                      <th>
                        Fecha de Inicio
                      </th>
                      <th class="text-right">
                        Estado
                      </th>
                    </thead>
                    <tbody>
                    <?php foreach($data as $i) : ?>
                      <tr>
                        <td>
                          <?= $i->id; ?>
                        </td>
                        <td>
                          <?= $i->fullname; ?>
                        </td>
                        <td>
                          <?= $i->position_name; ?>
                        </td>
                        <td>
                          <?= $i->company_name; ?>
                        </td>
                        <td>
                          <?= $i->department_name; ?>
                        </td>
                        <td>
                          <?= $i->startdate; ?>
                        </td>
                        <td class="text-right">
                        <?php if($i->state_id == 1) : ?>
                          <div style="margin-top: -05px;">
                            <label class="switchh" >
                              <input type="checkbox" class="checker" value="<?= $i->id ?>" checked>
                              <span class="sliderr"></span>
                            </label>
                          </div>
                        <?php else : ?>
                          <div  style="margin-top: -05px;">
                            <label class="switchh" >
                              <input type="checkbox" class="checker" value="<?= $i->id ?>">
                              <span class="sliderr"></span>
                            </label>
                          </div>
                        <?php endif; ?>
                        </td>
                      </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <script src="<?php echo base_url(); ?>assets/js/employee-event-handler.js"></script>