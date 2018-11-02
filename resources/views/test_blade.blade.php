<select name="houses" id="houses">
  @foreach($houses as $house )
    <option value="{{ $house->id }}">{{ $house->address }}</option>
  @endforeach
</select>
