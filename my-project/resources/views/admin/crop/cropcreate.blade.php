@extends('admin.layouts.app')
@section('admincontent')

    <main class="main">

        <!-- TOP BAR -->
        <div class="topbar">
            <h1>
                <i class="fas fa-plus-circle" style="color:#7cb342; font-size:1.6rem; vertical-align:middle;"></i>
                Create Crop
                <span>add new farm crop</span>
            </h1>
        </div>

        <!-- Flash Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i> {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-circle"></i> {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <i class="fas fa-exclamation-triangle"></i>
                <ul style="margin:0.5rem 0 0 1.2rem;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- ===== CREATE CROP FORM ===== -->
        <div class="form-card">
            <div class="form-header">
                <div class="form-header-left">
                    <i class="fas fa-seedling"></i>
                    <div>
                        <h3>Crop Details</h3>
                        <p>Fill in the information below to create a new crop</p>
                    </div>
                </div>
                <div class="form-header-right">
                    <a href="{{ url('admin/crop') }}" class="btn-secondary">
                        <i class="fas fa-arrow-left"></i> Back to List
                    </a>
                </div>
            </div>

            <form action="{{ route('admin.crop.post') }}" method="POST" class="category-form" enctype="multipart/form-data">
                @csrf

                <div class="form-body">
                    <!-- Two Column Layout -->
                    <div class="form-row">
                        <!-- Left Column -->
                        <div class="form-col">
                            <!-- Basic Information -->
                            <div class="form-group-box">
                               
                                 

                                    <div class="form-group">
                                        <label for="parent_id" class="form-label">
                                            Parent Category
                                        </label>
                                        <div class="input-icon">
                                            <i class="fas fa-level-up-alt"></i>
                                            <select id="parent_id" name="categories_id"
                                                class="form-control @error('parent_id') is-invalid @enderror">
                                                <option value="">— No Parent (Top Level) —</option>
                                                @foreach($parentCategories ?? [] as $parent)
                                                    <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                                        {{ $parent->name }}
                                                        @if($parent->parent)
                                                            ({{ $parent->parent->name }})
                                                        @endif
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('parent_id')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                        <small class="form-text">Select a parent category to create a sub-category.</small>
                                    </div>
                                
                                <div class="form-group">
                                    <label for="title" class="form-label">
                                        Title
                                    </label>
                                    <div class="input-icon">
                                        <i class="fas fa-link"></i>
                                        <input type="text" id="title" name="title"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="Title" value="{{ old('title') }}">
                                    </div>
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                  
                                </div>
                                <div class="form-group">
                                    <label for="slug" class="form-label">
                                        Slug (URL)
                                    </label>
                                    <div class="input-icon">
                                        <i class="fas fa-link"></i>
                                        <input type="text" id="slug" name="slug"
                                            class="form-control @error('slug') is-invalid @enderror"
                                            placeholder="auto-generated from name" value="{{ old('slug') }}">
                                    </div>
                                    @error('slug')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text">Leave blank to auto-generate from the name.</small>
                                </div>
                            </div>

                            <!-- Category Hierarchy -->
                            <!-- <div class="form-group-box">
                                <div class="group-label">
                                    <i class="fas fa-sitemap" style="color:#7cb342;"></i>
                                    <span>Category Hierarchy</span>
                                </div>

                                <div class="form-group">
                                    <label for="parent_id" class="form-label">
                                        Parent Category
                                    </label>
                                    <div class="input-icon">
                                        <i class="fas fa-level-up-alt"></i>
                                        <select id="parent_id" 
                                                name="parent_id" 
                                                class="form-control @error('parent_id') is-invalid @enderror">
                                            <option value="">— No Parent (Top Level) —</option>
                                            @foreach($parentCategories ?? [] as $parent)
                                                <option value="{{ $parent->id }}" {{ old('parent_id') == $parent->id ? 'selected' : '' }}>
                                                    {{ $parent->name }}
                                                    @if($parent->parent)
                                                        ({{ $parent->parent->name }})
                                                    @endif
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('parent_id')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text">Select a parent category to create a sub-category.</small>
                                </div>
                            </div> -->
                        </div>

                        <!-- Right Column -->
                        <div class="form-col">
                            <!-- Status & Settings -->
                            <div class="form-group-box">
                                <div class="group-label">
                                    <i class="fas fa-sliders-h" style="color:#7cb342;"></i>
                                    <span>Status & Settings</span>
                                </div>

                                <div class="form-group">
                                    <label for="status" class="form-label required">
                                        Status
                                    </label>
                                    <div class="input-icon">
                                        <i class="fas fa-circle"></i>
                                        <select id="status" name="status"
                                            class="form-control @error('status') is-invalid @enderror">
                                            <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>
                                                ✅ Active
                                            </option>
                                            <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>
                                                ❌ Inactive
                                            </option>
                                        </select>
                                    </div>
                                    @error('status')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text">Set the visibility and availability of this category.</small>
                                </div>

                                <!-- Image Field - Replacing Sort Order -->
                                <div class="form-group">
                                    <label for="image" class="form-label">
                                        <i class="fas fa-image"></i> Image
                                    </label>
                                    <div class="file-upload-wrapper">
                                        <div class="file-upload-area" onclick="document.getElementById('image').click()">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                            <p>Click to upload or drag & drop</p>
                                            <span>JPG, PNG, GIF, WebP up to 2MB</span>
                                        </div>
                                        <input type="file" id="image" name="image"
                                            class="form-control @error('image') is-invalid @enderror" accept="image/*"
                                            style="display:none;" onchange="previewImage(this)">
                                        <div id="imagePreview" style="display:none;margin-top:0.8rem;">
                                            <img id="previewImg" src="#" alt="Preview"
                                                style="max-width:200px;max-height:150px;border-radius:8px;border:1px solid #dce8e0;object-fit:cover;">
                                            <button type="button" onclick="removeImage()"
                                                style="display:block;margin-top:0.4rem;background:#ffebee;border:none;color:#c62828;padding:0.3rem 1rem;border-radius:30px;font-size:0.75rem;cursor:pointer;transition:0.2s;">
                                                <i class="fas fa-times"></i> Remove Image
                                            </button>
                                        </div>
                                    </div>
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                    <small class="form-text">Upload a representative image for this crop.</small>
                                </div>
                            </div>

                            <!-- Meta Information -->



                        </div>
                    </div>
                    <div class="from-row">
                        <div class="form-group-box" id="container">
                            <div class="group-label">
                                <i class="fas fa-code" style="color:#7cb342;"></i>
                                <span>Content</span>
                            </div>

                            <div class="form-group">
                                <label for="content" class="form-label">
                                    <i class="fas fa-align-left"></i> Content
                                </label>
                                <textarea id="editor" name="content"
                                    class="form-control @error('content') is-invalid @enderror" rows="6"
                                    placeholder="Enter detailed content about this crop...">{{ old('content') }}</textarea>
                                @error('content')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                                <small class="form-text">Detailed description or content about the crop.</small>
                            </div>
                        </div>
                    </div>

                </div>

                <!-- Form Actions -->
                <div class="form-footer">
                    <div class="form-footer-left">
                        <span class="required-text"><span class="required-star">*</span> Required fields</span>
                    </div>
                    <div class="form-footer-right">
                        <a href="{{ url('admin/crop') }}" class="btn-cancel">
                            <i class="fas fa-times"></i> Cancel
                        </a>
                        <button type="reset" class="btn-reset">
                            <i class="fas fa-undo"></i> Reset
                        </button>
                        <button type="submit" class="btn-submit">
                            <i class="fas fa-save"></i> Create Crop
                        </button>
                    </div>
                </div>
            </form>
        </div>

    </main>

    <script>
        // Auto-generate slug from name
        document.getElementById('name').addEventListener('keyup', function () {
            const slugInput = document.getElementById('slug');
            if (!slugInput.value || slugInput.dataset.generated) {
                const slug = this.value
                    .toLowerCase()
                    .replace(/[^\w\s-]/g, '')
                    .replace(/[\s_-]+/g, '-')
                    .replace(/^-+|-+$/g, '');
                slugInput.value = slug;
                slugInput.dataset.generated = true;
            }
        });

        // Reset slug when user manually edits
        document.getElementById('slug').addEventListener('input', function () {
            this.dataset.generated = false;
        });

        // Image preview
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            const img = document.getElementById('previewImg');

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    img.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        function removeImage() {
            document.getElementById('image').value = '';
            document.getElementById('imagePreview').style.display = 'none';
            document.getElementById('previewImg').src = '#';
        }
    </script>

    <style>
        /* Form Card */
        .form-card {
            background: #fff;
            border-radius: 20px;
            border: 1px solid #e4ede7;
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.04);
            overflow: hidden;
        }

        .form-header {
            padding: 1.5rem 2rem;
            background: #f8fbf7;
            border-bottom: 1px solid #e4ede7;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .form-header-left {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .form-header-left i {
            font-size: 2rem;
            color: #7cb342;
        }

        .form-header-left h3 {
            font-size: 1.1rem;
            font-weight: 600;
            color: #1a3a2b;
            margin: 0;
        }

        .form-header-left p {
            font-size: 0.85rem;
            color: #5a7a6a;
            margin: 0.2rem 0 0 0;
        }

        .btn-secondary {
            background: #e8f0ec;
            color: #1a3a2b;
            padding: 0.5rem 1.2rem;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: 0.2s;
        }

        .btn-secondary:hover {
            background: #d5e3dd;
            transform: translateY(-1px);
        }

        .form-body {
            padding: 2rem;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        .form-col {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .form-group-box {
            background: #fafcfa;
            border: 1px solid #eef3ea;
            border-radius: 14px;
            padding: 1.5rem;
            /* border: 2px solid red; */
        }

        .group-label {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            font-weight: 600;
            color: #1a3a2b;
            font-size: 0.95rem;
            margin-bottom: 1.2rem;
            padding-bottom: 0.6rem;
            border-bottom: 2px solid #eef3ea;
            /* border: 2px solid black; */

        }

        /* #container{
            border: 2px solid blue;
            /* width: 100%; */
        /* position: absolute;
            display: flex;
            align-items: center;
        } */
        */ .group-label i {
            font-size: 1.1rem;
        }

        .form-group {
            margin-bottom: 1.2rem;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #1a3a2b;
            font-size: 0.85rem;
            margin-bottom: 0.4rem;
        }

        .form-label.required::after {
            content: ' *';
            color: #d32f2f;
        }

        .input-icon {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon i {
            position: absolute;
            left: 12px;
            color: #5a7a6a;
            font-size: 0.9rem;
            z-index: 1;
        }

        .input-icon .form-control {
            padding-left: 38px;
            width: 100%;
        }

        .form-control {
            width: 100%;
            padding: 0.6rem 1rem;
            border: 1px solid #dce8e0;
            border-radius: 10px;
            font-size: 0.9rem;
            font-family: 'Inter', sans-serif;
            transition: 0.2s;
            background: #fff;
        }

        .form-control:focus {
            outline: none;
            border-color: #7cb342;
            box-shadow: 0 0 0 3px rgba(124, 179, 66, 0.1);
        }

        .form-control.is-invalid {
            border-color: #d32f2f;
        }

        .form-control.is-invalid:focus {
            box-shadow: 0 0 0 3px rgba(211, 47, 47, 0.1);
        }

        .invalid-feedback {
            display: block;
            color: #d32f2f;
            font-size: 0.8rem;
            margin-top: 0.2rem;
        }

        .form-text {
            display: block;
            color: #5a7a6a;
            font-size: 0.75rem;
            margin-top: 0.2rem;
        }

        textarea.form-control {
            resize: vertical;
            min-height: 80px;
        }

        select.form-control {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%235a7a6a' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 12px center;
            padding-right: 36px;
        }

        /* File Upload Styles */
        .file-upload-wrapper {
            width: 100%;
        }

        .file-upload-area {
            border: 2px dashed #dce8e0;
            border-radius: 12px;
            padding: 1.5rem;
            text-align: center;
            cursor: pointer;
            transition: 0.2s;
            background: #fafcfa;
        }

        .file-upload-area:hover {
            border-color: #7cb342;
            background: #f0f8ee;
            transform: translateY(-2px);
        }

        .file-upload-area i {
            font-size: 2.5rem;
            color: #7cb342;
            display: block;
            margin-bottom: 0.5rem;
        }

        .file-upload-area p {
            margin: 0;
            font-weight: 500;
            color: #1a3a2b;
        }

        .file-upload-area span {
            font-size: 0.75rem;
            color: #5a7a6a;
        }

        /* Form Footer */
        .form-footer {
            padding: 1.2rem 2rem;
            background: #f8fbf7;
            border-top: 1px solid #e4ede7;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 1rem;
        }

        .form-footer-left {
            font-size: 0.85rem;
            color: #5a7a6a;
        }

        .required-star {
            color: #d32f2f;
            font-weight: 700;
        }

        .form-footer-right {
            display: flex;
            gap: 0.8rem;
            flex-wrap: wrap;
        }

        .btn-cancel,
        .btn-reset,
        .btn-submit {
            padding: 0.6rem 1.5rem;
            border-radius: 30px;
            border: none;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-cancel {
            background: #f0f5ee;
            color: #5a7a6a;
        }

        .btn-cancel:hover {
            background: #e4ede7;
            transform: translateY(-1px);
        }

        .btn-reset {
            background: #fff3e0;
            color: #e65100;
        }

        .btn-reset:hover {
            background: #ffe0b2;
            transform: translateY(-1px);
        }

        .btn-submit {
            background: #7cb342;
            color: #fff;
            box-shadow: 0 4px 12px rgba(124, 179, 66, 0.3);
        }

        .btn-submit:hover {
            background: #6a9f3a;
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(124, 179, 66, 0.4);
        }

        /* Alert Styles */
        .alert {
            padding: 0.8rem 1.2rem;
            border-radius: 12px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-weight: 500;
        }

        .alert-success {
            background: #e8f5e9;
            color: #1e5a1e;
            border: 1px solid #c8e6c9;
        }

        .alert-danger {
            background: #ffebee;
            color: #a11a1a;
            border: 1px solid #ffcdd2;
        }

        .alert ul {
            margin: 0;
            padding-left: 1.2rem;
        }

        .alert ul li {
            list-style: none;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .form-row {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        @media (max-width: 768px) {
            .form-header {
                flex-direction: column;
                align-items: flex-start;
                padding: 1.2rem;
            }

            .form-header-right {
                width: 100%;
            }

            .form-header-right .btn-secondary {
                width: 100%;
                justify-content: center;
            }

            .form-body {
                padding: 1.2rem;
            }

            .form-footer {
                flex-direction: column;
                align-items: stretch;
            }

            .form-footer-right {
                flex-direction: column;
            }

            .form-footer-right .btn-cancel,
            .form-footer-right .btn-reset,
            .form-footer-right .btn-submit {
                width: 100%;
                justify-content: center;
            }

            .file-upload-area {
                padding: 1rem;
            }
        }
    </style>

@endsection