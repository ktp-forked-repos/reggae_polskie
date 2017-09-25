     jssor_slider1_starter = function (containerId) {
            var options = {
                $AutoPlay: true,
                $AutoPlaySteps: 1,
                $AutoPlayInterval: 0,
                $PauseOnHover: 1,
                $ArrowKeyNavigation: true,
                $SlideEasing: $JssorEasing$.$EaseLinear,
                $SlideDuration: 3000,
                $MinDragOffsetToSlide: 20,
                $SlideWidth: 150,
                $SlideSpacing: 0,
                $DisplayPieces: 7,
                $ParkingPosition: 0,
                $UISearchMode: 1,
                $PlayOrientation: 1,
                $DragOrientation: 1
            };
            var jssor_slider1 = new $JssorSlider$(containerId, options);
            function ScaleSlider() {
                var parentWidth = jssor_slider1.$Elmt.parentNode.clientWidth;
                if (parentWidth)
                    jssor_slider1.$SetScaleWidth(Math.min(parentWidth, col-xs-12));
                else
                    $JssorUtils$.$Delay(ScaleSlider, 30);
            }
            ScaleSlider();
            $JssorUtils$.$AddEvent(window, "load", ScaleSlider);
            if (!navigator.userAgent.match(/(iPad)|(iPhone)|(iPod)|(android)|(webOS)/)) {
                $JssorUtils$.$OnWindowResize(window, ScaleSlider);
            }
        };