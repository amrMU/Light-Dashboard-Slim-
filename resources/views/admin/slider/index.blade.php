@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
    <div class="container">
        <div class="slim-pageheader">
            <ol class="breadcrumb slim-breadcrumb">
                <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ URL::to('/admin/slider') }}">Slider</a></li>
                <li class="breadcrumb-item active" aria-current="page">slider List</li>
            </ol>
            <h6 class="slim-pagetitle">Slider</h6>
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
            <label class="section-title">Categories</label>

            <div class="table-wrapper">
                <table id="datatable1" class="table display responsive nowrap">
                    <thead>
                        <tr>
                           <th>#</th>

                           <th>زيارة الإعلان</th>
                           <th>العرض</th>
                           <th>تعديل</th>
                           <th>حذف</th>
                        </tr>
                    </thead>
                    <tbody>

                    @foreach($sliders as $slider)
                        <tr>
                            <td>
                                  {{@$slider->id}}
                              </td>
                              <td>
                                 <a target="_blank" href="{{@$slider->url}}"><li class="fa fa-paper-plane btn btn-info"></li></a>
                             </td>
                             <td>
                              <img src="{{ URL::to('/') }}{{ $slider->image }}" class="img-responsive img-rounded" style="width:93px;display: inline-block;">
                          </td>
                          <td>
                          <a href="{{URL::to('/')}}/admin/slider/{{@$slider->id}}/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                         </td>
                         <td>
                           @include('admin.slider.delete_model')
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