@extends('admin.layout')
@section('content')

<div class="slim-mainpanel">
  <div class="container">
    <div class="slim-pageheader">
      <ol class="breadcrumb slim-breadcrumb">
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/panel') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ URL::to('/admin/panel') }}">Members </a></li>
        <li class="breadcrumb-item active" aria-current="page">Latest Members list</li>
      </ol>
      <h6 class="slim-pagetitle">Latest Members List</h6>
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

      {!! Form::open(['method' => 'get', 'url' => 'admin/find/member/date', 'class' => 'form-horizontal']) !!}
    <div class="row  mg-b-15">
      <div class="col-lg-12">Fillter By Dates</div>
      <div class="col-lg-5">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">From</span>
          </div>
           <input type="text" name="from" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{ @$from }}">
        </div><!-- input-group -->
      </div><!-- col-4 -->

       <div class="col-lg-5">
        <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text">To</span>
          </div>
           <input type="text" name="to" class="form-control fc-datepicker" placeholder="MM/DD/YYYY" value="{{ @$to }}">
        </div><!-- input-group -->
      </div><!-- col-4 -->


      <div class="col-lg-2 mg-t-20 mg-lg-t-0">
        <div class="input-group">
            <button class="btn btn-primary">Find..</button>
        </div><!-- input-group -->
      </div><!-- col-sm-4 -->
    </div><!-- row -->
      {!! Form::close() !!}

  <div class="table-wrapper">
    <table id="datatable1" class="table display responsive nowrap">
      <thead>
        <tr>
          <th class="wd-15p">#</th>
          <th class="wd-15p">Name</th>
          <th class="wd-20p">email</th>
          <th class="wd-20p">phone</th>
          <th class="wd-20p">User Status</th>
          <th class="wd-20p">User Type</th>
          <th class="wd-20p">Signup  Time</th>
          <th class="wd-20p">susbend</th>
          <th class="wd-20p">deactivate</th>
          <th class="wd-15p">edit</th>
          <th class="wd-15p">delete</th>
        </tr>
      </thead>
      <tbody>
        @foreach($users as $user)
        <tr>
          <td>{{@$user->id}}</td>
          <td>{{@$user->name}}</td>
          <td>{{@$user->email}}</td>
          <td>{{@$user->phone}}</td>
          <td>{{ @$user->status }}</td>
          <td>{{ @$user->type_user }}</td>
          <td title="{{ @$user->created_at }}">{{ @$user->created_at->diffForHumans() }}</td>
          <td>
            {{-- start susbend option --}}
            {{-- check not suspend --}}
            @if($user->status != "suspended" )
            <a href="" class="btn btn-danger" data-toggle="modal" data-target="#modaldemo{{ @$user->id }}"><li class="fa fa-ban"></li></a>
            {{--end open model --}}
            {{-- check if susbend --}}
            @elseif($user->status == "suspended")
            {{-- start open message susbend --}}
            <a href="" class="btn btn-primary" data-toggle="modal" data-target="#susbendMessage{{ @$user->id }}"><li class="fa fa-eye"></li></a>
            <div id="susbendMessage{{ @$user->id }}" class="modal fade">
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
                        {{ @$user->suspended_reason }}
                      </p>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                      <a href="{{ URL::to('/admin') }}/users/{{ @$user->id }}/active" class="btn btn-primary">Active</a>
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div><!-- modal-dialog -->
              </div><!-- modal -->
              {{-- end open message susbend --}}
              @endif
              {{-- end check --}}
              {{-- Start Form Susbend --}}
              {!! Form::open(['method' => 'POST', 'url' => 'admin/users/suspended/'.@$user->id, 'class' => 'form-horizontal']) !!}
              <div id="modaldemo{{ @$user->id }}" class="modal fade">
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
               @if($user->status != "deactive" )
               {{-- open form message deactivate --}}
               <a href="" class="btn btn-danger" data-toggle="modal" data-target="#Modeldeactivate{{ @$user->id }}"><li class="fa fa-ban"></li></a>
               {{-- check if deactive --}}
               @elseif($user->status == "deactive")
               {{-- start model message deactiveate --}}
               <a href="" class="btn btn-primary" data-toggle="modal" data-target="#deactiveMessage{{ @$user->id }}"><li class="fa fa-eye"></li></a>
               <div id="deactiveMessage{{ @$user->id }}" class="modal fade">
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
                          {{ @$user->deactive_reason }}
                        </p>
                      </div><!-- modal-body -->
                      <div class="modal-footer">
                        <a href="{{ URL::to('/admin') }}/users/{{ @$user->id }}/active" class="btn btn-primary">Active</a>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div><!-- modal-dialog -->
                </div><!-- modal -->
                {{-- end model message deactiveate --}}
                @endif
                {{-- end check deactivate --}}
                {{-- start form message deactivate --}}
                {!! Form::open(['method' => 'POST', 'url' => 'admin/users/deactivate/'.@$user->id, 'class' => 'form-horizontal']) !!}
                <div id="Modeldeactivate{{ @$user->id }}" class="modal fade">
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
                  {{-- start edit  --}}
                  <a href="{{URL::to('/')}}/admin/job_seekers/{{@$user->id}}/edit"><li class="fa fa-pencil btn btn-warning"></li></a>
                  {{-- end edit  --}}
                </td>
                <td>
                  @include('panel.job_seeker.latest_delete_model')
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div><!-- table-wrapper -->
      </div>
        {{-- end datatable  --}}
      </div><!-- container -->
    </div><!-- slim-mainpanel -->

    @stop