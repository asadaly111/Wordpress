 var slider_step2 = 10;
        var slider_min2 = 200000;
        var slider_max2 = 2000000;
        var rangeStr = '10%';
        var slider2 = new Slider('#ex2', {
            step: slider_step2,
            min: slider_min2,
            max: slider_max2,
            tooltip: 'hide',
            slideStart: true,
        });

        jQuery('#howmuch-num2').html('$0');
        slider2.on('change', function(value) {
            var mainvalue = value.newValue.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
            var num = '$' + mainvalue;
            jQuery('#howmuch-num2').show();
            jQuery('#howmuch-num2').html(num);
            var traditional = value.newValue*0.3;
            var equitySaved = traditional-12500;
            jQuery('.Traditional span').text('$'+traditional.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,")+' + 3% Buy Side');
            jQuery('.EquitySaved span').text('$'+equitySaved.toString().replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,"));
        });