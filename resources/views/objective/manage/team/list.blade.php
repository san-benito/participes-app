@extends('objective.manage.master')

@section('panelContent')

<section>
  <h1 class="">Equipo</h1>
  <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. In eius ad officia tempora, temporibus repudiandae id
    ipsum neque deserunt rerum esse delectus consectetur voluptates eveniet quaerat commodi ducimus mollitia dolorem.
  </p>
  <hr>
  <table class="table table-sm">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Nombre y apellido</th>
        <th scope="col">Rol</th>
        <th scope="col">Email</th>
        @isManager($objective->id)
        <th width="80" class="text-center" scope="col">Accion</th>
        @endisManager
      </tr>
    </thead>
    <tbody>
      @if(count($objective->members) > 0)
        @foreach($objective->members as $member)
          <tr>
            <td>@include('utils.avatar',['avatar' => $member->avatar, 'size' => 32, 'thumbnail' => true]) {{$member->name}}<br><span class="badge badge-primary">{{$member->role}}</span></td>
            <td>{{$member->pivot->role}}</td>
            <td>{{$member->email}}</td>
            @isManager($objective->id)
             <td class="text-center">
              <div class="btn-group btn-group-sm" role="group">
                <form action="{{ route('objective.manage.team.remove.form', ['objId' => $objective->id, 'usrId' => $member->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <input type="hidden" value="{{$member->id}}">
                <button type="submit" class="btn btn-danger btn-sm">
                  Quitar
                </button>
                </form>
              </div>
            </td>
          @endisManager
            
          </tr>
        @endforeach
      @else
        <tr>
          <td colspan="3">No hay miembros en el equipo</td>
        </tr>
      @endif
    </tbody>
  </table>
</section>

@endsection
