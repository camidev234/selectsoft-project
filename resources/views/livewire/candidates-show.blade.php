<div>
    <link rel="stylesheet" href="{{asset('css/barSearch.css')}}">
    <section class="info-options">
        <h4>Listado de Candidatos en el sistema</h4>
        <section class="actions">
            <article class="action acOne">
                <img src="{{asset('img/icone-crayon-bleu.png')}}" alt="lapiz_icon">
                <h5>Modificar Rol</h5>
            </article>
            <article class="action">
                <img src="{{asset('img/papelera.png')}}" alt="icon">
                <h5>Eliminar</h5>
            </article>
        </section>
    </section>
    <section class="barserach">
        <input type="text" name="" id="" wire:model.live="queryWord" placeholder="Busqueda por numero de documento">
    </section>
    <section class="table-content">
        <table>
            <thead>
                <tr>
                    <th>
                        <h5>Tipo De Documento</h5>
                    </th>
                    <th>
                        <h5>Documento</h5>
                    </th>
                    <th>
                        <h5>Nombres</h5>
                    </th>
                    <!-- <th><h5>Primer Apellido</h5></th> -->
                    <th>
                        <h5>Apellidos</h5>
                    </th>
                    <th>
                        <h5>Acciones</h5>
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($candidates as $candidate)
                <tr wire:key="{{$candidate->id}}">
                    <td>{{$candidate->user->document_type->document_type}}</td>
                    <td>{{$candidate->user->number_document}}</td>
                    <td>{{$candidate->user->name}}</td>
                    <td>{{$candidate->user->last_name}}</td>
                    <td class="actions-table">
                        <form action="{{route('instructor.editUserRole', ['user' => $candidate->user_id])}}" method="get">
                            <button><i class="bi bi-pencil-fill btn2"></i></button>
                        </form>
                        <form action="{{route('instructor.destroyUser', ['user' => $candidate->user_id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button><i class="bi bi-trash3" style="color: red;"></i></button>
                        </form>
                    </td>
                </tr>
                @empty
            <tbody>
                <tr>
                    <td>No hay Candidatos para mostrar</td>
                </tr>
            </tbody>
            @endforelse

            </tbody>
        </table>
    </section>
</div>