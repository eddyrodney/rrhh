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
          <li class="active ">
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
            <a class="navbar-brand" href="#pablo">Gestión de Capacitaciones</a>
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
                <h5 class="card-title">Agregar Capacitación</h5>
              </div>
              <div class="card-body">
                <form action="<?php base_url();?>trainings/add" method='post'>
                  <div class="row">
                    <div class="col-md-5 pr-1">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Título" name="title" required>
                        <textarea name="details" id="" cols="30" rows="10" class="form-control" placeholder="Descripción"></textarea>Fecha de Inicio
                        <input type="date" class="form-control" placeholder="Fecha de Inicio" name="startdate" required>Fecha Fin
                        <input type="date" class="form-control" placeholder="Fecha Fin" name="enddate" required>
                        <input type="text" class="form-control" placeholder="Institución" name="institution" required>
                        <select name="skill_lvl_id" class="form-control">
                            <option value="1">GRADO</option>
                            <option value="2">POST-GRADO</option>
                            <option value="3">MAESTRIA</option>
                            <option value="4">TECNICO</option>
                            <option value="5">Gestión</option>
                        </select>
                        <button type="submit" class="btn btn-primary btn-round" float='right'>Agregar Capacitación</button>
                      </div>
                    </div>
                </form>
              </div>
              <div class="card-header">
                <h5 class="card-title">Capacitaciones</h5>
              </div>
              <div class="col-md-12" align="center">
                <div class="list-group" >
                  <?php foreach($data as $n) : ?>
                    <a href="#" class="list-group-item list-group-item-action"><?="<b>Entrenamiento:</b> ". $n->name. " | <b>En:</b> " . $n->institution . " </br> <b>Desde:</b> ". $n->startdate . " | <b>Hasta:</b> " . $n->enddate; ?>
                    <?php if($n->state_id == 1) : ?>
                  <!--  <div align="right" style="margin-top: -30px;">
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
                    </div> -->
                    <?php endif; ?>
                    </a>                   
                  <?php endforeach; ?>
                </div>
            </div>
            </div>
        </div>
      </div>

      <script src="<?php echo base_url(); ?>assets/js/training-event-handler.js"></script>