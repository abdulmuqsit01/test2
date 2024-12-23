<div class="" style="display: flex;flex-direction:column;overflow:hidden">
    <div class="container_category filter">
        <ul class="nav nav-pills showss home-mentor-bottom2" id="homepage1-tab" role="tablist">
            <button id="toggle" class="nav-link custom-home1-tab-btn"
                style="color: white; background-color: grey">Kategori : </button>
            {{-- <button id="all" class="nav-link custom-home1-tab-btn" value="{{ route('view_mobile_home_all') }}">ALL</button> --}}
            <li class="nav-item" role="presentation">
                <button class="active nav-link custom-home1-tab-btn tabList" id="pills-all-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-all" type="button" role="tab" aria-selected="true"
                    value="{{ route('view_mobile_home_all') }}"
                    style="white-space: nowrap;
                text-align: center;"> Semua </button>
            </li>
            @if (($userData = session()->get('user_data')) != null)
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-home1-tab-btn tabList" id="pills-all-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-all" type="button" role="tab" aria-selected="true"
                        value="{{ route('user_program_personalization') }}"
                        style="white-space: nowrap;
                                            text-align: center; background-color: #add8e6">
                        🔥 Direkomendasikan </button>
                </li>
            @endif
            @foreach ($getData['filterByCategoryList'] as $item)
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-home1-tab-btn tabList" id="pills-all-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-all" type="button" role="tab" aria-selected="true"
                        value="{{ route('view_mobile_home_category', ['category' => $item->id]) }}"style="white-space: nowrap;
                text-align: center;"> {{ $item->name }} </button>
                </li>
            @endforeach
        </ul>
        <ul class="nav nav-pills hidess home-mentor-bottom2" id="homepage1-tab" role="tablist">
            <button id="toggle" class="nav-link custom-home1-tab-btn"
                style="color: white; background-color: grey">Instansi : </button>
            {{-- <button id="all" class="nav-link custom-home1-tab-btn" value="{{ route('view_mobile_home_all') }}">ALL</button> --}}
            <li class="nav-item" role="presentation">
                <button class="active nav-link custom-home1-tab-btn tabList" id="pills-all-tab" data-bs-toggle="pill"
                    data-bs-target="#pills-all" type="button" role="tab" aria-selected="true"
                    value="{{ route('view_mobile_home_all') }}"
                    style="white-space: nowrap;
                text-align: center;"> Semua </button>
            </li>
            @if (($userData = session()->get('user_data')) != null)
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-home1-tab-btn tabList" id="pills-all-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-all" type="button" role="tab" aria-selected="true"
                        value="{{ route('user_program_personalization') }}"
                        style="white-space: nowrap;
                                                        text-align: center; background-color: #add8e6">
                        🔥 Direkomendasikan </button>
                </li>
            @endif
            @foreach ($getData['filterByInstansiList'] as $item)
                <li class="nav-item" role="presentation">
                    <button class="nav-link custom-home1-tab-btn tabList" id="pills-all-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-all" type="button" role="tab" aria-selected="true"
                        value="{{ route('view_mobile_home_instansi', ['instansi' => $item->id]) }}"
                        style="white-space: nowrap;
                        text-align: center;"> {{ $item->name }}
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</div>
