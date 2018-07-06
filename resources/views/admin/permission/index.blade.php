@extends('admin.layout.main')
@section('content')
        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-10 col-xs-6">
                    <div class="box">

                        <div class="box-header with-border">
                            <h3 class="box-title">权限列表</h3>
                        </div>
                        <a type="button" class="btn " href="/admin/permissions/create" >增加权限</a>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table table-bordered">
                                <tbody>
                                @foreach($permissions as $permission)
                                <tr>
                                    <th style="width: 10px">{{$permission->id}}</th>
                                    <th>{{$permission->name}}</th>
                                    <th>{{$permission->description}}</th>
                                    <th>操作</th>
                                </tr>
                                @endforeach
                                </tbody></table>
                        </div>
                        {{$permissions->links()}}
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
@endsection
