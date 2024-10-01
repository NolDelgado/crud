<div>
    VISTA PARA EL LISTADO DE VISITAS RECUERDA NO USAR ESTILOS :)
    PARA LA LOGICA DEL COMPONENTE REVISAR APP/LIVEWIRE/VISITAS/LISTADOVISITAS. LO DE ABAJO ES UN EJEMPLO DE UNA VISITA.
    <hr>
    <div class="list-item">
        <div class="buttons">
            <a href="{{ route('visits.edit') }}"><button onclick="editVisit()">Editar</button></a>
            {{-- Para el modal puede usarse dispatch() --}}
            <button onclick="deleteVisit()">Eliminar</button>
        </div>
        <a href="{{ route('visits.show', ['visit' => 1]) }}">Visita1</a>
    </div>
</div>
