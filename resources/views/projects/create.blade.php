<x-layout>

    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <div class="col">
            <h3>Create a new project</h3>
        </div>
    </div>

    <div class="row m-2 p-3 bg-light">
        {{-- <form action="{{route('projects.update', $projectDTO->id)}}" method="PUT"> --}}
        <form action="/projects" method="POST">
            @csrf 

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <input type="textarea" name="description" class="form-control" id="description">

                @error('description')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="is_active" class="form-label">Status</label>
                <select id="is_active" class="form-select" name="is_active">
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                </select>

                @error('is_active')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
              
            <div class="d-flex align-items-center justify-content-between">
                <a class="btn btn-secondary" href="/projects">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </form>
    </div>

</x-layout>