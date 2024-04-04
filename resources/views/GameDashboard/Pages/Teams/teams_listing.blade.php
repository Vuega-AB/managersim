<div class="teams_container">
    <hr style="margin: 30px 0">
    <table>
        <tr style="margin-bottom: 50px">
            <th>Pos</th>
            <th>Team</th>
            <th>Pld</th>
            <th>Wo</th>
            <th>Dr</th>
            <th>Lo</th>
            <th>GF</th>
            <th>GA</th>
            <th>P</th>
        </tr>
        @if(count($teams) > 0)
            @foreach($teams as $key => $team)
                <tr>
                    <td>{{ $key+1 }}</td>
                    <td>{{ $team->name }}</td>
                </tr>
            @endforeach
        @endif
    </table>
</div>

<style>
    .teams_container{
        width: 50%;
        margin: 20px auto;
        padding: 0 0 20px 0;
    }
    .teams_container table{
        width: 100%;
        color: white;
        text-align: center;
    }
    .teams_container table td {
        padding: 5px 0;
    }
</style>
