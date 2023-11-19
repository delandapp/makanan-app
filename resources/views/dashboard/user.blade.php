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
                                        <th
                                            class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 text-center">
                                            Role</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Employed</th>
                                        <th
                                            class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                            Action</th>
                                        <th class="text-secondary opacity-7"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data['data_user'] as $item)
                                        <tr>
                                            <td>
                                                <div class="d-flex px-2 py-1">
                                                    <div>
                                                        <img src="{{ asset('gambar/user/' . $item['gambar']) }}"
                                                            class="avatar avatar-sm me-3" alt="user1">
                                                    </div>
                                                    <div class="d-flex flex-column justify-content-center">
                                                        <h6 class="mb-0 text-sm">{{ $item['name'] }}</h6>
                                                        <p class="text-xs text-secondary mb-0">{{ $item['email'] }}</p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="text-xs font-weight-bold mb-0 text-center">{{ $item['role']->name }}
                                            </td>
                                            <td class="align-middle text-center">
                                                <span
                                                    class="text-secondary text-xs font-weight-bold">{{ $item['created_at']->format('d/m/Y') }}</span>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="javascript:;" class="text-secondary font-weight-bold text-xs"
                                                    data-toggle="tooltip" data-original-title="Edit user">
                                                    Edit ||
                                                </a>
                                                @if ($item['status'] == 'A')
                                                    <a href="/dashboard/masakan/{{ $item['id'] }}/{{ 'mati' }}"> <i
                                                            class="fa-solid fa-xmark"</a></i>
                                                    @else
                                                        <a
                                                            href="/dashboard/masakan/{{ $item['id'] }}/{{ 'active' }}">
                                                            <i class="fa-solid fa-check"></i>
                                                        </a>
                                                @endif
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
                        <h6>Create User</h6>
                    </div>
                    <div class="card-body px-0 pt-0 pb-2">
                        <form action="" class="px-6" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex flex-wrap justify-content-center gap-3">
                                <div class="w-45">
                                    <label for="exampleInputEmail1" class="form-label">Nama User</label>
                                    <input type="text"
                                        class="form-control @if ($errors->first('nama')) is-invalid @endif"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="name">
                                    @if ($errors->first('nama'))
                                        <div style="color: #D80032; margin:5px 10px; display:flex; gap:5px; align-items:center"
                                            class="text-uppercase text-xxs font-weight-bolder opacity-7"><i
                                                class="fa-solid fa-triangle-exclamation"></i>{{ $errors->first('nama') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="w-45">
                                    <label for="exampleInputEmail1" class="form-label">Email User</label>
                                    <input type="email"
                                        class="form-control @if ($errors->first('nama')) is-invalid @endif"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
                                    @if ($errors->first('nama'))
                                        <div style="color: #D80032; margin:5px 10px; display:flex; gap:5px; align-items:center"
                                            class="text-uppercase text-xxs font-weight-bolder opacity-7"><i
                                                class="fa-solid fa-triangle-exclamation"></i>{{ $errors->first('nama') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="w-45">
                                    <label for="exampleInputEmail1" class="form-label">Password User</label>
                                    <input type="password"
                                        class="form-control @if ($errors->first('nama')) is-invalid @endif"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="password">
                                    @if ($errors->first('nama'))
                                        <div style="color: #D80032; margin:5px 10px; display:flex; gap:5px; align-items:center"
                                            class="text-uppercase text-xxs font-weight-bolder opacity-7"><i
                                                class="fa-solid fa-triangle-exclamation"></i>{{ $errors->first('nama') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="w-45">
                                    <label for="exampleInputEmail1" class="form-label">Password Confirm</label>
                                    <input type="password"
                                        class="form-control @if ($errors->first('nama')) is-invalid @endif"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" name="password2">
                                    @if ($errors->first('nama'))
                                        <div style="color: #D80032; margin:5px 10px; display:flex; gap:5px; align-items:center"
                                            class="text-uppercase text-xxs font-weight-bolder opacity-7"><i
                                                class="fa-solid fa-triangle-exclamation"></i>{{ $errors->first('nama') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="w-45">
                                    <label class="form-label select-label">Role List</label> <br>
                                        <select name="role" id="" class="form-select">
                                            <option value="" disabled selected>Select Role</option>
                                        @foreach ($data['data_role'] as $item)
                                                <option value="{{$item['id']}}">{{$item['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="w-45">
                                    <label for="formFile" class="form-label">Upload Gambar</label>
                                    <input class="form-control" type="file" id="formFile" name="gambar">
                                </div>
                                <input type="hidden" name="status" value="A">
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
                            <a href="https://www.creative-tim.com" class="font-weight-bold" target="_blank">Creative Tim</a>
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
