
console.log(1);

document.addEventListener("DOMContentLoaded", function(event) { 
    console.log(2);
    $('#smartwizard').smartWizard({
        selected: 0, // Initial selected step, 0 = first step
        theme: 'arrows', // theme for the wizard, related css need to include for other than default theme
        justified: true, // Nav menu justification. true/false
        darkMode: false, // Enable/disable Dark Mode if the theme supports. true/false
        autoAdjustHeight: true, // Automatically adjust content height
        cycleSteps: false, // Allows to cycle the navigation of steps
        backButtonSupport: true, // Enable the back button support
        enableURLhash: false, // Enable selection of the step based on url hash
        transition: {
            animation: 'fade', // Effect on navigation, none/fade/slide-horizontal/slide-vertical/slide-swing
            speed: '400', // Transion animation speed
            easing: '' // Transition animation easing. Not supported without a jQuery easing plugin
        },
        toolbarSettings: {
            toolbarPosition: 'bottom', // none, top, bottom, both
            toolbarButtonPosition: 'center', // left, right, center
            showNextButton: true, // show/hide a Next button
            showPreviousButton: true, // show/hide a Previous button
            toolbarExtraButtons: [] // Extra buttons to show on toolbar, array of jQuery input/buttons elements
        },
        anchorSettings: {
            anchorClickable: true, // Enable/Disable anchor navigation
            enableAllAnchors: false, // Activates all anchors clickable all times
            markDoneStep: true, // Add done state on navigation
            markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
            removeDoneStepOnNavigateBack: false, // While navigate back done step after active step will be cleared
            enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
        },
        keyboardSettings: {
            keyNavigation: true, // Enable/Disable keyboard navigation(left and right keys are used if enabled)
            keyLeft: [37], // Left key code
            keyRight: [39] // Right key code
        },
        lang: { // Language variables for button
            next: 'Next',
            previous: 'Previous'
        },
        disabledSteps: [], // Array Steps disabled
        errorSteps: [], // Highlight step with errors
        hiddenSteps: [] // Hidden steps
    });
    
    $("#smartwizard").on("showStep", function (e, anchorObject, stepIndex, stepDirection) {
        if (stepIndex == 2){
            let toolbarbtn = document.querySelector(".sw-btn-next")
            toolbarbtn.classList.remove('finish')
            toolbarbtn.innerHTML = 'Checkout' 
        }
        else 
        if (stepIndex == 3) {
            let toolbarbtn = document.querySelector(".sw-btn-next")
            toolbarbtn.classList.add('finish')
            toolbarbtn.innerHTML = 'Back to Homepage'
            let name = document.getElementsByName('name')[0].value
            let phone = document.getElementsByName('phone')[0].value
            let address = document.getElementsByName('address')[0].value
            let city = document.getElementsByName('city')[0].value
            let state = document.getElementsByName('state')[0].value
            let country = document.getElementsByName('country')[0].value
            address = address+  ', ' + city +  ', ' + state +  ', ' +country
            console.log(name,phone,address);
            
            // $(".finish").click(function (e) {
            //     console.log('helo');
            //     window.location.href = '../../index.html'
            //     removeAll();
            //     //continue here
            // });
    
            // setTimeout(() => {
            //     if ($('#smartwizard').smartWizard("getStepIndex") == 3) {
            //         document.querySelector(".alert").classList.remove('d-none')
            //         toolbarbtn.classList.remove('disabled')
            //         setTimeout(() => {
            //             $(".finish").click()
            //             removeAll();
            //         }, 4000);
            //     }
            // }, 3000);
    
    
        } else {
            let toolbarbtn = document.querySelector(".sw-btn-next")
            toolbarbtn.classList.remove('finish')
            toolbarbtn.innerHTML = 'Next'
            document.querySelector(".alert").classList.add('d-none')
        }
    
    });
    
});
