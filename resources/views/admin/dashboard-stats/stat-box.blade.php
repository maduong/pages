<div class="col-lg-3 col-md-4 col-sm-6">
    <div class="small-box bg-red">
        <div class="inner">
            <h3>{{ $count or 0 }}</h3>
            <p>{{ trans('edutalk-pages::base.page_title') }}</p>
        </div>
        <div class="icon">
            <i class="icon-notebook"></i>
        </div>
        <a href="{{ route('admin::pages.index.get') }}" class="small-box-footer">
            {{ trans('edutalk-core::base.stat_box.more_info') }} <i class="fa fa-arrow-circle-right"></i>
        </a>
    </div>
</div>
