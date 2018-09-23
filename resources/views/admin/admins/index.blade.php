@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/panel') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/admins') }}">admins</a></li>
        <li class="breadcrumb-item active" aria-current="page">admins list</li>
      </ol>
      <h6 class="slim-pagetitle">Admins</h6>
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
  <label class="section-title">Admins</label>

    <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-15p">#</th>
          <th class="wd-15p">Name</th>
          <th class="wd-20p">email</th>
          <th class="wd-20p">Admin Status</th>
          <th class="wd-20p">susbend</th>
          <th class="wd-20p">deactivate</th>
          <th class="wd-15p">edit</th>
          <th class="wd-15p">delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($admins as $admin)
        <tr>
          <td>{{@$admin->id}}</td>
          <td>{{@$admin->name}}</td>
          <td>{{@$admin->email}}</td>
          <td>{{@$admin->status}}</td>
          <td>
            {{-- start susbend option --}}
            {{-- check not suspend --}}
            @if($admin->status != "suspended" )
            {{--start open model --}}
            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modaldemo{{ @$admin->id }}"><li class="fa fa-ban"></li></a>
            {{--end open model --}}
            {{-- check if susbend --}}
            @elseif($admin->status == "suspended")
            {{-- start open message susbend --}}
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#susbendMessage{{ @$admin->id }}"><li class="fa fa-eye"></li></a>
            <div id="susbendMessage{{ @$admin->id }}" class="modal fade">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content tx-size-sm">
                  <div class="modal-header pd-x-20">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Reasone Susbend</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body pd-20">
                    <h5 class=" lh-3 mg-b-20">
                      <p class="mg-b-5">
                        {{ @$admin->suspended_reason }}
                      </p>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                      <a href="{{ URL::to('/admin') }}/users/{{ @$admin->id }}/active" class="btn btn-primary">Active</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div><!-- modal-dialog -->
              </div><!-- modal -->
              {{-- end open message susbend --}}
              @endif
              {{-- end check --}}
              {{-- Start Form Susbend --}}
              {!! Form::open(['method' => 'POST', 'url' => 'admin/users/suspended/'.@$admin->id, 'class' => 'form-horizontal']) !!}
              <div id="modaldemo{{ @$admin->id }}" class="modal fade">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content tx-size-sm">
                    <div class="modal-header pd-x-20">
                      <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Give User Reasone For Susbend</h6>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body pd-20">
                      <h5 class=" lh-3 mg-b-20">
                        <p class="mg-b-5">
                          <div class="form-group mg-b-10">
                            <div class="row row-sm">
                              <div class="col-9 col-sm-8 col-xl-12">
                                <label title="Give Me User Message ">message: <span class="tx-danger">*</span></label>
                                <input type="text" name="message" class="form-control " placeholder="write your reasone" required value="{{Request::old('message')}}">
                              </div><!-- col-8 -->
                            </div><!-- row -->
                          </div>
                        </p>
                      </div><!-- modal-body -->
                      <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div><!-- modal-dialog -->
                </div><!-- modal -->
                {!! Form::close() !!}
                {{-- end Form Susbend --}}
                {{-- end susbend option --}}
              </td>
              <td> 
                {{-- start deactivate --}}
                {{-- check if not deactive --}}
                @if($admin->status != "deactive" )
                {{-- open form message deactivate --}}
                <a href="" class="btn btn-danger" data-toggle="modal" data-target="#Modeldeactivate{{ @$admin->id }}"><li class="fa fa-ban"></li></a>
                {{-- check if deactive --}}
                @elseif($admin->status == "deactive")
                {{-- start model message deactiveate --}}
                <a href="" class="btn btn-primary" data-toggle="modal" data-target="#deactiveMessage{{ @$admin->id }}"><li class="fa fa-eye"></li></a>
                <div id="deactiveMessage{{ @$admin->id }}" class="modal fade">
                  <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content tx-size-sm">
                      <div class="modal-header pd-x-20">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Reasone Susbend</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body pd-20">
                        <h5 class=" lh-3 mg-b-20">
                          <p class="mg-b-5">
                            {{ @$admin->deactive_reason }}
                          </p>
                        </div><!-- modal-body -->
                        <div class="modal-footer">
                          <a href="{{ URL::to('/admin') }}/users/{{ @$admin->id }}/active" class="btn btn-primary">Active</a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div><!-- modal-dialog -->
                  </div><!-- modal -->
                  {{-- end model message deactiveate --}}
                  @endif
                  {{-- end check deactivate --}}
                  {{-- start form message deactivate --}}
                  {!! Form::open(['method' => 'POST', 'url' => 'admin/users/deactivate/'.@$admin->id, 'class' => 'form-horizontal']) !!}
                  <div id="Modeldeactivate{{ @$admin->id }}" class="modal fade">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content tx-size-sm">
                        <div class="modal-header pd-x-20">
                          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Give User Reasone For deactivate</h6>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body pd-20">
                          <h5 class=" lh-3 mg-b-20">
                            <p class="mg-b-5">
                              <div class="form-group mg-b-10">
                                <div class="row row-sm">
                                  <div class="col-9 col-sm-8 col-xl-12">
                                    <label title="Give Me User Message ">message: <span class="tx-danger">*</span></label>
                                    <input type="text" name="message" class="form-control " placeholder="write your reasone" required value="{{Request::old('message')}}">
                                  </div><!-- col-8 -->
                                </div><!-- row -->
                              </div>
                            </p>
                          </div><!-- modal-body -->
                          <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Save changes</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                      </div><!-- modal-dialog -->
                    </div><!-- modal -->
                    {!! Form::close() !!}
                    {{-- end deactivate --}}
                  </td>
                  <td>
                    {{-- start edit --}}
                    <a href="{{URL::to('/')}}/admin/admins/{{@$admin->id}}/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                    {{-- end edit --}}
                  </td>
                  <td>
                    @include('admin.admins.delete_model') 
                    {{-- start delete --}}
                    {{-- <a href="{{URL::to('/')}}/admin/admin/{{@$admin->id}}/delete"><li class="fa fa-trash-o btn btn-danger"></li></a> --}}
                    {{-- end delete --}}
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div><!-- table-wrapper -->
          </div><!-- table-wrapper -->
          </div><!-- table-wrapper -->
          {{-- end datatable  --}}
        </div><!-- container -->
      </div><!-- slim-mainpanel -->

      @stop