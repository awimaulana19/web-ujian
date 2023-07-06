<div class="modal fade" id="{{ 'edit'.$item->id }}" tabindex="-1" aria-labelledby="{{ 'edit'.$item->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="{{ 'edit'.$item->id }}Label">Edit Soal</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="{{ 'formedit'.$item->id }}" enctype="multipart/form-data" action="{{ '/soal/edit/'.$item->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label mb-2">Soal</label>
                        <textarea class="form-control @error('soal') is-invalid @enderror" name="soal" id="soal" style="height: 200px">{{ $item->soal }}</textarea>
                        @error('soal')
                            <div class="invalid-feedback">
                                <i class="bi bi-exclamation-circle-fill"></i>
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit</button>
            </div>
            </form>
        </div>
    </div>
</div>
