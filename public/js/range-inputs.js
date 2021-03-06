$(function () {
    let livewireComponentId = $('#search-form').data('id');
    let livewireComponent = livewire.find(livewireComponentId);

    /**
     * PRICE SLIDER
     */
    let $priceRange = $("#price-range");
    let priceRangeMin = livewireComponent.get('options.price.min');
    let priceRangeMax = livewireComponent.get('options.price.max');
    $priceRange.slider({
        range: true,
        min: 0,
        max: priceRangeMax,
        values: [priceRangeMin, priceRangeMax],
        slide: function (event, ui) {
            // update ui
            if (ui.values[0] > priceRangeMin || ui.values[1] < priceRangeMax) {
                $(this).addClass('active-slider');
            } else {
                $(this).removeClass('active-slider');
            }
            $("#price-min").html("$" + ui.values[0]);
            $("#price-max").html("$" + ui.values[1]);

            $("#input-price-min").val(ui.values[0]);
            $("#input-price-max").val(ui.values[1]);

            // update livewire data
            livewireComponent.set('filter.price.min', ui.values[0], true);
            livewireComponent.set('filter.price.max', ui.values[1], true);
        }
    });

    $("#input-price-min").on('change', function() {
        let inputPriceMin = $(this).val();

        // Handle if setting min greater than max
        if (parseFloat(inputPriceMin) > parseFloat($($priceRange).slider("option", "values")[1])) {
            inputPriceMin = $($priceRange).slider("option", "values")[1]
            $("#input-price-min").val(inputPriceMin)
        } else if (parseFloat(inputPriceMin) <= 0) {
            inputPriceMin = 0;
            $("#input-price-min").val(inputPriceMin)
        }

        // Update UI
        if (inputPriceMin >= priceRangeMin || parseFloat($($priceRange).slider("option", "values")[1]) < priceRangeMax) {
            $($priceRange).addClass('active-slider');
        } else {
            $($priceRange).removeClass('active-slider');
        }

        $($priceRange).slider("option", "values", [ inputPriceMin, $($priceRange).slider("option", "values")[1] ]);

        $("#price-min").html("$" + inputPriceMin);

        livewireComponent.set('filter.price.min', inputPriceMin, true);
    });

    $("#input-price-max").on('change', function() {
        let inputPriceMax = $(this).val();

        // Handle if setting min greater than max
        if (parseFloat(inputPriceMax) > parseFloat(priceRangeMax)) {
            inputPriceMax = $($priceRange).slider("option", "values")[1]
            $("#input-price-max").val(inputPriceMax)
        } else if (parseFloat(inputPriceMax) <= parseFloat($($priceRange).slider("option", "values")[0])) {
            inputPriceMax = parseFloat($($priceRange).slider("option", "values")[0]);
            $("#input-price-max").val(inputPriceMax)
        }

        // Update UI
        if (parseFloat($($priceRange).slider("option", "values")[0]) > priceRangeMin || inputPriceMax < priceRangeMax) {
            $($priceRange).addClass('active-slider');
        } else {
            $($priceRange).removeClass('active-slider');
        }

        $($priceRange).slider("option", "values", [ $($priceRange).slider("option", "values")[0], inputPriceMax]);

        $("#price-max").html("$" + inputPriceMax);

        livewireComponent.set('filter.price.max', inputPriceMax, true);
    });

    $("#price-min").html("$" + $priceRange.slider("values", 0));
    $("#price-max").html("$" + $priceRange.slider("values", 1));


    /**
     * DISK SIZE SLIDER
     */
    let $diskRange = $("#disk-range");
    let diskSizeRangeMin = livewireComponent.get('options.diskSize.min');
    let diskSizeRangeMax = livewireComponent.get('options.diskSize.max');
    $diskRange.slider({
        range: true,
        min: diskSizeRangeMin,
        max: diskSizeRangeMax,
        values: [livewireComponent.get('filter.diskSize.min'), livewireComponent.get('filter.diskSize.max')],
        slide: function (event, ui) {
            // update ui
            if(ui.values[0] > diskSizeRangeMin || ui.values[1] < diskSizeRangeMax) {
                $(this).addClass('active-slider');
            } else {
                $(this).removeClass('active-slider');
            }
            $("#disk-min").html(ui.values[0] + ' GB');
            $("#disk-max").html(ui.values[1] + ' GB');

            // update livewire data
            livewireComponent.set('filter.diskSize.min', ui.values[0], true);
            livewireComponent.set('filter.diskSize.max', ui.values[1], true);
        }
    });

    $("#disk-min").html($diskRange.slider("values", 0) + ' GB');
    $("#disk-max").html($diskRange.slider("values", 1) + ' GB');


    /**
     * RAM RANGE SLIDER
     */
    let $ramRange = $("#ram-range");
    let ramRangeMin = livewireComponent.get('options.ram.min');
    let ramRangeMax = livewireComponent.get('options.ram.max');
    $ramRange.slider({
        range: true,
        min: ramRangeMin,
        max: ramRangeMax,
        values: [livewireComponent.get('filter.ram.min'), livewireComponent.get('filter.ram.max')],
        slide: function (event, ui) {
            // update ui
            if(ui.values[0] > ramRangeMin || ui.values[1] < ramRangeMax) {
                $(this).addClass('active-slider');
            } else {
                $(this).removeClass('active-slider');
            }
            $("#ram-min").html(ui.values[0] + ' MB');
            $("#ram-max").html(ui.values[1] + ' MB');

            // update livewire data
            livewireComponent.set('filter.ram.min', ui.values[0], true);
            livewireComponent.set('filter.ram.max', ui.values[1], true);
        }
    });

    $("#ram-min").html($ramRange.slider("values", 0) + ' MB');
    $("#ram-max").html($ramRange.slider("values", 1) + ' MB');


    /**
     * CPU CORE COUNT RANGE SLIDER
     */
    let $cpuRange = $("#cpu-range");
    let cpuRangeMin = livewireComponent.get('options.cpuCount.min');
    let cpuRangeMax = livewireComponent.get('options.cpuCount.max');
    $cpuRange.slider({
        range: true,
        min: cpuRangeMin,
        max: cpuRangeMax,
        values: [livewireComponent.get('filter.cpuCount.min'), livewireComponent.get('filter.cpuCount.max')],
        slide: function (event, ui) {
            // update ui
            if(ui.values[0] > cpuRangeMin || ui.values[1] < cpuRangeMax) {
                $(this).addClass('active-slider');
            } else {
                $(this).removeClass('active-slider');
            }
            $("#cpu-min").html(ui.values[0]);
            $("#cpu-max").html(ui.values[1]);

            // update livewire data
            livewireComponent.set('filter.cpuCount.min', ui.values[0], true);
            livewireComponent.set('filter.cpuCount.max', ui.values[1], true);
        }
    });

    $("#cpu-min").html($cpuRange.slider("values", 0));
    $("#cpu-max").html($cpuRange.slider("values", 1));


    $("#country_selector").countrySelect({
        onlyCountries: $("#country_selector").data('countries'),
        // responsiveDropdown: true,
        preferredCountries: ["xn"]
    });

    $("#country_selector").countrySelect('setCountry')


    $("#country_selector").on('change', function(e) {
        let countryData = $("#country_selector").countrySelect("getSelectedCountryData");
        livewireComponent.set('filter.country', countryData.iso2, true);
    });
});


