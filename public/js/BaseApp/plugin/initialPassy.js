/**
 * Created by achva on 17/08/2017.
 */
$(function() {
    // Input labels
    var $inputLabel = $('.label-indicator input');
    var $inputLabelAbsolute = $('.label-indicator-absolute input');
    var $inputGroup = $('.group-indicator input');

    // Output labels
    var $outputLabel = $('.label-indicator > span');
    var $outputLabelAbsolute = $('.label-indicator-absolute > span');
    var $outputGroup = $('.group-indicator > span');

    // Requirements a inserted password should meet
    $.passy.requirements = {

        // Character types a password should contain
        characters: [
            $.passy.character.DIGIT,
            $.passy.character.LOWERCASE,
            $.passy.character.UPPERCASE,
            $.passy.character.PUNCTUATION
        ],

        // A minimum and maximum length
        length: {
            min: 8,
            max: Infinity
        }
    };


    // Thresholds are numeric values representing
    // the estimated amount of days for a single computer
    // to brute force the password, assuming it processes
    // about 1,000,000 passwords per second

    $.passy.threshold = {
        medium: 365,
        high: Math.pow( 365, 2 ),
        extreme: Math.pow( 365, 5 )
    };

    // Strength meter
    var feedback = [
        {color: '#D55757', text: 'Weak', textColor: '#fff'},
        {color: '#EB7F5E', text: 'Normal', textColor: '#fff'},
        {color: '#3BA4CE', text: 'Good', textColor: '#fff'},
        {color: '#40B381', text: 'Strong', textColor: '#fff'}
    ];

    // Absolute positioned label
    $inputLabelAbsolute.passy(function(strength) {
        $outputLabelAbsolute.text(feedback[strength].text);
        $outputLabelAbsolute.css('background-color', feedback[strength].color).css('color', feedback[strength].textColor);
    });

    // Absolute label
    $('.generate-label-absolute').click(function() {
        $inputLabelAbsolute.passy( 'generate', 10 );
    });
});
