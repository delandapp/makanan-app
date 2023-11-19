@extends('layout.navbar')
@section('title', 'Table')
@section('content')
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Authors table</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Meja</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Makanan</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status Desc</th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                        <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Employed</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="../assets/img/team-2.jpg" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $data['data_order']['user']->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $data['data_order'][''] }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-xs font-weight-bold mb-0 text-center">{{ $data['data_order']['meja']->name }}</td>
                                            <td class="text-xs font-weight-bold mb-0 text-center">
                                            @foreach ($data['data_order']['masakan'] as $item)
                                            - {{ $item['nama'] }} <br>
                                            @endforeach
                                            </td>
                                            <td class="text-xs font-weight-bold mb-0">{{ $data['data_order']["keterangan"]->name}}</td>
                                            {{-- <td class="text-xs font-weight-bold mb-0">{{ $item['keterangan'] }}</td> --}}
                                            <td class="align-middle text-sm">
                                                <span
                                                    class="badge badge-sm @if ($data['data_order']['status'] == 'succsess') {{ 'bg-gradient-success' }} @else {{ 'bg-gradient-secondary' }} @endif">
                                                    @if ($data['data_order']['status'] == 'succsess')
                                                        {{ 'Sucsess' }}
                                                    @elseif ($data['data_order']['status'] == 'pending')
                                                        {{ 'Pending' }}
                                                    @else
                                                        {{ 'Tidak Sucsess' }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $data['data_order']['created_at']->format('d/m/Y') }}</span>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
@endsection
