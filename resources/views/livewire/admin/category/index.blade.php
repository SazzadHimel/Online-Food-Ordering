<div>
    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Category Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form wire:submit.prevent = "destroyCategory">
                <div class="modal-body">
                    <h6>Are you sure to delete this category?</h6>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes, Delete</button>
                </div>
            </form>

            </div>
        </div>
    </div>

    <div class='row'>
        <div class='col-md-12'>
            
            @if (session('message'))
                <div class='alert alert-success'>{{ session('message') }}</div>
            @endif


            <div class='card'>
                <div class='card-header'>
                    <h3>Food Categories
                        <a href="{{ url('admin/category/create') }}"><button class="long-main-btn btn-sm float-end">Add Category</button></a>
                    </h3>
                </div>
                
                <div>
                    <div class='card-body'>
                        <table class='table table-bordered table-striped'>
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->status == '1'? 'Hidden':'Visible'}}</td>
                                    <td>
                                        <a href="{{ url('admin/category/'.$item->id.'/edit')}}" class='btn btn-sm btn-success'>Edit</a>
                                        <a href="{{ route('admin.category.delete', ['id' => $item->id]) }}" onclick="return confirm('Are you sure to delete this user?')" class='btn btn-sm btn-danger'>
                                        Delete</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div>{{$categories->links()}}</div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@push('script')

<script>
    window.addEventListener('close-modal', event=>{
        $('#deleteModal').modal('hide');
    });
</script>

@endpush