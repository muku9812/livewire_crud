<form>
    <div class="form-row">
        <div class="form-group col-md-4">
            <label for="first"> First Name</label>
            <input type="text" wire:model="fname" id="first_name" class="form-control" placeholder="Enter Your First Name">
            @error('fname')<span class="text-danger">{{$message}}</span>@enderror
        </div>
        <div class="form-group col-md-3">
            <label for="inputPassword4">Last Name</label>
            <input type="text"  wire:model="lname" id="last_name" class="form-control" id="inputPassword4" placeholder="Enter Your Last Name">
            @error('lname') <span class="text-danger">{{$message}}</span>@enderror
        </div>
    </div>
    <div class="form-group col-md-2">
        <label for="phone">Phone</label>
        <input type="text"  wire:model="phone" id="phone" class="form-control"  placeholder="Enter Your Phone">
        @error('phone') <span class="text-danger">{{$message}}</span>@enderror
    </div>
        <div class="form-group col-md-3">
            <label for="gender">Gender</label>
            <select id="inputState"  wire:model="gender" class="form-control">
                <option selected>Choose...</option>
                <option value="1">Male</option>
                <option value="2">Female</option>
            </select>
            @error('gender') <span class="text-danger">{{$message}}</span>@enderror
        </div>


    <button type="submit" wire:click.prevent="Insert" class="btn btn-primary">Save</button>
</form>
