<x-layout>

    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <div class="col">
            <h3 class="">#{{$projectDTO->id}} | {{$projectDTO->name}}</h3>
        </div>        

        <div class="col d-flex justify-content-end h-50">
            <a href="/projects/{{ $projectDTO->id }}/edit" class="btn btn-sm btn-warning mx-3">
                <i class="fas fa-edit"></i>
            </a>

            <form action="{{route('projects.destroy', $projectDTO->id)}}" method="POST">
                @csrf
                @method("DELETE")

                <button class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
                </button>
            </form>
           
        </div>
    </div>

    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <h4>Description</h4>
        <hr>
        <p class="">{{$projectDTO->description}}</p>
    </div>

    <div class="row m-2 p-3 bg-light">
        <h4>Activities</h4>
        <hr>
        
        @foreach($projectDTO->activities as $key=>$activity)
            <div class="content mb-3">
                <div class="row">
                    <div class="col-sm-4">
                        <h5>{{++$key}}. {{$activity->name}}</h5>                
                    </div>
                    
                    <div class="col-sm-8 d-flex justify-content-end">
                        <p>
                            From:
                            <button class="btn btn-sm btn-success">{{$activity->start_date}}</button>
                            To:
                            <button class="btn btn-sm btn-danger">{{$activity->end_date}}</button>
                        </p>
                    </div>
                </div>          
                
                <p class="mx-4">
                    {{$activity->description}}
                </p>
    
                <div class="row mt-3 ms-3">
                    <div class="col d-flex">
                        @foreach($activity->tags as $tag)
                            <div class="bg-primary rounded-pill me-2 text-white px-2" style="width: fit-content;">
                                {{$tag->name}}
                            </div>
                        @endforeach
                        <div class="">
                            <a href="/activities/{{$activity->id}}" class="text-success">
                                <i class="fas fa-plus-circle"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>
            </div>            
        @endforeach
    </div>

</x-layout>