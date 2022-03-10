
{{--@livewire('create-student')--}}
{{--@livewire('student-curd')--}}

<div class="">
    <div class="col-md-4 " style="float: right">
        <input type="text" class="form-control" wire:model="search" placeholder="search here.....">
    </div>

@if($studentUpdate)

    @include('livewire.students.update-student')

@else

    @include('livewire.students.create-student')

@endif

<table class="table table-bordered">
    <thead>
    <tr>
        <th scope="col">S.N</th>
        <th scope="col">First Name</th>
        <th scope="col">Last Name</th>
        <th scope="col">phone</th>
        <th scope="col">gender</th>
        <th scope="col">created_at</th>
        <th scope="col">updated_at</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <tr>
        @foreach($data['student'] as $i=>$students)
        <th scope="row">{{$i+1}}</th>
        <td>{{$students->first_name}}</td>
        <td>{{$students->last_name}}</td>
        <td>{{$students->phone}}</td>
            <td>
            @if($students->gender == 1)
                Male
                @else
                Female
                @endif
            </td>
        <td>{{$students->created_at->diffForHumans()}}</td>

        <td>
            @if($students->updated_at == NULL)
                NULL
            @else
                {{$students->updated_at->diffForHumans()}}
                @endif
        </td>
            <td>
                <button wire:click="Edit({{$students->id}})" class="btn btn-primary btn-sm">Update</button>


                    <button onclick="confirm('Are you sure! You want to delete this?') ||event.stopImmediatePropagation()" wire:click="Delete({{$students->id}})" type="submit" class="btn btn-danger btn-sm">Delete</button>

                </form>
            </td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>
