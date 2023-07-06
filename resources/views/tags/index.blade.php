
<x-layout>

    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <h3 class="text-center">Tags</h3>
    </div>

    <div class="row m-2 p-3 bg-light">
        @if(!count($tags))
            <h4 class="text-center">No tags available.</h4>
        @endif

        <a href="/tags/create" class="btn btn-sm btn-success mb-3" style="width: fit-content;">
            <i class="fas fa-plus me-2"></i>Create
        </a>

        @if(count($tags))
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($tags as $tag)
                    <tr>
                        <th scope="row">{{$tag->id}}</th>
                        <td>{{$tag->name}}</td>
                        <td>                                   
                            <form action="{{route('tags.destroy', $tag->id)}}" method="POST">
                                @csrf
                                @method("DELETE")
                
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>                            
                        </td>
                    </tr>
                @endforeach
                
                </tbody>
            </table>
        @endif
    </div>
    

</x-layout>
       