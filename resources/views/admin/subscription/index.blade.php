@extends('layouts.app')

@section('content')
<div class="page-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="breadcrumb">
                        Add Subscription/Package
                        <a class="no-link disp-link" href="{{ url('admin/subscriptions/create') }}">
                            <i class="fa fa-plus icon-disp-link" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12">
                    <div class="table-list">
                        @if (count($subscriptions) > 0)
                        <div class="pagination-container">
                            <?php echo $subscriptions->render(); ?>
                        </div>

                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>
                                            <input type="checkbox" class="table-list-check-all" />
                                        </th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Content</th>
                                        <th>Cost</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($subscriptions as $key => $value)
                                    <tr>
                                        <td scope="row">
                                            <input type="checkbox" class="table-list-check" />
                                        </td>
                                        <td>{{ $value->id }}</td>
                                        <td>{{ $value->title }}</td>
                                        <td>{{ $value->content }}</td>
                                        <td>{{ $value->cost }}</td>
                                        <td>{{ $value->status }}</td>
                                        <td>
                                            <a href="{{ URL::to('admin/subscriptions/' . $value->id . '/edit') }}"><i class="fa fa-pencil table-edit-ic" aria-hidden="true"></i></a>

                                            <form action="/admin/subscriptions/{{ $value->id }}" method="POST" class="inline-block">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-trans">
                                                    <i class="fa fa-times table-row-del" aria-hidden="true"></i>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                                {{ $subscriptions->links() }}
                                </tbody>
                            </table>
                        <div class="pagination-container">
                            <?php echo $subscriptions->render(); ?>
                        </div>
                        @else
                            No data
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
