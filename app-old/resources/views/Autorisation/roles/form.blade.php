<form action="{{ isset($role) ? route('roles.update', $role->id) : route('roles.store')}}" method="POST">
    @csrf
    @if(isset($role))
        @method('PUT')
    @endif
    <div class="form-group">
        <label for="name">Nom de rôle</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Enter role name" name="name" value="{{ isset($role) ? $role->name : '' }}">
        <input type="hidden" value="web" name="guard_name">
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
    <button type="submit" class="btn btn-info">{{ isset($role) ? 'Modifier' : 'Ajoute' }}</button>
</form>
