<tr>
    <td>{{$client->id}}</td>
    <td>{{$client->name}}</td>
    <td>{{$client->email}}</td>
    <td>
        <a class="btn btn-app" href="{{route('admin.clients.show',$client)}}">
            <i class="far fa-building"></i> Companies
        </a>
    </td>
    <td>
        <a href="{{route('admin.clients.edit',$client)}}" class="btn btn-block btn-outline-primary btn-sm">Edit</a>
    </td>
    <td>
        <form action="{{route('admin.clients.destroy',$client)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-block bg-gradient-danger btn-sm">Delete</button>
        </form>
    </td>
</tr>

