<div>

    <x-loading-indicator />

    <div class="d-flex justify-content-between mb-3">
        <a class="btn  btn-primary  fw-bold" data-bs-toggle="modal" data-bs-target="#new_projet"> <i
                class="fas fa-plus-circle"></i> Ajouter une ligne</a>
        {{-- <a class="btn  btn-primary  fw-bold"> <i class="fas fa-time-circle"></i> Exporter</a> --}}

    </div>

    <div wire:ignore.self class="modal fade" id="new_projet" tabindex="-1" aria-labelledby="voirtoutrTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable  modal-fullscreen   " role="document">
            <form wire:submit.prevent="store">
                <div class="modal-content">
                    <div class="modal-header bg-dark text-white d-flex justify-content-between">
                        <h3>Ajouter un nouveau site </h3>
                        <div>
                            <button type="submit" {{-- wire:click="save" --}} class="btn btn-primary fw-bold"
                                {{-- data-bs-dismiss="modal" --}}>Enregistrer</button>
                            <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal"><i
                                    class="fas fa-times"></i></button>
                        </div>
                    </div>
                    <div class="modal-body">

                        <div class="card col-md-12 mb-3">
                            <h4 class="card-header text-center bg-dark text-white">Site</h4>
                            <div class="modal-body">
                                <div class="">
                                    <input type="text" class="form-control" wire:model="site"
                                        placeholder="Nom du site" required>
                                </div>
                            </div>
                        </div>

                        <div class="card col-md-12 mb-3">
                            <h4 class="card-header text-center bg-dark text-white">Installation</h4>
                            <div class="modal-body">
                                <div class="row mb-2">
                                    <div class="col-md-4 text-center">
                                        <div class="input-group y mb-3 ">
                                            <span class="input-group-text  txtca   fw-bold "> ONU </span>
                                            <div class="col">
                                                <input type="text" class="form-control" wire:model="onu"
                                                    placeholder="Entrer du text" required> 
                                                <div class="input-group">
                                                    <input type="date" class="form-control" wire:model="onu_start">
                                                    <input type="date" class="form-control" wire:model="onu_end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group y mb-3 ">
                                            <span class="input-group-text  txtca   fw-bold "> Rack </span>
                                            <div class="col">
                                                <select class="form-control" wire:model="rack">
                                                    <option value="">--Select option--</option>
                                                    @foreach ($choix as $choi)
                                                        <option value="{{ $choi->option }}">{{ $choi->option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" wire:model="rack_start">
                                                    <input type="date" class="form-control" wire:model="rack_end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group y mb-3 ">
                                            <span class="input-group-text  txtca   fw-bold "> Fiber </span>
                                            <div class="col">
                                                <select class="form-control" wire:model="fiber">
                                                    <option value="">--Select option--</option>
                                                    @foreach ($choix as $choi)
                                                        <option value="{{ $choi->option }}">{{ $choi->option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group">
                                                    <input type="date" class="form-control" wire:model="fiber_start">
                                                    <input type="date" class="form-control" wire:model="fiber_end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card col-md-12 mb-3">
                            <h4 class="card-header text-center bg-dark text-white">Basic Config</h4>
                            <div class="modal-body">
                                <div class="row mb-2">

                                    <div class="col-md-4">
                                        <div class="input-group y mb-3 ">
                                            <span class="input-group-text  txtca   fw-bold "> IP & VLAN </span>
                                            <div class="col"> 
                                                <input type="text" class="form-control" wire:model="ip_vlan"
                                                    placeholder="Entrer du text" required> 
                                                <div class="input-group">
                                                    <input type="date" class="form-control"
                                                        wire:model="ip_vlan_start">
                                                    <input type="date" class="form-control"
                                                        wire:model="ip_vlan_end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group y mb-3 ">
                                            <span class="input-group-text  txtca   fw-bold "> SSH </span>
                                            <div class="col">
                                                <select class="form-control" wire:model="ssh">
                                                    <option value="">--Select option--</option>
                                                    @foreach ($choix as $choi)
                                                        <option value="{{ $choi->option }}">{{ $choi->option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group">
                                                    <input type="date" class="form-control"
                                                        wire:model="ssh_start">
                                                    <input type="date" class="form-control" wire:model="ssh_end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-group y mb-3 ">
                                            <span class="input-group-text  txtca   fw-bold "> SNMP </span>
                                            <div class="col">
                                                <select class="form-control" wire:model="snmp">
                                                    <option value="">--Select option--</option>
                                                    @foreach ($choix as $choi)
                                                        <option value="{{ $choi->option }}">{{ $choi->option }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <div class="input-group">
                                                    <input type="date" class="form-control"
                                                        wire:model="snmp_start">
                                                    <input type="date" class="form-control" wire:model="snmp_end">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="card col-md-12 mb-3">
                            <h4 class="card-header text-center bg-dark text-white">Migration</h4>
                            <div class="modal-body">
                                <div class="">
                                    <select class="form-control" wire:model="migration">
                                        <option value="">--Select option--</option>
                                        @foreach ($choix as $choi)
                                            <option value="{{ $choi->option }}">{{ $choi->option }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="input-group">
                                        <input type="date" class="form-control" wire:model="migration_start">
                                        <input type="date" class="form-control" wire:model="migration_end">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>


    <div>
        <table class="table table-bordered  table-sm align-middle " id="">
            <tr class=" text-dark text-center align-middle">
                <th rowspan="2" class="text-white" style="background: #366092">Agences & Sites</th>
                <th colspan="3" style="background: #b8cce4">Installation</th>
                <th colspan="3" style="background: #95b3d7">Basic Config</th>
                <th rowspan="2" class="text-white" style="background: #244061">Migration</th>
                <th rowspan="2" class="bg-dark text-white">Actions</th>
            </tr>
            <tr class="bg-secondary text-center align-middle">
                <th style="background: #b8cce4">ONU </th>
                <th style="background: #b8cce4">Rack </th>
                <th style="background: #b8cce4">Fibre </th>
                <th class="text-white" style="background: #95b3d7">IP & VLan</th>
                <th class="text-white" style="background: #95b3d7">SSH</th>
                <th class="text-white" style="background: #95b3d7">SNMP</th>
            </tr>


            <tbody class="text-center">
                @if ($projets->isNotEmpty())
                    @php
                        $cnt = 1;
                        $editmodal = 'edit' . $cnt;
                        $delmodal = 'delete' . $cnt;
                    @endphp
                    @foreach ($projets as $projet)
                        @php
                            $bg_status = 'white';

                            if ($projet->total_per == '100') {
                                $bg_status = 'color: #198754; ';
                            } elseif ($projet->total_per == '0' || $projet->total_per == null) {
                                $bg_status = 'display : none ';
                            } else {
                                $bg_status = 'color: #ffc107;';
                            }
                        @endphp
                        <tr class="text-center align-middle">
                            <td>
                                {{ $projet->site }}
                            </td>
                            <x-custom-td :txt="$projet->onu" />
                            <x-custom-td :txt="$projet->rack" />
                            <x-custom-td :txt="$projet->fiber" />
                            <x-custom-td :txt="$projet->ip_vlan" />
                            <x-custom-td :txt="$projet->ssh" />
                            <x-custom-td :txt="$projet->snmp" />
                            <x-custom-td :txt="$projet->migration" />


                            <td class="td-actions d-flex ">
                                <a class="btn btn-transparent btn-xs dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#edit_projet" wire:click="loadid('{{ $projet->id }}')">
                                    <i class="fas fa-edit" title="Modifier"></i>
                                </a>
                                {{-- <a href="{{ url('/projets/editImage', $projet) }}"
                            class="btn btn-transparent btn-xs dropdown-item">
                            <i class="fas fa-camera"></i> Images
                        </a>
                        <a href="{{ url('/projets/equipementProjet', $projet) }}"
                            class="btn btn-transparent btn-xs dropdown-item">
                            <i class="fas fa-eye"></i> Voir +
                        </a> --}}
                                <a class="btn btn-transparent btn-xs dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#delete" wire:click="loadid('{{ $projet->id }}')">
                                    <i class="fas fa-trash-alt" title="Supprimer"></i>
                                </a>
                            </td>
                        </tr>
                        @php
                            $cnt = $cnt + 1;
                            $editmodal = 'edit' . $cnt;
                            $delmodal = 'delete' . $cnt;
                        @endphp
                    @endforeach
                @else
                    <tr>
                        <td colspan="10">There are no data.</td>
                    </tr>
                @endif
            </tbody>
        </table>

        <x-delete-modal delmodal="delete" message="Confirmer la suppression " delf="delete" />

        <div wire:ignore.self class="modal fade" id="edit_projet" tabindex="-1" aria-labelledby="voirtoutrTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable  modal-fullscreen   " role="document">
                <form wire:submit.prevent="update">
                    <div class="modal-content">
                        <div class="modal-header bg-dark text-white d-flex justify-content-between">
                            <h3>Modification </h3>
                            <div>
                                <button type="submit" {{-- wire:click="save" --}} class="btn btn-primary fw-bold"
                                    {{-- data-bs-dismiss="modal" --}}>Enregistrer</button>
                                <button type="button" class="btn btn-danger fw-bold" data-bs-dismiss="modal"><i
                                        class="fas fa-times"></i></button>
                            </div>
                        </div>
                        <div class="modal-body">

                            <div class="card col-md-12 mb-3">
                                <h4 class="card-header text-center bg-dark text-white">Site</h4>
                                <div class="modal-body">
                                    <div class="">
                                        <input type="text" class="form-control" wire:model="site2" required>
                                    </div>
                                </div>
                            </div>

                            <div class="card col-md-12 mb-3">
                                <h4 class="card-header text-center bg-dark text-white">Installation</h4>
                                <div class="modal-body">
                                    <div class="row mb-2">
                                        <div class="col-md-4 text-center">
                                            <div class="input-group y mb-3 ">
                                                <span class="input-group-text  txtca   fw-bold "> ONU </span>
                                                <div class="col">
                                                <input type="text" class="form-control" wire:model="onu2"
                                                    placeholder="Entrer du text" required> 
                                                    <div class="input-group">
                                                        <input type="date" class="form-control"
                                                            wire:model="onu_start2">
                                                        <input type="date" class="form-control"
                                                            wire:model="onu_end2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group y mb-3 ">
                                                <span class="input-group-text  txtca   fw-bold "> Rack </span>
                                                <div class="col">
                                                    <select class="form-control" wire:model="rack2">
                                                        <option>--Select option--</option>
                                                        @foreach ($choix as $choi)
                                                            <option value="{{ $choi->option }}">{{ $choi->option }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control"
                                                            wire:model="rack_start2">
                                                        <input type="date" class="form-control"
                                                            wire:model="rack_end2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group y mb-3 ">
                                                <span class="input-group-text  txtca   fw-bold "> Fiber </span>
                                                <div class="col">
                                                    <select class="form-control" wire:model="fiber2">
                                                        <option>--Select option--</option>
                                                        @foreach ($choix as $choi)
                                                            <option value="{{ $choi->option }}">{{ $choi->option }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control"
                                                            wire:model="fiber_start2">
                                                        <input type="date" class="form-control"
                                                            wire:model="fiber_end2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card col-md-12 mb-3">
                                <h4 class="card-header text-center bg-dark text-white">Basic Config</h4>
                                <div class="modal-body">
                                    <div class="row mb-2">

                                        <div class="col-md-4">
                                            <div class="input-group y mb-3 ">
                                                <span class="input-group-text  txtca   fw-bold "> IP & VLAN </span>
                                                <div class="col"> 
                                                    <input type="text" class="form-control" wire:model="ip_vlan2"
                                                        placeholder="Entrer du text" required> 
                                                    <div class="input-group">
                                                        <input type="date" class="form-control"
                                                            wire:model="ip_vlan_start2">
                                                        <input type="date" class="form-control"
                                                            wire:model="ip_vlan_end2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group y mb-3 ">
                                                <span class="input-group-text  txtca   fw-bold "> SSH </span>
                                                <div class="col">
                                                    <select class="form-control" wire:model="ssh2">
                                                        <option>--Select option--</option>
                                                        @foreach ($choix as $choi)
                                                            <option value="{{ $choi->option }}">{{ $choi->option }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control"
                                                            wire:model="ssh_start2">
                                                        <input type="date" class="form-control"
                                                            wire:model="ssh_end2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="input-group y mb-3 ">
                                                <span class="input-group-text  txtca   fw-bold "> SNMP </span>
                                                <div class="col">
                                                    <select class="form-control" wire:model="snmp2">
                                                        <option>--Select option--</option>
                                                        @foreach ($choix as $choi)
                                                            <option value="{{ $choi->option }}">{{ $choi->option }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <div class="input-group">
                                                        <input type="date" class="form-control"
                                                            wire:model="snmp_start2">
                                                        <input type="date" class="form-control"
                                                            wire:model="snmp_end2">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="card col-md-12 mb-3">
                                <h4 class="card-header text-center bg-dark text-white">Migration</h4>
                                <div class="modal-body">
                                    <div class="">
                                        <select class="form-control" wire:model="migration2">
                                            <option>--Select option--</option>
                                            @foreach ($choix as $choi)
                                                <option value="{{ $choi->option }}">{{ $choi->option }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="input-group">
                                            <input type="date" class="form-control" wire:model="migration_start2">
                                            <input type="date" class="form-control" wire:model="migration_end2">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>

    </div>
</div>
