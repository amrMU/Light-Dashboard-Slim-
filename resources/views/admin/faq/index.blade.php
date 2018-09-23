@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/Faqs') }}">Faqs</a></li>
        <li class="breadcrumb-item active" aria-current="page">Create Faq</li>
      </ol>
      <h6 class="slim-pagetitle">Faqs</h6>
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
      <label class="section-title">Faqs</label>

      <div class="table-wrapper">
        <table id="datatable1" class="table display responsive nowrap">
          <thead>
            <tr>
               <th>#</th>
                <th>العنوان بالعربيه</th>
                <th>العنوان بالانجليزيه</th>
                <th>المحتوي بالعربيه</th>
                <th>المحتوي بالامجليزيه</th>
               
                <th>تعديل</th>
                <th>حذف</th>
            </tr>
          </thead>
          <tbody>
               @foreach($faq as $faq)
                  <tr>
                      <td>{{@$faq->id}}</td>
                      <td>{{@$faq->title_ar}}</td>
                      <td>{{@$faq->title_en}}</td>
                      <td>{!!@strip_tags(substr($faq->content_ar,0,150)).'...'!!}</td>
                      <td>{!!@strip_tags('...'.substr($faq->content_en,0,150))!!}</td>
                      <td>
                        <a href="{{URL::to('/')}}/admin/faqs/{{@$faq->id}}/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                      </td>
                      <td>@include('admin.faq.delete_model')</td>
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