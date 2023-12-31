<form action="{{ $action }}" method="post">
    @csrf
    @if($method == 'PUT')
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="email" class="form-label">User email</label>
        <div class="mt-1">
            <input type="email" value="{{ old('name' , $user->email) }}"  class="form-control @error('name') is-invalid @enderror " id="email" name="email" >
            @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <label class ="mt-2" for="email" class="form-label">User Type</label>
        <div class="mt-1">
            <input type="text" value="{{ old('type' , $user->type) }}"  class="form-control @error('type') is-invalid @enderror " id="type" name="type" required>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mt-4">
            <label class ="" for="email" class="form-label"><strong>User Roles</strong></label>
            @foreach($roles as $role)
                <div class="form-check">
                    <input class="form-check-input" type="checkbox"  name="roles[]" value="{{$role->id}}" @checked(in_array($role->id , $user->roles->pluck('id')->toArray() ?? []))>
                    <label class="form-check-label">
                        {{ $role->name }}
                    </label>
                </div>
            @endforeach
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
</form>
