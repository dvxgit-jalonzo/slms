<!-- select.blade.php -->
@props(['data', 'placeholder', 'column', 'id', 'value' => ''])


@php
    $name = $attributes->get('name');
    $class = $errors->has($name) ?
    "form-select is-invalid " :
    "form-select";

    $val = "";

    if (old($name)){
        $val = old($name);
    }

    if (!empty($value)){
        $val = $value;
    }
@endphp

<select id="{{$id}}" data-placeholder="{{$placeholder}}" {{$attributes->merge(['class' => $class])}}>
    <option disabled selected>{{$placeholder}}</option>
    @foreach($data as $item)
        <option @if($val == $item->$column) selected @else  @endif value="{{$item->$column}}">{{$item->$column}}</option>
    @endforeach
</select>
{{$slot}}

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#{{$id}}').select2();
        });
    </script>
@endpush

