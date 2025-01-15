@extends('layouts.ormawa.main')
@section('title', 'Edit Link')
@section('content')
<form action="{{ route('ormawa.whatsapp.update', $link->id) }}" method="POST">
    @csrf
    @method('PUT') <!-- Since this is an update, we use the PUT method -->
    <div class="form-group">
        <label for="link">WhatsApp Link</label>
        <input type="url" class="form-control" id="link" name="link" value="{{ old('link', $link->link) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Update Link</button>
</form>

@endsection
