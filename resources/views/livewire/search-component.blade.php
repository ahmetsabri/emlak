<div>
    <div class="form-wrapper">
        <form wire:submit.prevent='search'>
            <div class="wrapper">
                <div class="type-filter">
                    @foreach ($rootCategories as $rootCategory)
                        <div class="custom-radio">
                            <input type="radio" name="type" value="{{ $rootCategory->id }}"
                                wire:model.live='selectedRootCategory'><span>{{ $rootCategory->name }}</span>
                        </div>
                    @endforeach
                </div>
                <div class="form">
                    <div class="item width--2">
                        <label>Portföy Arama</label>
                        <input wire:model='keyword' type="text" placeholder="Örn: 3+1 Satılık veya İlan No">
                    </div>
                    <div class="item width--2 custom-select">
                        <label>İşlem Tipi</label>
                        <select wire:model.live='selectedTypeCategory'>
                            <option value="0" selected>Farketmez</option>

                            @foreach ($typeCategories as $typeCategory)
                                <option value="{{ $typeCategory->id }}">
                                    {{ $typeCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="item width--2 custom-select">
                        <label>Portföy Tipi</label>
                        <select wire:model.live='selectedPortfolioType'>
                            <option value="0" selected>Farketmez</option>

                            @foreach ($portfolioTypes as $portfolioType)
                                <option value="{{ $portfolioType->id }}">
                                    {{ $portfolioType->name }}
                                </option>
                            @endforeach
                        </select>

                    </div>

                    <div class="item width--1 currency">
                        <label>Min Fiyat</label>
                        <input wire:model='minPrice' type="number" placeholder="0" min="0">
                        <small class="currency-value">₺</small>
                    </div>
                    <div class="item width--1 currency">
                        <label>Max Fiyat</label>
                        <input wire:model='maxPrice' type="number" placeholder="100" min="0">
                        <small class="currency-value">₺</small>
                    </div>

                    <div class="item width--2 custom-select">
                        <label>İl</label>
                        <select wire:model.live='provinceId'>
                            <option value="0" selected>Farketmez</option>

                            @foreach ($provinces as $province)
                                <option value="{{ $province->id }}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="item width--1 custom-select">
                        <label>İlçe</label>
                        <select wire:model.live='countyId'>
                            <option value="0" selected>Farketmez</option>

                            @foreach ($counties as $county)
                                <option value="{{ $county->id }}">{{ $county->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="item width--1 custom-select">
                        <label>Mahalle</label>
                        <select wire:model.live='districtId'>
                            <option value="0" selected>Farketmez</option>
                            @foreach ($districts as $district)
                                <option value="{{ $district->id }}">{{ $district->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="item width--3">
                        <button class="button button color--maximum-red-bg size--stretch size--medium">
                            <span>Haritada Göster</span>
                        </button>
                    </div>
                    <div class="item width--3">
                        <button class="button button color--endeavour-bg size--stretch size--medium">
                            <span>Portföy Ara</span>
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>
