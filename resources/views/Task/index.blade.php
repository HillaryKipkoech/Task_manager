@extends('../layouts.app')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tasks manager</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New user</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>Task Name</th>
            <th>priority</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($tasks as $tasks)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $tasks->task_name }}</td>
            <td>{{ $tasks->priority }}</td>
            <td>
                <form action="{{ route('tasks.destroy',$tasks->id) }}" method="POST">
   
                    
    
                    <a class="btn btn-primary" href="{{ route('tasks.edit',$tasks->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
   
      
@endsection
