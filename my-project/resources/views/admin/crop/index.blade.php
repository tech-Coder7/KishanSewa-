@extends('admin.layouts.app')
@section('admincontent')
    <style>
        /* Categories specific styles */
        .categories-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            margin-bottom: 1.5rem;
        }

        .categories-header h2 {
            font-weight: 600;
            color: #1a3a2b;
            font-size: 1.4rem;
        }

        .categories-header h2 i {
            color: #7cb342;
            margin-right: 0.5rem;
        }

        .text-muted {
            color: #5a7a6a;
            font-size: 0.8rem;
        }

        .create-category-box {
            background: #f8fbf7;
            border-radius: 18px;
            padding: 1.2rem 1.5rem;
            margin-bottom: 2rem;
            border: 1px solid #dce8e0;
            display: flex;
            flex-wrap: wrap;
            align-items: flex-end;
            gap: 1.2rem;
        }

        .create-category-box .field-group {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
            flex: 1 0 140px;
        }

        .create-category-box .field-group label {
            font-size: 0.75rem;
            font-weight: 600;
            color: #3a5a4a;
            letter-spacing: 0.3px;
            text-transform: uppercase;
        }

        .create-category-box .field-group input,
        .create-category-box .field-group select {
            background: #fff;
            border: 1px solid #dce8e0;
            border-radius: 30px;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
            outline: none;
            transition: 0.2s;
            font-family: 'Inter', sans-serif;
            width: 100%;
        }

        .create-category-box .field-group input:focus,
        .create-category-box .field-group select:focus {
            border-color: #7cb342;
            box-shadow: 0 0 0 3px rgba(124, 179, 66, 0.15);
        }

        .create-category-box .btn-submit {
            background: #1a3a2b;
            border: none;
            color: #fff;
            font-weight: 600;
            padding: 0.5rem 1.8rem;
            border-radius: 30px;
            font-size: 0.9rem;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            height: 44px;
            white-space: nowrap;
        }

        .create-category-box .btn-submit:hover {
            background: #2a5a3b;
            transform: scale(1.02);
        }

        .table-card {
            background: #fff;
            border-radius: 20px;
            padding: 1.5rem 1.5rem 0.5rem 1.5rem;
            border: 1px solid #e4ede7;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.02);
            overflow-x: auto;
        }

        .table-card table {
            width: 100%;
            border-collapse: collapse;
            font-size: 0.9rem;
            min-width: 600px;
        }

        .table-card th {
            text-align: left;
            padding: 0.8rem 0.5rem 0.8rem 0;
            color: #3a5a4a;
            font-weight: 600;
            border-bottom: 2px solid #eef3ea;
        }

        .table-card td {
            padding: 0.9rem 0.5rem 0.9rem 0;
            border-bottom: 1px solid #f3f7f2;
            color: #1a3a2b;
            vertical-align: middle;
        }

        .table-card tr:last-child td {
            border-bottom: none;
        }

        .badge-status {
            display: inline-block;
            padding: 0.2rem 0.9rem;
            border-radius: 30px;
            font-weight: 600;
            font-size: 0.75rem;
        }

        .badge-status.active {
            background: #e8f5e9;
            color: #2e7d32;
        }

        .badge-status.inactive {
            background: #ffebee;
            color: #c62828;
        }

        .badge-status.pending {
            background: #fff3e0;
            color: #e65100;
        }

        .parent-badge {
            background: #e3f0fc;
            color: #0d47a1;
            padding: 0.15rem 0.7rem;
            border-radius: 30px;
            font-size: 0.75rem;
            font-weight: 500;
            display: inline-block;
        }

        .actions {
            display: flex;
            gap: 0.5rem;
        }

        .actions a {
            color: #5a7a6a;
            background: #f0f5ee;
            width: 32px;
            height: 32px;
            border-radius: 30px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            transition: 0.2s;
            text-decoration: none;
        }

        .actions a:hover {
            background: #7cb342;
            color: #fff;
        }

        .actions a.danger:hover {
            background: #d32f2f;
            color: #fff;
        }
    </style>
    <main class="main">

        <!-- TOP BAR -->
        <div class="topbar">
            <h1>
                <i class="fas fa-tractor" style="color:#7cb342; font-size:1.6rem; vertical-align:middle;"></i>
                Crop
                <span>manage farm Crop</span>
            </h1>
          
        </div>

        <!-- ===== CREATE CATEGORY FORM (inline) ===== -->
        <div class="create-category-box">
          
            <a href="/admin/crop/create" class="btn-submit"><i class="fas fa-plus-circle"></i> Create</a>
        </div>

        <!-- ===== CATEGORIES LIST ===== -->
        <div class="categories-header">
            <h2><i class="fas fa-list-ul"></i> All Crop</h2>
            <span class="text-muted">showing 5 entries</span>
        </div>
        <pre>

      
        </pre>
        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Image</th>
                        <th>Title</th>
                        <th>CAT</th>
                        <th>Status</th>
                        <th>Created at</th>
                      
                        <th style="text-align:right;">Actions</th>
                    </tr>
                </thead>
                <tbody>

                     @foreach ($data as $row)

                        <tr>
                            <td><strong>{{ $row->id }}</strong></td>
                            <td><img width="30" src="{{ asset('storage') }}/{{ $row->image }}"></img></td>
                            <td>{{ $row->title }}</td>
                            <td><span class="parent-badge">{{ $row->parent ? $row->parent->name : "" }}</span></td>
                            <td>{{ $row->created_at }}</td>
                            <td></td>

                            <td style="text-align:right;">
                                <div class="actions" style="justify-content:flex-end;">
                                    <a href="#" title="Edit"><i class="fas fa-edit"></i></a>
                                    <a href="#" class="danger" title="Delete"><i class="fas fa-trash-alt"></i></a>
                                </div>
                            </td>
                        </tr>


                    @endforeach 


                </tbody>
            </table>

           
        </div>

 

    </main>

@endsection