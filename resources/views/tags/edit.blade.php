@extends('partials.layout')

@section('title', 'Update ' . $tag->name)

@section('content')
<div class="card bg-base-300 w-1/2 mx-auto">
    <div class="card-body">
        <form action="{{route('tags.update', $tag)}}" method="POST">

            @csrf

            @method('PUT')

            <fieldset class="fieldset">
                <legend class="fieldset-legend">@lang('Name')</legend>
                <input type="text" name="name" class="input w-full" value="{{ old('name', $tag->name) }}" placeholder="@lang('Name')"

                    required autofocus />

                @error('name')
                <p class="label">{{ $message }}</p>

                @enderror
            </fieldset>
            <button class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
