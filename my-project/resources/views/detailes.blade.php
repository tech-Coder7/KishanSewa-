@extends('layouts.app')
@section('content')


    <style>
        body {
            background: #f5f7f2;
        }

        /* ===== Title ===== */
        .main-title {
            font-size: 2.8rem;
            font-weight: 800;
            color: #204d2d;
            text-align: center;
            margin-bottom: 30px;
        }

        .main-title span {
            border-bottom: 4px solid #c9a227;
            padding-bottom: 10px;
        }

        /* ===== Main Card ===== */

        .crop-card {
            background: #fff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, .08);
        }

        .hero-image img {
            width: 100%;
            height: 420px;
            object-fit: cover;
        }

        /* ===== Content ===== */

        .crop-content {
            padding: 30px;
        }

        .crop-content p {
            font-size: 17px;
            line-height: 1.9;
            color: #555;
        }

        .crop-content h2,
        .crop-content h3 {
            color: #2c6d2d;
            margin-top: 25px;
        }

        /* ===== Badge ===== */

        .date-badge {
            display: inline-block;
            background: #eef8e9;
            color: #2e7d32;
            padding: 8px 18px;
            border-radius: 50px;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* ===== Sidebar ===== */

        .sidebar-card {
            background: #fff;
            border-radius: 18px;
            padding: 20px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
            position: sticky;
            top: 20px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #204d2d;
        }

        /* ===== Related Crop ===== */

        .related-item {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 18px;
            background: #fafafa;
            border-radius: 15px;
            overflow: hidden;
            transition: .3s;
            cursor: pointer;
        }

        .related-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, .12);
        }

        .related-item img {
            width: 95px;
            height: 80px;
            object-fit: cover;
        }

        .related-item h5 {
            margin: 0;
            font-weight: 700;
            color: #2c3e50;
        }

        .related-item p {
            margin: 0;
            font-size: 13px;
            color: #777;
        }
    </style>

    <!-- ===== MAIN CONTENT ===== -->
    <div class="container my-4">

        <h1 class="main-title">
            <span>
                <i class="fas fa-seedling text-success"></i>
                {{ $data->title }}
                <i class="fas fa-seedling text-success"></i>
            </span>
        </h1>

        <div class="row">

            <div class="col-lg-8">

                <div class="crop-card">

                    <div class="hero-image">
                        <img src="{{ asset('storage/' . $data->image) }}">
                    </div>
                    <!-- ShareThis BEGINS -->
                    <div class="sharethis-share-buttons" data-type="inline-share-buttons">
                        <span data-network="facebook"></span>
                        <span data-network="twitter"></span>
                        <span data-network="linkedin"></span>
                        <span data-network="email"></span>
                        <span data-network="sharethis"></span>
                    </div>
                    <!-- ShareThis ENDS -->
                    <div class="crop-content">

                        <span class="date-badge">
                            <i class="fa fa-calendar"></i>
                            Updated :
                            {{ date('M d, Y', strtotime($data->created_at)) }}
                        </span>

                        {!! $data->content !!}

                    </div>

                </div>

            </div>


            <div class="col-lg-4">

                <div class="sidebar-card">

                    <h3 class="section-title">
                        🌾 Related Crops
                    </h3>
                    @foreach ($crop as $p)

                        <div class="related-item">

                            <img src="{{ asset('storage/' . $p->image) }}" />

                            <div>
                                <h5><a href="/details/{{ $p->slug }}">{{ $p->title }}</a></h5>
                                {!! \Illuminate\Support\Str::words(strip_tags($p->content), 5, '...') !!}
                            </div>

                        </div>
                    @endforeach



                </div>

            </div>

        </div>

    </div>
    <script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js" defer></script>

@endsection