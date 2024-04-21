<div class="press_container">
    <table class="press_table">
        <tr>
            <th>Headline</th>
            <th>Content</th>
            <th>Manager</th>
            <th>Status</th>
        </tr>

        @if(isset($team_data[1]) && count($team_data[1]) > 0)
            @foreach($team_data[1] as $press)
                <tr>
                    <td>{{ $press->header }}</td>
                    <td>{{ \Illuminate\Support\Str::limit($press->text, 150) }}</td>
                    <td>{{ $press->humanplayerid }}</td>
                    <td>{{ $press->timesread }}</td>
                </tr>
            @endforeach
        @endif
    </table>
</div>

<style>
    .press_table{

    }
    .press_container{
        margin: 0 auto;
    }
    .press_table{
        color: white;
        width: 100%;
        margin-top: 30px;
    }
    .press_table tr td{
        padding: 10px;
        font-size: 18px;
    }
</style>
