@extends('layouts.page')

@section('title', $title)

@section('content')
    <div id="banner-area" class="banner-area" style="background-image:url({{ $page->hasHeaderImage() ? $page->getHeaderImageUrl() : asset('assets/img/banner/banner1.jpg') }});">
        {{-- <div class="banner-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="banner-heading">
                            <h1 class="banner-title">{{ $page->title }}</h1>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb justify-content-center">
                                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">{{ $page->title }}</li>
                                </ol>
                            </nav>
                        </div>
                    </div><!-- Col end -->
                </div><!-- Row end -->
            </div><!-- Container end -->
        </div><!-- Banner text end --> --}}
    </div>
    <div class="container my-4">
        @if ($page->type === 'single-column')
            <!-- Single Column Layout -->
            <div class="row">
                <div class="col-12">
                    <div class="page-content">
                        {!! $content !!}
                    </div>
                </div>
            </div>
        @elseif($page->type === '2-columns')
            <!-- Two Column Layout -->
            <div class="row">
                <div class="col-md-6">
                    <div class="page-content">
                        {!! $left_content !!}
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="page-content">
                        {!! $right_content !!}
                    </div>
                </div>
            </div>
        @elseif($page->type === '3-columns')
            <!-- Three Column Layout -->
            <div class="row">
                <div class="col-md-4">
                    <div class="page-content">
                        {!! $left_content !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="page-content">
                        {!! $middle_content !!}
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="page-content">
                        {!! $right_content !!}
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@section('styles')
    <style>
        .page-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .page-content h1,
        .page-content h2,
        .page-content h3,
        .page-content h4,
        .page-content h5,
        .page-content h6 {
            color: #333;
            margin-top: 0;
        }

        .page-content p {
            line-height: 1.6;
            color: #555;
        }

        .page-content img {
            max-width: 100%;
            height: auto;
            border-radius: 3px;
            margin: 10px 0;
        }

        .page-content table {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        .page-content table th,
        .page-content table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .page-content table th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        .page-content blockquote {
            border-left: 4px solid #007bff;
            padding-left: 15px;
            margin: 20px 0;
            font-style: italic;
            color: #666;
        }

        .page-content .blinking-text {
            animation: blinker 1.5s linear infinite;
            color: #ff0000;
        }

        @keyframes blinker {
            50% {
                opacity: 0;
            }
        }
    </style>
@endsection
