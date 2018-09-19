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
          <li class="active ">
            <a href="./applicant ">
              <i class="nc-icon nc-single-02"></i>
              <p>Gestión Candidatos</p>
            </a>
          </li>
          <li>
            <a href="./experience ">
              <i class="nc-icon nc-glasses-2"></i>
              <p>Gestión  Exp. Laboral</p>
            </a>
          </li>
          <li>
            <a href="./table ">
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
            <a class="navbar-brand" href="#pablo">Gestión de Cantidatos</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link btn-magnify" href="#pablo">
                </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="content">
          <div class="col-md-8">
            <div class="card card-user">
              <div class="card-header">
                <h5 class="card-title">Agregar Candidato</h5>
              </div>
              <div class="card-body">
                <form action="<?php base_url();?>applicants/add" method='post'>



                        <div class="row">
                          <div class="col-6 form-group">
                            <span>Datos Generales:</span>
                            <input type="text" class="form-control" placeholder="Nombre" name="name" required>
                            <input type="text" class="form-control" placeholder="Segundo Nombre" name="second_name">
                            <input type="text" class="form-control" placeholder="Apellido" name="lastname" required>
                            <input type="text" class="form-control" placeholder="Segundo Apellido" name="second_lastname">
                            <input type="text" class="form-control" placeholder="Identificación" name="ssn" required>
                          </div>
                          
                          <div class="col-6 form-group">
                            <span>Datos del puesto:</span>
                            <select name="position_id" id="position_id" class="form-control" required></select>Empresa:
                            <select name="company_id" id="company_id" class="form-control blocked" ></select>Departamento:
                            <select name="department_id" id="department_id" class="form-control blocked" ></select>
                            <label for="Payments">Salario del Puesto:</label><span id="payment" class="form-control"><input type="text" class="form-control" placeholder="Salario al que Aspira" name="salary"></span>
                            <input type="text" class="form-control" placeholder="Salario al que Aspira" name="salary">
                          </div>
                        </div>

                        <hr>

                        <div class="row">
                          <div class="col-6 form-group">
                            <span>Principales Competencias:</span>
                            <select name="ability_id" id="ability_id" class="form-control" required></select>
                          </div>
                          
                          <div class="col-6 form-group">
                            <span>Capacitaciones:</span>
                            <select name="training_id" id="training_id" class="form-control" required></select>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-6 form-group">
                            <span>Experiencia Laboral:</span>
                            <input type="text" class="form-control" placeholder="Puesto" name="job_title">
                            <input type="text" class="form-control" placeholder="Compañia" name="company_name">

                           
                            <input type="number" class="form-control" placeholder="Salario" name="salary">
                          </div>

                          <div class="col-6">
                            <span>Fecha de Entrada:</span>
                            <input type="date" class="form-control" placeholder="Fecha de Entrada" name="stardate">
                            <span>Fecha de Salida:</span>
                            <input type="date" class="form-control" placeholder="Fecha de Salida" name="enddate">
                            <span>Recomendado por:</span>
                            <select name="employe_id" id="employe_id" class="form-control"></select>
                          </div>
                          
                        </div>
                        
                        <div class="row">
                          <div class="col-6 form-group">
                            
                          </div>
                        </div>
                        

                        <button type="submit" class="btn btn-primary btn-round" float='right'>Agregar Candidato</button>

                </form>
              </div>
              <div class="card-header">
                <h5 class="card-title">Candidatos</h5>
              </div>
              <div class="col-md-12" align="center">
                <div class="list-group" >
                  <?php foreach($data as $n) : ?>
                    <a href="#" class="list-group-item list-group-item-action"><?= "<b>Posición: </b>". $n->name ." <br/> <b>Salário: </b>". "$".number_format($n->lowestpayment, 2, '.', ',')." | $".number_format($n->highestpayment, 2, '.', ','); ?>
                    <?php if($n->state_id == 1) : ?>
                    <div align="right" style="margin-top: -30px;">
                      <label class="switchh" >
                        <input type="checkbox" class="checker" value="<?= $n->id ?>" checked>
                        <span class="sliderr"></span>
                      </label>
                    </div>
                    <?php else : ?>
                    <div align="right" style="margin-top: -30px;">
                      <label class="switchh" >
                        <input type="checkbox" class="checker" value="<?= $n->id ?>">
                        <span class="sliderr"></span>
                      </label>
                    </div>
                    <?php endif; ?>
                    </a>                   
                  <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
      </div>

      <script src="<?php echo base_url(); ?>assets/js/applicant-event-handler.js"></script>