<div>
    <section class="findCom">
        <input type="search" name="search" placeholder="Buscar empresa por nit" wire:model.live="queryWord">
    </section>
    <section class="showCompanies">
        <table>
            <thead>
                <tr>
                    <th>Nit</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($allCompanies as $company)
                <tr>
                    <td>{{$company->nit}}</td>
                    <td>{{$company->business_name}}</td>
                    <td>
                        @if($role_id == 3)
                        <form action="{{route('recruiter.joinCompany', ['company' => $company->id])}}" method="get">
                            <button>Vincularse</button>
                        </form>
                        @else
                        <form action="{{route('selector.joinCompany', ['company' => $company->id])}}" method="get">
                            <button>Vincularse</button>
                        </form>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td>No hay empresas para mostrar</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </section>
</div>