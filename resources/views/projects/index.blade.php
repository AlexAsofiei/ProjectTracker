
<x-layout>

    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <h3 class="text-center">Projects</h3>
    </div>

    <div class="row m-2 p-3 bg-light">
        @if(!count($projects))
            <h4 class="text-center">No projects available.</h4>
        @endif

        <a href="/projects/create" class="btn btn-sm btn-success mb-3" style="width: fit-content;">
            <i class="fas fa-plus me-2"></i>Create
        </a>

        @foreach($projects as $key=>$project)
            <div class="row">
                <div class="col">
                    <a href="/projects/{{$project->id}}">{{++$key}}. {{ $project->name }}</a>
                </div>
                <div class="col d-flex justify-content-end">
                    <button class="btn btn-sm btn-{{ $project->is_active == 1 ? 'success' : 'secondary'}}">{{ $project->is_active == 1 ? 'Active' : 'Inactive'}}</button>
                </div>
            </div>
            <p>{{ $project->description }}</p>
            <hr>
        @endforeach
    </div>
    

</x-layout>
       