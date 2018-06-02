var Busca = Busca || {};

Busca.MaskPhoneNumber = (function () {

    function MaskPhoneNumber() {
        this.inputPhoneNumber = $('.js-phone-number');
    }

    MaskPhoneNumber.prototype.enable = function () {
        var maskBehavior = function (val) {
            return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
        };

        var options = {
            onKeyPress: function (val, e, field, options) {
                field.mask(maskBehavior.apply({}, arguments), options);
            }
        };

        this.inputPhoneNumber.mask(maskBehavior, options);
    }

    return MaskPhoneNumber;

}());

Busca.MaskCep = (function () {

    function MaskCep() {
        this.inputCep = $('.js-cep');
    }

    MaskCep.prototype.enable = function () {
        this.inputCep.mask('00.000-000');
    }

    return MaskCep;

}());

Busca.MaskDate = (function () {

    function MaskDate() {
        this.inputDate = $('.js-date');
    }

    MaskDate.prototype.enable = function () {
        this.inputDate.mask('00/00/0000');
        this.inputDate.datepicker({
            orientation: 'bottom',
            language: 'pt-BR',
            autoclose: true
        });
    }

    return MaskDate;

}());



$(function () {

    var maskPhoneNumber = new Busca.MaskPhoneNumber();
    maskPhoneNumber.enable();

    var maskCep = new Busca.MaskCep();
    maskCep.enable();

    var maskDate = new Busca.MaskDate();
    maskDate.enable();


});
