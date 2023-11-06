<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accueil</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/jquery.dataTables.min.css') }}">

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.0.min.js') }}"></script>
    <script src="{{ asset('js/toastr.min.js') }}"></script>
</head>
 
<body>

    <div class="container p-5">
        <div class="d-flex justify-content-between mb-3">
            <a class="btn  btn-primary  fw-bold" data-bs-toggle="modal" data-bs-target="#new_projet"> <i
                    class="fas fa-plus-circle"></i> Ajouter une ligne</a>
            <a class="btn  btn-primary  fw-bold"> <i class="fas fa-time-circle"></i> Exporter</a>

        </div>


        <div>
            <table class="table table-bordered  table-sm align-middle " id="">
                <tr class=" text-dark text-center align-middle">
                    <th rowspan="2" class="text-white" style="background: #366092">Agences & Sites</th> 
                    <th colspan="3" style="background: #b8cce4">Installation</th>
                    <th colspan="3" style="background: #95b3d7">Basic Config</th> 
                    <th rowspan="2" class="text-white" style="background: #244061">Migration</th>
                    <th rowspan="2" class=" ">Actions</th>
                </tr>
                <tr class="bg-secondary text-center align-middle">
                    <th style="background: #b8cce4">ONU </th> 
                    <th style="background: #b8cce4">Rack </th>
                    <th style="background: #95b3d7">Fibre </th>
                    <th class="text-white" style="background: #366092">IP & VLan</th>
                    <th class="text-white" style="background: #366092">SSH</th>
                    <th class="text-white" style="background: #366092">SNMP</th> 
                </tr>



                <tr>
                    <td colspan="9">There are no data.</td>
                </tr>
                </tr>
            </table>
        </div>

    </div>

    <style>
        a.disabled {
            pointer-events: none;
            cursor: default;
        }

        .txt {
            /* width: 120px; */
            /* background: rgb(196, 196, 228); */
        }

        .txtm {
            width: 130px;
            /* background: rgb(196, 196, 228); */
        }

        .txtca {
            text-align: center;
            width: 110px;
            /* background: rgb(196, 196, 228); */
        }

        .txtcm {
            text-align: center;
            width: 120px;
            /*  background: rgba(255, 0, 0, 1.0); */
        }
    </style>

</body>

</html>
