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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama
                                        </th>
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Status
                                        </th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Employed</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Option</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_order'] as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('gambar/user/' . $item['user']->gambar) }}" class="avatar avatar-sm me-3"
                                                            alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['user']->name }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $item['user']->email }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle text-sm">
                                                <span
                                                    class="badge badge-sm @if ($item['status'] == 'succsess') {{ 'bg-gradient-success' }} @else {{ 'bg-gradient-secondary' }} @endif">
                                                    @if ($item['status'] == 'succsess')
                                                        {{ 'Sucsess' }}
                                                    @elseif ($item['status'] == 'pending')
                                                        {{ 'Pending' }}
                                                    @else
                                                        {{ 'Tidak Sucsess' }}
                                                    @endif
                                                </span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item['created_at']->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="/dashboard/order/edit/{{$item['id']}}" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit ||
                                                </a>
                                                <a href="/dashboard/order/detail/{{$item['id']}}" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Details
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Create Transaksi</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="" class="px-6" method="POST">
                            @csrf
                            <div class="d-flex justify-content-between flex-wrap flex-row">
                                <div class="keterangan w-45">
                                    <label for="exampleInputEmail1" class="form-label">User</label>
                                    <select name="user" id="" class="form-select">
                                        <option value="" disabled selected>Select User</option>
                                        @foreach ($data['data_user'] as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="keterangan w-45">
                                    <label for="exampleInputEmail1" class="form-label">No Meja</label>
                                    <select name="meja" id="" class="form-select">
                                        <option value="" disabled selected>Select Meja</option>
                                        @foreach ($data['data_meja'] as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="keterangan w-45">
                                    <label class="form-label select-label">Masakan List</label> <br>
                                    @foreach ($data['data_masakan'] as $item)
                                        @if ($item['status'] == 'A')
                                        <input type="checkbox" name="masakan{{ $loop->iteration }}" id="test"
                                            value="{{ $item['id'] }}"> {{ $item['nama'] }}</option>
                                        @endif
                                    @endforeach
                                </div>
                                <div class="keterangan w-45">
                                    <label for="exampleInputEmail1" class="form-label">Keterangan Desc</label>
                                    <select name="status" id="" class="form-select">
                                        <option value="" disabled selected>Select Keterangan</option>
                                        <option value="succsess">Success</option>
                                        <option value="pending">Pending</option>
                                        <option value="failed">Failed</option>
                                    </select>
                                </div>
                                <div class="keterangan w-100">
                                    <label for="exampleInputEmail1" class="form-label">Keterangan Desc</label>
                                    <select name="keterangan" id="" class="form-select">
                                        <option value="" disabled selected>Select Keterangan Desc</option>
                                        @foreach ($data['data_keterangan'] as $item)
                                            <option value="{{ $item['id'] }}">{{ $item['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="mt-3 btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <footer class="footer pt-3  ">
            <div class="container-fluid">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-lg-6 mb-lg-0 mb-4">
                        <div class="copyright text-center text-sm text-muted text-lg-start">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>,
                            made with <i class="fa fa-heart"></i> by
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative
                                Tim</a>
                            for a better web.
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com" class="nav-link text-muted" target="_blank">Creative
                                    Tim</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/presentation" class="nav-link text-muted"
                                    target="_blank">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/blog" class="nav-link text-muted"
                                    target="_blank">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="https://www.creative-tim.com/license" class="nav-link pe-0 text-muted"
                                    target="_blank">License</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>
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
