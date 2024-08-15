@php
$showViewAllLink = $showViewAllLink ?? true;
$showAddButton = $showAddButton ?? false;
$limitAnnouncements = $limitAnnouncements ?? false;
$announcementLimit = $announcementLimit ?? 5;
@endphp


<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Duyurular</h6>
            <div>
                @if($showAddButton)
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                    <i class="fas fa-plus"></i> Yeni Duyuru
                </button>
                @endif
                @if($showViewAllLink)
                <a href="/announcement" class="ms-2">Tümünü Gör</a>
                @endif
            </div>
        </div>
        <div class="table-responsive">
            <table class="table text-start align-middle table-bordered table-hover mb-0">
                <!-- announcement title start -->
                <thead>
                    <tr class="text-dark">
                        <th scope="col">Duyuru</th>
                        <th scope="col">Tarih</th>
                        <th scope="col">Tür</th>
                        <th scope="col">Düzenle</th>
                        <th scope="col">Sil</th>
                        <th scope="col">Aktiflik</th>
                    </tr>
                </thead>
                <!-- announcement title end -->
                <tbody>
                    <!-- announcement content start -->
                    @foreach ($announcement->when($limitAnnouncements, function($query) use ($announcementLimit) {
                    return $query->take($announcementLimit);
                    }) as $data)
                    <tr>
                        <td>{{ $data->title }}</td>
                        <td>{{ $data->due_date }}</td>
                        <td>{{ $data->type }}</td>


                        <td>
                            <button type="button" class="btn btn-warning edit-btn" data-id="{{ $data->id }}"
                                data-title="{{ $data->title }}" data-date="{{ $data->due_date }}"
                                data-type="{{ $data->type }}" data-activity="{{ $data->activity }}" data-content="{{$data->content}}"
                                data-bs-toggle="modal" data-bs-target="#editModal">
                                Düzenle
                            </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-warning delete-btn" data-id="{{ $data->id }}"
                                data-title="{{ $data->title }}"
                                data-bs-toggle="modal" data-bs-target="#deleteModal">
                                Sil
                            </button>
                        </td>
                        <td>
                            <form action="{{ route('announcement.updateActivity', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="activity" value="1"
                                        onchange="this.form.submit()" {{ $data->activity ? 'checked' : '' }}>
                                </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                    <!-- announcement content end-->
                </tbody>
            </table>
        </div>
    </div>
</div>
@if($showAddButton)
<!-- Add Modal Start -->
@include('admin_panel.part.announcement_add')
<!-- Add Modal End -->

@endif
<!-- Edit Modal Start -->
@include('admin_panel.part.announcement_update')
<!-- Edit Modal End -->

<!-- Delete Modal Start -->
@include('admin_panel.part.announcement_delete')
<!-- Delete Modal End -->

<!-- Bootstrap JS -->