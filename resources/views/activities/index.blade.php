
<x-layout>

    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <h3 class="text-center">Activities</h3>
    </div>

    <div class="row m-2 p-3 bg-light">
       
        <a href="/activities/create" class="btn btn-sm btn-success mb-3" style="width: fit-content;">
            <i class="fas fa-plus me-2"></i>Create
        </a>

        @if(!count($activities))
            <h4 class="text-center">No activities available.</h4>
        @endif

        @if(count($activities))
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Project</th>
                    <th scope="col">Description</th>
                    <th scope="col">From</th>
                    <th scope="col">To</th>
                    <th scope="col" class="w-15">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($activities as $activity)
                    <tr>
                        <th scope="row">{{$activity->id}}</th>
                        <td>{{$activity->name}}</td>
                        <td>{{$activity->project->name}}</td>
                        <td>{{$activity->description}}</td>
                        <td class="text-success">{{$activity->start_date}}</td>
                        <td class="text-danger">{{$activity->end_date}}</td>
                        <td>    
                            <div class="d-flex">
                                <a href="/activities/edit/{{ $activity->id }}" class="btn btn-sm btn-warning mx-1">
                                    <i class="fas fa-edit"></i>
                                </a>                       
                                <form action="{{route('activities.destroy', $activity->id)}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                    
                                    <button class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>                                 
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        @endif
    </div>
    

</x-layout>
       