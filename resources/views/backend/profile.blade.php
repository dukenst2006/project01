@extends ('backend.layouts.master')

@section ('title', trans('labels.backend.access.customers.management') . ' | ' . trans('labels.backend.access.customers.create'))

@section('page-header')
    <h1>
        {{ trans('labels.backend.access.customers.management') }}
        <small>{{ trans('labels.backend.access.customers.create') }}</small>
    </h1>
@endsection

@section('content')
    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-primary">
                    <div class="box-body box-profile">
                        <img class="profile-user-img img-responsive img-circle" src="{{ $customer->image }}" alt="User profile picture">
                        <h3 class="profile-username text-center">{{ $customer->name .' '. $customer->lastname }}</h3>
                        <p class="text-muted text-center">{{$customer->number}}</p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b>Ballance</b> <a class="pull-right"><strong>{{ $balance.' Gdes' }}</strong></a>
                            </li>
                            <li class="list-group-item">
                                <b>Following</b> <a class="pull-right">543</a>
                            </li>
                            <li class="list-group-item">
                                <b>Friends</b> <a class="pull-right">13,287</a>
                            </li>
                        </ul>

                        <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->

                <!-- About Me Box -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">About Me</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <strong><i class="fa fa-book margin-r-5"></i>  Education</strong>
                        <p class="text-muted">
                            B.S. in Computer Science from the University of Tennessee at Knoxville
                        </p>

                        <hr>

                        <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>
                        <p class="text-muted">Malibu, California</p>

                        <hr>

                        <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>
                        <p>
                            <span class="label label-danger">UI Design</span>
                            <span class="label label-success">Coding</span>
                            <span class="label label-info">Javascript</span>
                            <span class="label label-warning">PHP</span>
                            <span class="label label-primary">Node.js</span>
                        </p>

                        <hr>

                        <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
            <div class="col-md-9">
                <div class="nav-tabs-custom">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#activity" data-toggle="tab">{{ trans('labels.backend.access.customers.recent_transaction') }}</a></li>
                        <li><a href="#timeline" data-toggle="tab">{{ trans('labels.backend.access.transactions.deposit') }}</a></li>
                        <li><a href="#settings" data-toggle="tab">{{ trans('labels.backend.access.transactions.withdrawl') }}</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="active tab-pane" id="activity">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <th class="visible-lg">{{ trans('labels.backend.access.transactions.table.created') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.name') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.amount') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.type') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.authorised') }}</th>
                                        <th>{{ trans('labels.backend.access.transactions.table.reference') }}</th>

                                        <th class="visible-lg">{{ trans('labels.backend.access.transactions.table.last_updated') }}</th>
                                        <th>{{ trans('labels.general.actions') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($transactions as $transaction)
                                        <tr>
                                            <td class="visible-lg">{!! $transaction->created_at !!}</td>
                                            <td>{!! App\Customer::find($transaction->customer_id)->name.' '.App\Customer::find($transaction->customer_id)->lastname !!}</td>
                                            <td>{!! $transaction->amount !!}</td>
                                            <td>{!! App\Transactiontype::find($transaction->transactiontype_id)->name !!}</td>
                                            <td>{!! App\Models\Access\User\User::find($transaction->user_id)->name !!}</td>
                                            <td>{!! $transaction->reference !!}</td>
                                            <td class="visible-lg">{!! $transaction->updated_at !!}</td>
                                            {{--<td>{!! $transaction->action_buttons !!}</td>--}}
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div><!-- /.tab-pane -->
                        <div class="tab-pane" id="timeline">
                            <!-- deposit -->
                            {!! Form::open(['route' => 'admin.customer.store', 'class' => 'form-horizontal', 'role' => 'form', 'method' => 'post']) !!}

                            <div class="box box-success">
                                <div class="box-header with-border">
                                    <h3 class="box-title">{{ trans('labels.backend.access.transactions.deposit').' / ' .$customer->name .' '.$customer->lastname .' / '.$customer->number}}</h3>

                                </div><!-- /.box-header -->

                                <div class="box-body">
                                    <div class="form-group">
                                        {!! Form::label('number', trans('validation.attributes.backend.access.customers.number'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('number', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.number')]) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="input-group">
                                        {!! Form::label('amount', trans('validation.attributes.backend.access.customers.number'), ['class' => 'col-lg-2 control-label']) !!}
                                        <span class="input-group-addon">Gdes</span>
                                        <input type="number" class="form-control">
                                        <span class="input-group-addon">.00</span>
                                    </div><br />

                                    <div class="form-group">
                                        {!! Form::label('name', trans('validation.attributes.backend.access.customers.name'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.name')]) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('lastname', trans('validation.attributes.backend.access.customers.lastname'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('lastname', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.lastname')]) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('occupation', trans('validation.attributes.backend.access.customers.occupation'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('occupation', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.occupation')]) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('city', trans('validation.attributes.backend.access.customers.city'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('city', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.city')]) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('address', trans('validation.attributes.backend.access.customers.address'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.address')]) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('phone', trans('validation.attributes.backend.access.customers.phone'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('phone', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.customers.phone')]) !!}
                                        </div>
                                    </div><!--form control-->

                                    <div class="form-group">
                                        {!! Form::label('email', trans('validation.attributes.backend.access.users.email'), ['class' => 'col-lg-2 control-label']) !!}
                                        <div class="col-lg-10">
                                            {!! Form::text('email', null, ['class' => 'form-control', 'placeholder' => trans('validation.attributes.backend.access.users.email')]) !!}
                                        </div>
                                    </div><!--form control-->

                                    {{ Form::hidden('user_id', auth()->id()) }}
                                </div><!-- /.box-body -->
                            </div><!--box-->

                            <div class="box box-info">
                                <div class="box-body">
                                    <div class="pull-left">
                                        <a href="{{route('admin.access.users.index')}}" class="btn btn-danger btn-xs">{{ trans('buttons.general.cancel') }}</a>
                                    </div>

                                    <div class="pull-right">
                                        <input type="submit" class="btn btn-success btn-xs" value="{{ trans('buttons.general.crud.create') }}" />
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- /.box-body -->
                            </div><!--box-->

                            {!! Form::close() !!}
                        </div><!-- /.tab-pane -->

                        <div class="tab-pane" id="settings">
                            <form class="form-horizontal">
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputName" class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputName" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
                </div><!-- /.nav-tabs-custom -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </section><!-- /.content -->

@stop

@section('after-scripts-end')
    {!! Html::script('js/backend/access/permissions/script.js') !!}
    {!! Html::script('js/backend/access/users/script.js') !!}
@stop
