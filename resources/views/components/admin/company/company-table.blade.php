<tr>
    <td>{{$company->id}}</td>
    <td>{{$company->name}}</td>
    <td>{{$company->description}}</td>
    <td>
        <a class="btn btn-app" href="{{route('admin.companies.show',$company)}}">
            <i class="fas fa-users"></i> Clients
        </a>
    </td>
    <td>
        <a href="{{route('admin.companies.edit',$company)}}" class="btn btn-block btn-outline-primary btn-sm">Edit</a>
    </td>
    <td>
        <form action="{{route('admin.companies.destroy',$company)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-block bg-gradient-danger btn-sm">Delete</button>
        </form>
    </td>
</tr>

