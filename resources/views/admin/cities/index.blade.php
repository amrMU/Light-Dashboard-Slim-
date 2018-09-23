@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ URL::to('/admin/cities') }}">cities</a></li>
                <li class="breadcrumb-item active" aria-current="page">Cities</li>
            </ol>
            <h6 class="slim-pagetitle">cities</h6>
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
            <label class="section-title">cities</label>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                            <th class="wd-15p">#</th>
                            <th class="wd-15p">Name Ar</th>
                            <th class="wd-15p">Name En</th>
                            <th class="wd-15p">country</th>

                            <th class="wd-15p">edit</th>
                            <th class="wd-15p">delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($cities as $city)
                        <tr>
                            <td>{{@$city->id}}</td>
                            <td>{{@$city->name_ar}} </td>               
                            <td>{{@$city->name_en}} </td>               
                            <td>{{@$city->countries->$name}} </td>               
                            <td>
                               <a href="{{URL::to('/')}}/admin/cities/{{@$city->id}}/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                            </td>
                            <td>
                             @include('admin.cities.delete_model')
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