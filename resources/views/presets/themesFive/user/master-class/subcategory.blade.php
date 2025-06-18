@extends($activeTemplate . 'layouts.master')

<style>
    .category-card {
        transition: transform 0.3s, border-color 0.3s;
        border: 2px solid transparent;
    }

    .category-card:hover {
        transform: scale(1.05);
        border-color: hsl(var(--base));
    }

    .fancy-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 1000;
        visibility: hidden;
        opacity: 0;
        transition: visibility 0.3s, opacity 0.3s ease;
    }

    .fancy-modal .modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 1;
    }

    .fancy-modal .modal-container {
        position: relative;
        background: #fff;
        border-radius: 8px;
        padding: 20px;
        max-width: 400px;
        text-align: center;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        z-index: 2;
        animation: slideIn 0.3s ease;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 15px;
    }

    .modal-header h2 {
        margin: 0;
        font-size: 1.5rem;
    }

    .close-btn {
        background: transparent;
        border: none;
        font-size: 1.5rem;
        cursor: pointer;
    }

    .modal-body {
        font-size: 1rem;
        margin-bottom: 20px;
        color: #555;
    }

    .modal-footer {
        display: flex;
        justify-content: space-between;
        gap: 10px;
    }

    .upgrade-btn {
        background: hsl(var(--base));
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        text-decoration: none;
        transition: background 0.3s ease;
    }

    .upgrade-btn:hover {
        background: hsl(var(--base), 80%);
    }

    .cancel-btn {
        background: #f5f5f5;
        color: #555;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        font-size: 1rem;
        cursor: pointer;
    }

    .cancel-btn:hover {
        background: #ddd;
    }

    .fancy-modal.show {
        visibility: visible;
        opacity: 1;
    }
</style>

{{-- @section('content')
    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div style="text-align: center">
                <h4> {{ $categories->title }} </h4>
                <p> {{ $categories->description }} </p>
            </div>
            <div class="row">
                @foreach ($subcategories as $subcategory)
                    <div class="col-lg-3 col-md-6 mt-5">
                        <div class="card category-card" style="text-align:center; overflow:hidden">
                            <a href=" {{ route('user.masterclass.videos', $subcategory->id) }} ">
                                <div class="mt-3">
                                    <img src="{{ asset('subcategory/' . $subcategory->file) }}" class="category-image"
                                        style="height: 150px; width:180px">
                                </div>
                                <div class="card-body text-center">
                                    <h5 class="card-title"> {{ $subcategory->title }} </h5>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection --}}
@section('content')
    <div class="body-wrapper">
        <div class="container mt-3 mb-5">
            <div style="text-align: center">
                <h4>{{ $categories->title }}</h4>
                <p>{{ $categories->description }}</p>
            </div>
            <div class="row">
                @foreach ($subcategories as $subcategory)
                    <div class="col-lg-3 col-md-6 mt-5">
                        <div class="card category-card" style="text-align:center; overflow:hidden">
                            @if (Auth::user()->is_upgrade > 0)
                                <a href="{{ route('user.masterclass.videos', $subcategory->id) }}">
                                    <div class="mt-3">
                                        <img src="{{ asset('subcategory/' . $subcategory->file) }}" class="category-image"
                                            style="height: 150px; width:180px">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $subcategory->title }}</h5>
                                    </div>
                                </a>
                            @else
                                <div onclick="showUpgradeModal()">
                                    <div class="mt-3">
                                        <img src="{{ asset('subcategory/' . $subcategory->file) }}" class="category-image"
                                            style="height: 150px; width:180px">
                                    </div>
                                    <div class="card-body text-center">
                                        <h5 class="card-title">{{ $subcategory->title }}</h5>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Fancy Upgrade Modal -->
    <div id="upgradeModal" class="fancy-modal hidden">
        <div class="modal-overlay" onclick="closeUpgradeModal()"></div>
        <div class="modal-container">
            <div class="modal-header">
                <h2>Upgrade Required</h2>
                <button class="close-btn" onclick="closeUpgradeModal()">&times;</button>
            </div>
            <div class="modal-body">
                <p>You need to upgrade your plan to access these videos. Unlock exclusive content with just one click!</p>
            </div>
            <div class="modal-footer">
                <a href="{{ route('user.upgradeplanupgrade') }}" class="upgrade-btn">Upgrade Now</a>
                <button class="cancel-btn" onclick="closeUpgradeModal()">Not Now</button>
            </div>
        </div>
    </div>


    <script>
        function showUpgradeModal() {
            document.getElementById('upgradeModal').classList.add('show');
        }

        function closeUpgradeModal() {
            document.getElementById('upgradeModal').classList.remove('show');
        }
    </script>
@endsection
