<select class="form-control" id="province" title="Seleccione una provincia">
    @foreach ($provinces as $item => $value)
        <option value="{{$item->'id'}}">
    @endforeach
</select>
