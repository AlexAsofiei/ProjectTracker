<x-layout>

    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <div class="col">
            <h3>Create a new tag</h3>
        </div>
    </div>

    <div class="row m-2 p-3 bg-light">
        <form action="/tags" method="POST">
            @csrf 

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="name">
                @error('name')
                    <span class="text-danger">{{$message}}</span>
                @enderror
            </div>           
              
            <div class="d-flex align-items-center justify-content-between">
                <a class="btn btn-secondary" href="/tags">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            
        </form>
    </div>

</x-layout>