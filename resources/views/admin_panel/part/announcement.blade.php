<div class="container-fluid pt-4 px-4">
    <div class="bg-light text-center rounded p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">Duyurular</h6>
            <a href="">Tümünü Gör</a>
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
                    @foreach ($announcement as $data)
                    <tr>
                        <td>{{$data->title}}</td>
                        <td>{{$data->due_date}}</td>
                        <td>{{$data->type}}</td>
                        <td>Düzenle</td>
                        <td>Sil</td>
                        <td>{{$data->activity}}</td>
                    </tr>
                    @endforeach
                    <!-- announcement content end-->

                </tbody>
            </table>
        </div>
    </div>
</div>