'use strict';

var setContactHeight = function(){
	if(window.innerHeight < 768){
		document.getElementById('contact-form-wrapper').style.height = window.innerHeight +'px';
	}
}
setContactHeight();

var getValues = function(key, returnedData) {
	return decodeURI((RegExp(key + '=' + '(.+?)(&|$)').exec(returnedData) || [,null])[1]);
}

var joesApp = angular.module('joesApp', []);

joesApp
.service('anchorSmoothScroll', function(){
    
    this.scrollTo = function(eID) {

        // This scrolling function 
        // is from http://www.itnewb.com/tutorial/Creating-the-Smooth-Scroll-Effect-with-JavaScript
        
        var startY = currentYPosition();
        var stopY = elmYPosition(eID);
        var distance = stopY > startY ? stopY - startY : startY - stopY;
        if (distance < 100) {
            scrollTo(0, stopY); return;
        }
        var speed = Math.round(distance / 100);
        if (speed >= 20) speed = 20;
        var step = Math.round(distance / 25);
        var leapY = stopY > startY ? startY + step : startY - step;
        var timer = 0;
        if (stopY > startY) {
            for ( var i=startY; i<stopY; i+=step ) {
                setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
                leapY += step; if (leapY > stopY) leapY = stopY; timer++;
            } return;
        }
        for ( var i=startY; i>stopY; i-=step ) {
            setTimeout("window.scrollTo(0, "+leapY+")", timer * speed);
            leapY -= step; if (leapY < stopY) leapY = stopY; timer++;
        }
        
        function currentYPosition() {
            // Firefox, Chrome, Opera, Safari
            if (self.pageYOffset) return self.pageYOffset;
            // Internet Explorer 6 - standards mode
            if (document.documentElement && document.documentElement.scrollTop)
                return document.documentElement.scrollTop;
            // Internet Explorer 6, 7 and 8
            if (document.body.scrollTop) return document.body.scrollTop;
            return 0;
        }
        
        function elmYPosition(eID) {
            var elm = document.getElementById(eID);
            var y = elm.offsetTop - document.getElementById('scroll-nav').offsetHeight;
            var node = elm;
            while (node.offsetParent && node.offsetParent != document.body) {
                node = node.offsetParent;
                y += node.offsetTop;
            } return y;
        }

    };
    
}).controller('bodyCtrl', function($scope, $interval, $location, anchorSmoothScroll){
	$scope.switchLayout = false;
	$scope.isCircleHovered = false;
	$scope.isNavOpen = false;
	$scope.isScrolled = false;
	$scope.showContact = (getValues('formSubmit', window.location) === 'true') ? true : false;
	$scope.showreCaptchaError = false;
	$scope.setNavItemActive = false;
	
	$scope.checkNav = function($event){
		if ($scope.isNavOpen && ($event.target.className.indexOf('no-nav-check') < 0)){
			$scope.operateNav($event);
		}
	};

	$scope.showContactForm = function($event){
		$event.preventDefault();
		$scope.showContact = !$scope.showContact;
	};

    $interval(function(){
        $scope.switchLayout = !$scope.switchLayout;
    }, 30000);

    $scope.navHeightOffset = function(){
        return (window.innerHeight - document.getElementById('scroll-nav').offsetHeight) + 'px';
    };

    window.onresize = function(){
        $scope.navHeightOffset();
        $scope.$apply();
		setContactHeight();
    };

	$scope.operateNav = function($event){
		$event.preventDefault();
		$scope.isNavOpen = !$scope.isNavOpen;
		if($scope.isNavOpen && !$scope.isScrolled){
			$scope.isScrolled = true;
		}
	};
	
	$scope.gotoElement = function (eID, $event){
		$event.preventDefault();
		anchorSmoothScroll.scrollTo(eID);
    };
	
	$scope.contactSubmit = function($event){
		$event.preventDefault();
		$scope.formIsValid = true;

		//CHECK IF RECAPTCHA HAS BEEN SELECTED
		if((grecaptcha.getResponse()).length <= 0){
			$scope.showreCaptchaError = true;
			$scope.formIsValid = false;
			return false;
		}
		
		if($scope.formIsValid){
			document.getElementById("contact-joe-prehoda").submit();
		}
	};
    
}).directive("data-scroll", function ($window) {
    return function(scope, element, attrs) {
        angular.element($window).bind("data-scroll", function() {
             if (this.pageYOffset >= 1) {
                 scope.isScrolled = true;
             } else {
                 scope.isScrolled = false;
             }
            scope.$apply();
        });
    };
});