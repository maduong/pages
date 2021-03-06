@extends('edutalk-core::admin._master')

@section('css')

@endsection

@section('js')

@endsection

@section('js-init')
    <script type="text/javascript">
        $(document).ready(function () {
            Edutalk.wysiwyg($('.js-wysiwyg'));
        });
    </script>
@endsection

@section('content')
    {!! Form::open(['class' => 'js-validate-form']) !!}
    <div class="layout-2columns sidebar-right">
        <div class="column main">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('edutalk-core::base.form.basic_info') }}</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-core::base.form.title') }}</b>

                        </label>
                        <input required type="text" name="page[title]"
                               class="form-control"
                               value="{{ old('page.title') }}"
                               autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-core::base.form.slug') }}</b>

                        </label>
                        <input type="text" name="page[slug]"
                               class="form-control"
                               value="{{ old('page.slug') }}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-core::base.form.content') }}</b>
                        </label>
                        <textarea name="page[content]"
                                  class="form-control js-wysiwyg">{!! old('page.content') !!}</textarea>
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-core::base.form.keywords') }}</b>
                        </label>
                        <input type="text" name="page[keywords]"
                               class="form-control js-tags-input"
                               value="{{ old('page.keywords') }}" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label class="control-label">
                            <b>{{ trans('edutalk-core::base.form.description') }}</b>
                        </label>
                        <textarea name="page[description]"
                                  class="form-control js-wysiwyg"
                                  data-toolbar="basic"
                                  data-height="200px"
                                  rows="5">{!! old('page.description') !!}</textarea>
                    </div>
                </div>
            </div>
            @php do_action(BASE_ACTION_META_BOXES, 'main', EDUTALK_PAGES, null) @endphp
        </div>
        <div class="column right">
            @include('edutalk-core::admin._components.form-actions')
            @php do_action(BASE_ACTION_META_BOXES, 'top-sidebar', EDUTALK_PAGES, null) @endphp
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('edutalk-core::base.form.status') }}</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    {!! form()->select('page[status]', [
                       'activated' => trans('edutalk-core::base.status.activated'),
                        'disabled' => trans('edutalk-core::base.status.disabled'),
                    ], old('page.status'), ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">{{ trans('edutalk-core::base.form.order') }}</h3>
                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <input type="text" name="page[order]"
                           class="form-control"
                           value="{{ old('page.order', 0) }}" autocomplete="off">
                </div>
            </div>
            @include('edutalk-core::admin._widgets.page-templates', [
                'name' => 'page[page_template]',
                'templates' => get_templates('page'),
                'selected' => old('page.page_template'),
            ])
            @include('edutalk-core::admin._widgets.thumbnail', [
                'name' => 'page[thumbnail]',
                'value' => old('page.thumbnail')
            ])
            @php do_action(BASE_ACTION_META_BOXES, 'bottom-sidebar', EDUTALK_PAGES, null) @endphp
        </div>
    </div>
    {!! Form::close() !!}
@endsection
