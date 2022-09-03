<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Slug</th>
                @if(auth()->check())
                    <th>Edit</th>
                    <th>Delete</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach($polls as $poll)
                <tr>
                    <td>{{ $poll->id }}</td>
                    <td> <a href="{{ route('polls.show', $poll->slug) }}">{{ $poll->name }}</a> </td>
                    <td> <a href="{{ route('polls.show', $poll->slug) }}">{{ $poll->slug }}</a> </td>
                    @if(auth()->check() && auth()->user()->id == $poll->creator_id)
                        <td> <a href="{{ route('polls.edit', $poll->id) }}"  style="color: deepskyblue">Edit</a> </td>
                        <td>
                            <form action="{{ route('polls.destroy', $poll->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="color: tomato">Delete</button>
                            </form>
                        </td>
                    @endif
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $polls->links() }}
</div>
