@extends('admin.layouts.app')

@push('libraries_top')
    <link rel="stylesheet" href="/assets/admin/vendor/owl.carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/admin/vendor/owl.carousel/owl.theme.min.css">

@endpush

@section('content')


    <section class="section">
        <div class="row">
            <div class="col-12 mb-4">
                <div class="hero text-white hero-bg-image hero-bg" data-background="{{ !empty(getPageBackgroundSettings('admin_dashboard')) ? getPageBackgroundSettings('admin_dashboard') : '' }}">
                    <div class="hero-inner">
                        <h2>{{trans('admin/main.welcome')}}, {{ $authUser->full_name }}!</h2>

                        <div class="d-flex flex-column flex-lg-row align-items-center justify-content-between">
                            @can('admin_general_dashboard_quick_access_links')
                                <div>
                                    <p class="lead">{{trans('admin/main.welcome_card_text')}}</p>

                                    <div class="mt-2 mb-2 d-flex flex-column flex-md-row">
                                        <a href="/admin/comments/webinars" class="mt-2 mt-md-0 btn btn-outline-white btn-lg btn-icon icon-left ml-0 ml-md-2"><i class="far fa-comment"></i>{{trans('admin/main.comments')}} </a>
                                        <a href="/admin/supports" class="mt-2 mt-md-0 btn btn-outline-white btn-lg btn-icon icon-left ml-0 ml-md-2"><i class="far fa-envelope"></i>{{trans('admin/main.tickets')}}</a>
                                        <a href="/admin/reports/webinars" class="mt-2 mt-md-0 btn btn-outline-white btn-lg btn-icon icon-left ml-0 ml-md-2"><i class="fas fa-info"></i>{{trans('admin/main.reports')}}</a>
                                    </div>
                                </div>
                            @endcan

                            @can('admin_clear_cache')
                                <div class="w-xs-to-lg-100">
                                    <p class="lead d-none d-lg-block">&nbsp;</p>

                                    @include('admin.includes.delete_button',[
                                             'url' => '/admin/clear-cache',
                                             'btnClass' => 'btn btn-outline-white btn-lg btn-icon icon-left mt-2 w-100',
                                             'btnText' => trans('admin/main.clear_all_cache'),
                                             'hideDefaultClass' => true
                                          ])
                                </div>
                            @endcan
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
                @can('admin_general_dashboard_daily_sales_statistics')
                    @if(!empty($dailySalesTypeStatistics))
                        <div class="card card-statistic-2">
                            <div class="card-stats">
                                <div class="card-stats-title">{{trans('admin/main.daily_sales_type_statistics')}}</div>

                                <div class="card-stats-items">
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $dailySalesTypeStatistics['webinarsSales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.live_class')}}</div>
                                    </div>

                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $dailySalesTypeStatistics['courseSales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.course')}}</div>
                                    </div>

                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $dailySalesTypeStatistics['appointmentSales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.appointment')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-archive"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{trans('admin/main.today_sales')}}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $dailySalesTypeStatistics['allSales'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endcan
            </div>


            <div class="col-lg-4 col-md-4 col-sm-12">
                @can('admin_general_dashboard_income_statistics')
                    @if(!empty($getIncomeStatistics))
                        <div class="card card-statistic-2">
                            <div class="card-stats">
                                <div class="card-stats-title">{{trans('admin/main.income_statistics')}}</div>

                                <div class="card-stats-items">
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $currency }}{{ $getIncomeStatistics['todaySales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.today')}}</div>
                                    </div>

                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $currency }}{{ $getIncomeStatistics['monthSales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.this_month')}}</div>
                                    </div>

                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $currency }}{{ $getIncomeStatistics['yearSales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.this_year')}}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-dollar-sign"></i>
                            </div>
                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{trans('admin/main.total_incomes')}}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $currency }}{{ $getIncomeStatistics['totalSales'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endcan
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12">
                @can('admin_general_dashboard_total_sales_statistics')
                    @if(!empty($getTotalSalesStatistics))
                        <div class="card card-statistic-2">
                            <div class="card-stats">
                                <div class="card-stats-title">{{trans('admin/main.salescount')}}</div>

                                <div class="card-stats-items">
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $getTotalSalesStatistics['todaySales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.today')}}</div>
                                    </div>
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $getTotalSalesStatistics['monthSales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.this_month')}}</div>
                                    </div>
                                    <div class="card-stats-item">
                                        <div class="card-stats-item-count">{{ $getTotalSalesStatistics['yearSales'] }}</div>
                                        <div class="card-stats-item-label">{{trans('admin/main.this_year')}}</div>
                                    </div>
                                </div>
                            </div>

                            <div class="card-icon shadow-primary bg-primary">
                                <i class="fas fa-shopping-cart"></i>
                            </div>

                            <div class="card-wrap">
                                <div class="card-header">
                                    <h4>{{trans('admin/main.total_sales')}}</h4>
                                </div>
                                <div class="card-body">
                                    {{ $getTotalSalesStatistics['totalSales'] }}
                                </div>
                            </div>
                        </div>
                    @endif
                @endcan
            </div>
        </div>

        <div class="row">

            @can('admin_general_dashboard_new_sales')
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="/admin/financial/sales" class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-shopping-cart"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{trans('admin/main.new_sale')}}</h4>
                            </div>
                            <div class="card-body">
                                {{ $getNewSalesCount }}
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

            @can('admin_general_dashboard_new_comments')
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="/admin/comments/webinars" class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-comment"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{trans('admin/main.new_comment')}}</h4>
                            </div>
                            <div class="card-body">
                                {{ $getNewCommentsCount }}
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

            @can('admin_general_dashboard_new_tickets')
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a href="/admin/supports" class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="far fa-envelope"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{trans('admin/main.new_ticket')}}</h4>
                            </div>
                            <div class="card-body">
                                {{ $getNewTicketsCount }}
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

            @can('admin_general_dashboard_new_reviews')
                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <a class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-eye"></i></div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>{{trans('admin/main.pending_review_classes')}}</h4>
                            </div>
                            <div class="card-body">
                                {{ $getPendingReviewCount }}
                            </div>
                        </div>
                    </a>
                </div>
            @endcan

        </div>



    </section>
@endsection

@push('scripts_bottom')
    <script src="/assets/default/vendors/chartjs/chart.min.js"></script>
    <script src="/assets/admin/vendor/owl.carousel/owl.carousel.min.js"></script>

    <script src="/assets/admin/js/dashboard.js"></script>

    <script>
        (function ($) {
            "use strict";
            @if(!empty($getMonthAndYearSalesChart))
            makeStatisticsChart('saleStatisticsChart', saleStatisticsChart, 'Sale', @json($getMonthAndYearSalesChart['labels']),@json($getMonthAndYearSalesChart['data']));
            @endif

            @if(!empty($usersStatisticsChart))
            makeStatisticsChart('usersStatisticsChart', usersStatisticsChart, 'Users', @json($usersStatisticsChart['labels']),@json($usersStatisticsChart['data']));
            @endif
        })(jQuery)
    </script>
@endpush
