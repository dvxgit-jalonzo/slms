@props(['data', 'placeholder', 'column', 'column_val', 'id', 'value' => ''])

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
        <option @if($val == $item->$column_val) selected @else  @endif value="{{$item->$column_val}}">{{$item->$column}}</option>
    @endforeach
</select>


@push('scripts')
    <script>
        $(document).ready(function() {
            $('#{{$id}}').select2({
                theme: "bootstrap-5",
                width: $(this).data('width') ? $(this).data('width') : $(this).hasClass('w-100') ? '100%' : 'style',
            });
        });
    </script>
@endpush
