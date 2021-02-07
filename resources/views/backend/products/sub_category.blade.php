@foreach ($categories as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td>{{ $category->slug }}</td>
        <td>{{ ucfirst($category->status) }}</td>
        <td>{{ ucfirst($category->status) }}</td>

        <td>
            <a href="{{ route('staff.category.edit', $category->id) }}"><button class="btn btn-sm btn-danger"><i
                        class="bx bx-edit"></i></button></a>
            <button class="btn btn-sm btn-danger" onclick="document.getElementById('delete').submit()"><i
                    class="bx bx-trash-alt"></i></button>

            <form id="delete" action="{{ route('staff.category.destroy', $category->id) }}" method="post">
                @csrf
                @method('DELETE')
            </form>
        </td>
    </tr>

@endforeach
