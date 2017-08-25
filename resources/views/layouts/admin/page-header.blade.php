<!-- PageLib header -->
<div class="content-group border-top-lg border-top-primary">
    <div class="page-header page-header-default page-header-xs">
        <div class="page-header-content">
            <div class="page-title">
                <h4>{!! $page->getPageHeader() !!}</h4>
            </div>
        </div>

        <div class="breadcrumb-line bg-teal-400">
            {!! $page->generateBreadcumb() !!}
        </div>
    </div>
</div>
<!-- /page header -->