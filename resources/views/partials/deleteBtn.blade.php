<form action="{{ route('admin.destroy', $id) }}" method="post" class="delete_form">
    @csrf
    @method('DELETE')

    <button type="submit" value="Cancella" class="btn btn-secondary "><a href="#"><i  class="fa fa-trash text-secondary" aria-hidden="true"> Cancella</i></a></button>
    
</form>
