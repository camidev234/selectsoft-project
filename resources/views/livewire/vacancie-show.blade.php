<div>
    <section class="findCom">
        <input type="text" name="search" wire:model.live="queryWord" placeholder="Buscar vacante por codigo o cargo">
    </section>
    <table class="table_container">
        <thead class="table_head">
            <tr>
                <th>Codigo</th>
                <th>Cargo</th>
                <th>Vacantes</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody class="table_body">
            @forelse($vacants as $vacant)
            <tr wire:key="{{$vacant->id}}">
                <td>{{ $vacant->vacancie_code }}</td>
                <td>{{ $vacant->charge->charge }}</td>
                <td>{{ $vacant->requisiton->number_vacancies }}</td>
                <td>
                    @if($vacant->is_active)
                    Activa
                    @else
                    Inactiva
                    @endif
                </td>
                <td class="actions-l">
                    <form action="{{route('vacancies.editStatus', ['vacancie' => $vacant->id])}}" method="post">
                        @csrf
                        @method('PATCH')
                        <button class="btnaction oneyBtn"><i class="{{$vacant->is_active ? 'bi bi-ban bt' : 'bi bi-check-circle-fill bt'}}"></i></button>
                    </form>
                    <form action="{{route('vacancies.edit', ['vacancie' => $vacant->id, 'company' => $company->id])}}" method="get">
                        <button class="btnaction twoBtn"><i class="bi bi-pencil-fill bt"></i></button>
                    </form>
                    <form action="{{route('vacancies.show', ['vacancie' => $vacant->id])}}" method="get">
                        <button class="btnaction threeBtn"><i class="bi bi-eye-fill bt"></i></button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td>No hay Vacantes para esta empresa</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>