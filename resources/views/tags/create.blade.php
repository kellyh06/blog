@extends('partials.layout')
@section('title', 'New Tag')
@section('content')
<div class="card bg-base-300 w-1/2 mx-auto">
    <div class="card-body">
        <form action="{{route('tags.store')}}" method="POST">
            @csrf
            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Name')</legend>
                <input type="text" name="name" class="input w-full" value="{{ old('name') }}" placeholder="@lang('Name')"
                    required autofocus />
                @error('name')
                <p class="label">{{ $message }}</p>
                @enderror
            </fieldset>
            <button class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
