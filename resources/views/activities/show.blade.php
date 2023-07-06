<x-layout>

    <div class="row p-3 m-2 mt-5 mb-5 bg-light rounded">
        <div class="col">
            <h3 class="">#{{$activityDTO->id}} | {{$activityDTO->name}}</h3>
        </div>
    </div>

    <div class="row m-2 p-3 bg-light">
        <h4>Add tags</h4>
        <hr>
        
        <form action="/activities-tags/{{$activityDTO->id}}" method="POST">
            @csrf

            <input type="hidden" name="activity_id" value="{{ $activityDTO->id }}">

            <div class="overflow-auto" style="max-height: 50vh;">
                @foreach($tagDTO as $tag)
                    <div class="mb-3 form-check">
                        <?php 
                            $selectedTags = implode(',', collect($activityDTO->tags)->pluck('name')->toArray());
                        ?>
                        <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" id="tag" {{ in_array($tag->name, explode(',', $selectedTags)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="tag">{{$tag->name}}</label>

                        @error('tag')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                @endforeach 
            </div>                   

            <div class="d-flex align-items-center justify-content-between">
                <a class="btn btn-secondary" href="/projects/{{$activityDTO->project_id}}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

</x-layout>