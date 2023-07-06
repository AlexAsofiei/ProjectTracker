<x-layout>
    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <div class="col">
            <h3>Create a new activity</h3>
        </div>
    </div>

    <div class="row m-2 p-3 bg-light">
        <form action="/activities/store" method="POST">
            @csrf 

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="project_id" class="form-label">Project</label>

                <select id="project_id" class="form-select" name="project_id">

                    @foreach($projects as $project)
                        <option value="{{ $project->id }}">{{ $project->name }}</option>
                    @endforeach
                    
                </select>
                
                @error('project_id')
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
                <label for="start_date" class="form-label">From</label>
                <input type="date" name="start_date" class="form-control" id="start_date">

                @error('start_date')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">To</label>
                <input type="date" name="end_date" class="form-control" id="end_date">

                @error('end_date')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>

            <div class="d-flex align-items-center justify-content-between">
                <a class="btn btn-secondary" href="/activities">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </form>
    </div>
</x-layout>