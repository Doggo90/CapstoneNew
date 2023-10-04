@extends('admin.admin_dashboard')
@section('admin')

<form class="search-form" action="/admin/roles/manage">
    <div class="input-group">
        <div class="input-group-text">
            <i data-feather="search"></i>
        </div>
        <input type="text" class="form-control" name="search" id="search" placeholder="Search here...">
    </div>
</form>

<div class="col-md-12 col-xl-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
        <h6 class="card-title mb-0">All Posts</h6>
        </div>
        <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead>
            <tr>
                <th class="pt-0">Author</th>
                <th class="pt-0">Title</th>
                <th class="pt-0">Tags</th>
                <th class="pt-0">Body</th>
                <th class="pt-0">Edit</th>
                <th class="pt-0">Delete</th>
                <th class="pt-0">Likes</th>
                <th class="pt-0">Comments</th>
                <th class="pt-0">Link</th>
            </tr>
            </thead>
            <tbody>
                <style> 
                .truncate {
                    max-width: 300px; /* Adjust the maximum width as needed */
                    overflow: hidden;
                    white-space: nowrap;
                    text-overflow: ellipsis;
                }</style>
                @foreach ($listingAuthors as $listingAuthor)
                <tr>
                    @if ($listingAuthor->author)
                        <td>{{ $listingAuthor->author->name }}</td>
                        <!-- Other author attributes -->
                    @else
                        <td>No author found!</td>
                    @endif
                    <td>{{$listingAuthor->title}}</td>
                    <td>{{$listingAuthor->tags}}</td>
                    <td class="truncate">{{ $listingAuthor->body }}</td>
                    <td><a href="{{ route('admin.roles.edit_roles', ['id' => $listingAuthor->id]) }}">
                            <span class="badge bg-info">Edit</span>
                        </a>
                    </td>
                    <td>
                            <form method="POST" action="allposts/{{$listingAuthor->id}}">
                                @csrf
                                @method('DELETE')
                                <button class="text-red-500"><i class="fa-solid fa-trash"> Delete</i></button>
                            </form>
                    </td>
                    <td>232</td>
                    <td>54</td>
                    <td><a href="{{ route('listings.show', ['listing' => $listingAuthor->id]) }}">
                        <span class="badge bg-info">Link</span>
                    </a>
                    </td>
                </tr>
                @endforeach
                
            </tbody>
            
        </table>
        
        </div>
    </div> 
    {{-- {{ $allUsers->links()}}
    {{ $users->links()}} --}}

    </div>
</div>



@endsection