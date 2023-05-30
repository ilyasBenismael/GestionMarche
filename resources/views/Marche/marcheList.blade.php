@extends('layouts.app')

@section('content')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@0.24.0/dist/axios.min.js"></script>

    <div class="addmarketcontainer" style="margin-bottom: 30px;">
        <div class="addmarket">
            <a href="/addMarche" style="text-decoration: none;font-size: 20px;margin-left: 25px;">
                <i class="fa-solid fa-shop"></i>
                <span>Ajouter Un Marché</span>
            </a>
        </div>
    </div>


    <div class="container">
        <table class="table night-mode" id="dataTable">
            <thead>
            <tr>
                <th>statut</th>
                <th>Numero Marche</th>
                <th>Exercice</th>
                <th>Montant</th>
                <th>Date</th>
                <th>Attachement</th>
                <th>Prix</th>
                <th>Show Marche</th>
                <th>Update marche</th>
                <th>Resillier</th>
                <th>Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($marches as $marche)
                <tr>
                    <td>
                        @if(!isset($marche->date_ordre_service))
                            En Instance
                        @elseif(isset($marche->date_ordre_service) and !isset($marche->date_reception_provisoire))
                            En Cours
                        @elseif(isset($marche->date_ordre_service) and isset($marche->date_reception_provisoire) and !isset($marche->date_reception_definitive))
                            Réceptionné
                        @elseif(isset($marche->date_ordre_service) and isset($marche->date_reception_provisoire) and isset($marche->date_reception_definitive))
                            Clôturé
                        @else
                            Error
                        @endif

                    </td>
                    <td>{{$marche->numero_marche}}</td>
                    <td>{{$marche->exercice}}</td>
                    <td>{{$marche->montant}}</td>
                    <td>
                        @if(!isset($marche->date_ordre_service))
                            <i class="fa-solid fa-circle-xmark" style="color: #c9371d"></i>
                            <i class="fa-solid fa-circle-xmark" style="color: #c9371d"></i>
                            <i class="fa-solid fa-circle-xmark" style="color: #c9371d"></i>
                            <i class="fa-solid fa-circle-info marche-details" data-marche-id="{{ $marche->id }}" style="color: #FFC107; cursor: pointer"></i>
                        @elseif(isset($marche->date_ordre_service) and !isset($marche->date_reception_provisoire))
                            <i class="fa-solid fa-circle-check" style="color: #2bb659"></i>
                            <i class="fa-solid fa-circle-xmark" style="color: #c9371d"></i>
                            <i class="fa-solid fa-circle-xmark" style="color: #c9371d"></i>
                            <i class="fa-solid fa-circle-info marche-details" data-marche-id="{{ $marche->id }}" style="color: #FFC107; cursor: pointer"></i>
                        @elseif(isset($marche->date_ordre_service) and isset($marche->date_reception_provisoire) and !isset($marche->date_reception_definitive))
                            <i class="fa-solid fa-circle-check" style="color: #2bb659"></i>
                            <i class="fa-solid fa-circle-check" style="color: #2bb659"></i>
                            <i class="fa-solid fa-circle-xmark" style="color: #c9371d"></i>
                            <i class="fa-solid fa-circle-info marche-details" data-marche-id="{{ $marche->id }}" style="color: #FFC107; cursor: pointer"></i>
                        @elseif(isset($marche->date_ordre_service) and isset($marche->date_reception_provisoire) and isset($marche->date_reception_definitive))
                            <i class="fa-solid fa-circle-check" style="color: #2bb659"></i>
                            <i class="fa-solid fa-circle-check" style="color: #2bb659"></i>
                            <i class="fa-solid fa-circle-check" style="color: #2bb659"></i>
                            <i class="fa-solid fa-circle-info marche-details" data-marche-id="{{ $marche->id }}" style="color: #FFC107; cursor: pointer"></i>
                        @else
                            Error
                        @endif
                    </td>
                    <td><a href="/attachement/create/{{$marche->id}}">Create attachement</a></td>
                    <td><a href="/prix/create/{{$marche->id}}">Create prix</a></td>
                    <td style="text-align: center">
                        <a href="/marche/{{$marche->id}}" class="btn btn-sm btn-primary"><i
                                class="fas fa-eye"></i> </a></td>
                    <td style="text-align: center">
                        <a href="{{ route('marche.edit', ['id' => $marche->id]) }}"
                           class="btn btn-sm btn-warning middle" >
                            <i class="fas fa-edit" style="color: white"></i>
                        </a>
                    </td>
                    <td>
                        <button class="marche-details1 btn btn-danger" data-marche-id="{{ $marche->id }}">Resillier</button>
                    </td>
                    <td style="text-align: center">
                        <form action="{{ route('marche.destroy', ['id' => $marche->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-danger" onclick="confirmDelete(event, {{ $marche->id }})">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>


                <div class="pop-up" id="pop-up-{{ $marche->id }}">
                    <div class="content">
                        <div class="container-pop-up">

                            <span class="close"><i class="fa-regular fa-circle-xmark"></i></span>

                            <div class="subscribe">
                                <div class="row subscribe-row">
                                    <h3>Marche Numero : {{$marche->id}}</h3>
                                    <div class="col-4">
                                        <form action="{{ route('marche.addDateOrdreService', ['id' => $marche->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            @if(!isset($marche->date_ordre_service))
                                                <div class="border-grp" style="border: 2px solid #c9371d;">
                                                    <div class="form-group" style="line-height: 4.1">
                                                        <label for="date_ordre_service_input" style="width: 100%">
                                                            <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #c9371d3d;">
                                                                <i class="fa-solid fa-circle-xmark" style="color: #c9371d; font-size: 25px;margin-right: 5px;"></i> Date Ordre service:</h6>
                                                        </label>
                                                        <input type="date" id="date_ordre_service_input" name="date_ordre_service_input" style="background: white;color: black;line-height: 2.5;border-radius: 8px;width: 65%;padding: 0">
                                                    </div>
                                                    <button type="submit" class="btn add-date" style="margin-bottom: 15px;">Add date Ordre service</button>
                                                </div>
                                            @else
                                                <div class="done" style="border: 2px solid #2bb659; line-height: 4.1">
                                                    <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #2bb6592b;"><i class="fa-solid fa-circle-check" style="color: #2bb659;font-size: 25px;margin-right: 5px;"></i> Date Ordre service:</h6>
                                                    <p style="font-weight: 600">{{$marche->date_ordre_service}}</p>
                                                </div>
                                            @endif
                                        </form>
                                    </div>

                                    <div class="col-4">
                                        <form action="{{ route('marche.addDateReceptionProvisoire', ['id' => $marche->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            @if(!isset($marche->date_reception_provisoire))
                                                <div class="border-grp" style="border: 2px solid #c9371d;">

                                                    <div class="form-group" style="line-height: 4.1">
                                                        <label for="date_reception_provisoire_input" style="width: 100%">
                                                            <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #c9371d3d;">
                                                                <i class="fa-solid fa-circle-xmark" style="color: #c9371d; font-size: 25px;margin-right: 5px;"></i> Date Reception Provisoire:</h6>
                                                        </label>
                                                        <input type="date" id="date_reception_provisoire_input" name="date_reception_provisoire_input" style="background: white;color: black;line-height: 2.5;border-radius: 8px;width: 65%;padding: 0">
                                                    </div>
                                                    @if(!isset($marche->date_ordre_service))

                                                        <button type="submit" class="btn add-date" disabled style="margin-bottom: 15px;">Add Date Reception Provisoire</button>
                                                    @else
                                                        <button type="submit" class="btn add-date" style="margin-bottom: 15px;">Add Date Reception Provisoire</button>
                                                    @endif

                                                </div>
                                            @else
                                                <div class="done" style="border: 2px solid #2bb659;line-height: 4.1">
                                                    <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #2bb6592b;"><i class="fa-solid fa-circle-check" style="color: #2bb659; font-size: 25px;margin-right: 5px;"></i> Date Reception Provisoire:</h6>
                                                    <p style="color: var(--color-night);font-weight: 600">{{$marche->date_reception_provisoire}}</p>
                                                </div>
                                            @endif
                                        </form>
                                    </div>

                                    <div class="col-4">
                                        <form method="POST">
                                            @csrf
                                            @method('PUT')

                                            @if(!isset($marche->date_reception_definitive))
                                                <div class="border-grp" style="border: 2px solid #c9371d;">
                                                    <div class="form-group" style="line-height: 4.1">
                                                        <label for="date_reception_definitive_input" style="width: 100%">
                                                            <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #c9371d3d;">
                                                                <i class="fa-solid fa-circle-xmark" style="color: #c9371d; font-size: 25px;margin-right: 5px;"></i> Date Reception Definitive:</h6>
                                                        </label>
                                                        <input type="date" id="date_reception_definitive_input" name="date_reception_definitive_input" style="background: white;color: black;line-height: 2.5;border-radius: 8px;width: 65%;padding: 0">
                                                    </div>

                                                    @if(!isset($marche->date_reception_provisoire))
                                                        <button disabled type="submit" class="btn add-date disabled-btn" style="margin-bottom: 15px;">Date Reception Definitive</button>
                                                    @else
                                                        <button type="submit" class="btn add-date" style="margin-bottom: 15px;">Date Reception Definitive</button>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="done" style="border: 2px solid #2bb659;  line-height: 4.1">

                                                    <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #2bb6592b;"><i class="fa-solid fa-circle-check" style="color: #2bb659;font-size: 25px;margin-right: 5px;"></i> Date Reception Definitive:</h6>
                                                    <p style="font-weight: 600">{{$marche->date_reception_definitive}}</p>
                                                </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="pop-up1" id="pop-up1-{{ $marche->id }}">
                    <div class="content1">
                        <div class="container-pop-up1">

                            <span class="close1"><i class="fa-regular fa-circle-xmark"></i></span>

                            <h3>Marche Numero : {{$marche->id}}</h3>
                            <div class="col-4">
                                <form action="{{ route('marche.addDateResiliation', ['id' => $marche->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if(!isset($marche->date_resiliation))
                                        <div class="border-grp" style="border: 2px solid #c9371d;">
                                            <div class="form-group" style="line-height: 4.1">
                                                <label for="date_resiliation_input" style="width: 100%">
                                                    <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #c9371d3d;">
                                                        <i class="fa-solid fa-circle-xmark" style="color: #c9371d; font-size: 25px;margin-right: 5px;"></i> Date Resiliation :</h6>
                                                </label>
                                                <input type="date" id="date_resiliation_input" name="date_resiliation_input" style="background: white;color: black;line-height: 2.5;border-radius: 8px;width: 65%;padding: 0">
                                            </div>
                                            <button type="submit" class="btn add-date" style="margin-bottom: 15px;">Add date Resiliation</button>
                                        </div>
                                    @else
                                        <div class="done" style="border: 2px solid #2bb659; line-height: 4.1">
                                            <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #2bb6592b;"><i class="fa-solid fa-circle-check" style="color: #2bb659;font-size: 25px;margin-right: 5px;"></i> Date Resiliation:</h6>
                                            <p style="font-weight: 600">{{$marche->date_resiliation}}</p>
                                        </div>
                                    @endif
                                </form>

                            </div>

                            <div class="col-4">
                                <form action="{{ route('marche.addMotifResiliation', ['id' => $marche->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    @if(!isset($marche->motif_resiliation))
                                        <div class="border-grp" style="border: 2px solid #c9371d;">
                                            <div class="form-group" style="line-height: 4.1">
                                                <label for="motif_resiliation_input" style="width: 100%">
                                                    <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #c9371d3d;">
                                                        <i class="fa-solid fa-circle-xmark" style="color: #c9371d; font-size: 25px;margin-right: 5px;"></i> Motif Resiliation :</h6>
                                                </label>
                                                <input type="text" id="motif_resiliation_input" name="motif_resiliation_input" style="background: white;color: black;line-height: 2.5;border-radius: 8px;width: 65%;padding: 0">
                                            </div>
                                            <button type="submit" class="btn add-date" style="margin-bottom: 15px;">Add Motif Resiliation</button>
                                        </div>
                                    @else
                                        <div class="done" style="border: 2px solid #2bb659; line-height: 4.1">
                                            <h6 class="d-flex justify-content-center align-items-center" style="padding: 25px 0;background-color: #2bb6592b;"><i class="fa-solid fa-circle-check" style="color: #2bb659;font-size: 25px;margin-right: 5px;"></i> Motif Resiliation:</h6>
                                            <p style="font-weight: 600">{{$marche->motif_resiliation}}</p>
                                        </div>
                                    @endif
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            @endforeach





            </tbody>
        </table>
    </div>



@endsection

@section('scripts')
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" charset="utf8"
            src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

    <script>

        $(document).ready(function() {
            $('#dataTable').DataTable({
                dom: 'Bfrtip',
                buttons: ['copy', 'excel', 'pdf', 'print']
            });
        });

        function confirmDelete(event, id) {
            event.preventDefault();

            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    location.reload();
                    // Send the AJAX request to delete the marche
                    axios.delete('/marche/' + id)
                        .then(function(response) {
                            // Handle the success response
                            Swal.fire({
                                title: 'Deleted!',
                                text: 'The marche has been deleted.',
                                icon: 'success'
                            }).then(() => {
                                // Reload the page to reflect the updated list
                                location.reload();
                            });
                        })
                        .catch(function(error) {
                            // Handle the error response
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the marche.',
                                icon: 'error'
                            });
                        });
                }
            });
        }


    </script>
@endsection
