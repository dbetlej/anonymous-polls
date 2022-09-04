<div>
    <table>
        <thead>
            <tr>
                <th>UUID</th>
                <th>Score</th>
                <th>Started_at</th>
                <th>Ended_at</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($resolveds as $resolved)
                <tr>
                    <td>{{ $resolved->access_key }}</td>
                    <td>{{ $resolved->score }}</td>
                    <td>{{ $resolved->started_at }}</td>
                    <td>{{ $resolved->ended_at }}</td>
                    <td>
                        <form action="{{ route('resolveds.destroy', $resolved->access_key) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="color: tomato"> DELETE </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $resolveds->links() }}
</div>
