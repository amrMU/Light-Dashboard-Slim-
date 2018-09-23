@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ URL::to('/admin/contact_us') }}">Contact Us </a></li>
                <li class="breadcrumb-item active" aria-current="page">Contact Us Requests</li>
            </ol>
            <h6 class="slim-pagetitle">Contact Us Requests</h6>
        </div><!-- slim-pageheader -->

        @if(Session::has('success'))
        <div class="alert alert-success mg-b-0" role="alert">{{Session::get('success')}}</div>
        @endif
        @if (count($errors) > 0)
        <div class="alert alert-danger mg-b-0" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        {{-- start datatable  --}}

        <div class="section-wrapper">
            <label class="section-title">Contact Us Requests</label>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="">#</th>
                            <th class="">Title </th>
                            <th class="">message </th>
                            <th class="">reply</th>

                            <th class="wd-15p">delete</th>
                        </tr>
                    </thead>
                    <tbody>

                     @foreach($info as $info)
                     <tr>
                        <td>
                            {{@$info->id}} 
                            @if($info->read == 0)
                            <div class="d-inline p-2 bg-primary text-white">لم يتم القراءه</div>
                          
                            @elseif($info->reply == 1)
                            <div class="d-inline p-2 bg-primary text-white">تم  الرد</div>
                           
                            @endif
                        </td>
                        <td title="{{ @$info->name }}">{{substr(@$info->name,0,50).'...'}}</td>
                        <td>{{@$info->email}}</td>
                        <td>
                        <a href="{{URL::to('/')}}/admin/contact_us/{{@$info->id}}/reply"><li class="fa fa-paper-plane btn btn-primary"></li></a>
                       </td>

                       <td>
                        <a href="{{URL::to('/')}}/admin/contact_us/{{@$info->id}}/delete"><li class="fa fa-trash-o btn btn-danger"></li></a>
                    </td>
                </tr>
                @endforeach
                    </tbody>
                </table>
            </div><!-- table-wrapper -->
            {{-- end datatable  --}}
        </div><!-- container -->
    </div><!-- slim-mainpanel -->

</div>

@stop