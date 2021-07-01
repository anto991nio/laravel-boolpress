<form action="{{ route('admin.destroy', $id) }}" method="post" class="delete_form">
    @csrf
    @method('DELETE')

    <input type="submit" value="Cancella" class="btn btn-danger">
</form>
