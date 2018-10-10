<?php
    class Report_maker extends CI_Controller{

        public function __construct()
    {
        parent::__construct();
        $this->load->database();
        include("/../third_party/mpdf60/mpdf.php");
    }

    public function employees_report(){

        $stadistics = $this->dashboard_model->get_all();
        $mpdf= new mPDF('c');

        $header = '<div class="col-md-8">
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
                    <tr>';

       

        foreach($stadistics as $n){
            $employees .= "<tr> <td class='tg-i4hq'>$n->id</td>
            <td class='tg-c6of'>$n->fullname</td>
            <td class='tg-ycr8'>$n->name</td>  </tr>";

             }

        $html = "<style type='text/css'>
        .tg  {border-collapse:collapse;border-spacing:0;}
        .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
        .tg .tg-mk6l{background-color:#000000;color:#ffffff;border-color:#000000;text-align:left;vertical-align:top}
        .tg .tg-ycr8{background-color:#ffffff;text-align:left;vertical-align:top}
        .tg .tg-i4hq{font-weight:bold;background-color:#ffffff;color:#000000;border-color:#333333;text-align:left;vertical-align:top}
        .tg .tg-0hty{font-weight:bold;background-color:#000000;color:#ffffff;border-color:inherit;text-align:left;vertical-align:top}
        .tg .tg-c6of{background-color:#ffffff;border-color:inherit;text-align:left;vertical-align:top}
        </style>
        <p><span style='font-size: 18pt;'><strong>Lista de empleados activos. Marte RRHH</strong></span></p>
        <table class='tg'>
          <tr>
            <th class='tg-mk6l'><span style='font-weight:bold'>ID</span></th>
            <th class='tg-0hty'>NOMBRE</th>
            <th class='tg-mk6l'><span style='font-weight:bold'>CONAÑIA</span></th>
          </tr>
          
            $employees
         
        </table>";

        $mpdf->WriteHTML($html);
        $mpdf->Output();
        // echo json_encode($stadistics);
        // die();

    }
}