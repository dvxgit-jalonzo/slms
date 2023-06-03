
@props(['placeholder' => 'placeholder', 'type' => 'text', 'name' => '', 'value' => ''])

@php
    $error = $errors->has($name) ? 'is-invalid' : '';
@endphp

<div class="form-floating">
    <input id="{{$name}}" name="{{$name}}" type="{{$type}}" value="{{$value}}" {{$attributes->merge(['class' => 'form-control '.$error])}} placeholder="{{$placeholder}}">
    <label for="{{$name}}" class="text-muted">{{$placeholder}}</label>
    {{$slot}}
</div>
