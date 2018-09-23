@extends('admin.layout')
@section('styleCode')
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
@stop
@section('content')
  <!-- BEGIN PAGE HEADER-->
  <h3 class="page-title">
المستخدمين <small>قائمة المستخدمين</small>
  </h3>
  <div class="page-bar">
    <ul class="page-breadcrumb">
      <li>
        <i class="fa fa-home"></i>
        <a href="{{URL::to('/admin/users')}}">الرئيسيه</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">المستخدمين</a>
        <i class="fa fa-angle-right"></i>
      </li>
      <li>
        <a href="#">قائمة المستخدمين</a>
      </li>
    </ul>
  </div>
  <!-- END PAGE HEADER-->
  @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif
    <!-- END EXAMPLE TABLE PORTLET-->
    <table id="example" class="table table-striped table-bordered table-hover" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>حذف</th>
            </tr>
        </thead>
        <tfoot>
         <tr>
                <th>#</th>
                <th>الاسم</th>
                <th>البريد الإلكتروني</th>
                <th>حذف</th>
            </tr>
        </tfoot>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{@$user->id}}</td>
                <td>{{@$user->name}}</td>
                <td>{{@$user->email}}</td>
                
                <td>
                    <center><a href="{{URL::to('/')}}/admin/admin/{{@$user->id}}/delete"><li class="fa fa-trash-o btn btn-danger"></li></a></center>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <!-- END EXAMPLE TABLE PORTLET-->
@stop
@section('jsCode')
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
    $('#example').DataTable();
} );
</script>
@stop
