@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

    <!-- Hoverable Table rows -->
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <h4>All Posts</h4>
            <a href="{{ route('posts.create') }}">
                <button type="button" class="btn btn-icon btn-success" data-bs-toggle="tooltip" data-bs-offset="0,4"
                    data-bs-placement="top" data-bs-html="true"
                    title="<i class='bx bx-plus bx-xs' ></i> <span>Add posts</span>">
                    <span class="tf-icons bx bx-plus"></span>
                </button>
            </a>
        </div>
        @if (session('success'))
            <div class="alert alert-success">
                <span><i class='bx bx-check'></i></span>{{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                <span><i class='bx bx-x'></i></span>{{ session('error') }}
            </div>
        @endif
        <div class="table-responsive text-nowrap">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th>#</th>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Price</th>
                        <th>Update</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @if (count($prop_lists ?? []) ?? false)
                        @foreach ($prop_lists ?? [] as $index => $prop_list)
                            <tr>
                                <td>{{ ($prop_lists->currentPage() - 1) * 10 + ($index + 1) }}</td>
                                <td>{{ $prop_list->listing_id }}</td>
                                <td>{{ $prop_list->title }}</td>
                                <td>{{ number_format($prop_list->price) }}</td>
                                @php
                                    $updatedDate = new Carbon\Carbon($prop_list->updated_at);
                                @endphp
                                <td>{{ $updatedDate->thaidate('j M Y') }}</td>
                                <td>
                                    <a href="{{ route('posts.edit', ['post' => $prop_list->listing_id]) }}">
                                        <button type="button" class="btn btn-icon btn-primary" data-bs-toggle="tooltip"
                                            data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true"
                                            title="<i class='bx bx-cog bx-xs' ></i> <span>Edit news</span>">
                                            <span class="tf-icons bx bx-cog"></span>
                                        </button>
                                    </a>
                                    <button type="button" class="btn btn-icon btn-danger delnews"
                                        post-id="{{ $prop_list->id }}" data-bs-toggle="tooltip" data-bs-offset="0,4"
                                        data-bs-placement="top" data-bs-html="true"
                                        title="<i class='bx bx-trash bx-xs' ></i> <span>Delete news</span>">
                                        <span class="tf-icons bx bx-trash"></span>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6">
                                <div class="text-center">ไม่พบรายการ</div>
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
            {{ $prop_lists->links() }}
        </div>
    </div>
    <!--/ Hoverable Table rows -->
    <script>
        $(document).ready(function() {
            $('.delnews').click(function() {
                const pid = $(this).attr('post-id');
                Swal.fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!"
                }).then((result) => {
                    if (result.isConfirmed && result.value) {
                        $.ajax({
                            url: '/admin/posts/' +
                                pid, // URL where the POST request is sent
                            type: 'delete',
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                    'content') // CSRF token for Laravel
                            },
                            success: function(response) {
                                console.log(response.message)
                                Swal.fire('Saved!', 'Post has been deleted.',
                                        'success')
                                    .then((result) => {
                                        if (result.isConfirmed) {
                                            window.location.reload()
                                        }
                                    });
                            },
                            error: function(error) {
                                // Handle errors
                                Swal.fire('Error',
                                    'There was a problem deleting the post.',
                                    'error');
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
