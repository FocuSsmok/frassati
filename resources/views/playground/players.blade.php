<form action="{{ action('Players\SetPlayer@setPlayers') }}" method="POST">
    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
    <select name="player" id="">
    @foreach ($playersList as $player)
    <option value="{{$player->id}}">
        {{$player->first_name}} {{$player->surname}}
    </option>
    @endforeach
</select>

    <select name="position" id="">
    @foreach ($positions as $position)
    <option value="{{$position->id}}">
        {{$position->name}}
    </option>
    @endforeach
</select>

    <select name="ageGroup" id="">
    @foreach ($ageGroups as $ageGroup)
    <option value="{{$ageGroup->id}}">
        {{$ageGroup->name}}
    </option>
    @endforeach
</select>

    <input type="number" name="goals" placeholder="goals">
    <input type="number" name="assists" placeholder="assists">
    <input type="number" name="yellowCards" placeholder="yellow_cards">
    <input type="number" name="redCards" placeholder="red_cards">

    <button type="submit">Zapisz!</button>
</form>