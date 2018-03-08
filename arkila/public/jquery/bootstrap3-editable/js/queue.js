/**
QueueItem editable input.
Internally value stored as {remark: "Moscow", destination: "Lenina", building: "15"}

@class queue
@extends abstractinput
@final
@example
<a href="#" id="queue" data-type="queue" data-pk="1">awesome</a>
<script>
$(function(){
    $('#queue').editable({
        url: '/post',
        title: 'Enter remark, destination and building #',
        value: {
            remark: "Moscow", 
            destination: "Lenina", 
            building: "15"
        }
    });
});
</script>
**/
(function ($) {
    "use strict";
    
    var QueueItem = function (options) {
        this.init('queue', options, QueueItem.defaults);
    };

    //inherit from Abstract input
    $.fn.editableutils.inherit(QueueItem, $.fn.editabletypes.abstractinput);

    $.extend(QueueItem.prototype, {
        /**
        Renders input from tpl

        @method render() 
        **/        
        render: function() {
           this.$input = this.$tpl.find('input');
        },
        
        /**
        Default method to show value in element. Can be overwritten by display option.
        
        @method value2html(value, element) 
        **/
        value2html: function(value, element) {
            if(!value) {
                $(element).empty();
                return; 
            }
            var html = $('<div>').text(value.remark).html() + ', ' + $('<div>').text(value.destination).html() + ' st., bld. ' + $('<div>').text(value.building).html();
            $(element).html(html); 
        },
        
        /**
        Gets value from element's html
        
        @method html2value(html) 
        **/        
        html2value: function(html) {        
          /*
            you may write parsing method to get value by element's html
            e.g. "Moscow, st. Lenina, bld. 15" => {remark: "Moscow", destination: "Lenina", building: "15"}
            but for complex structures it's not recommended.
            Better set value directly via javascript, e.g. 
            editable({
                value: {
                    remark: "Moscow", 
                    destination: "Lenina", 
                    building: "15"
                }
            });
          */ 
          return null;  
        },
      
       /**
        Converts value to string. 
        It is used in internal comparing (not for sending to server).
        
        @method value2str(value)  
       **/
       value2str: function(value) {
           var str = '';
           if(value) {
               for(var k in value) {
                   str = str + k + ':' + value[k] + ';';  
               }
           }
           return str;
       }, 
       
       /*
        Converts string to value. Used for reading value from 'data-value' attribute.
        
        @method str2value(str)  
       */
       str2value: function(str) {
           /*
           this is mainly for parsing value defined in data-value attribute. 
           If you will always set value by javascript, no need to overwrite it
           */
           return str;
       },                
       
       /**
        Sets value of input.
        
        @method value2input(value) 
        @param {mixed} value
       **/         
       value2input: function(value) {
           if(!value) {
             return;
           }
           this.$input.filter('[name="remark"]').val(value.remark);
           this.$input.filter('[name="destination"]').val(value.destination);
           this.$input.filter('[name="building"]').val(value.building);
       },       
       
       /**
        Returns value of input.
        
        @method input2value() 
       **/          
       input2value: function() { 
           return {
              remark: this.$input.filter('[name="remark"]').val(), 
              destination: this.$input.filter('[name="destination"]').val(), 
              building: this.$input.filter('[name="building"]').val()
           };
       },        
       
        /**
        Activates input: sets focus on the first field.
        
        @method activate() 
       **/        
       activate: function() {
            this.$input.filter('[name="remark"]').focus();
       },  
       
       /**
        Attaches handler to submit form in case of 'showbuttons=false' mode
        
        @method autosubmit() 
       **/       
       autosubmit: function() {
           this.$input.keydown(function (e) {
                if (e.which === 13) {
                    $(this).closest('form').submit();
                }
           });
       }       
    });

    QueueItem.defaults = $.extend({}, $.fn.editabletypes.abstractinput.defaults, {
        tpl: '<div class="editable-queue"><label><span>Remark: </span><input type="text" name="remark" class="input-small"></label></div>'+
             '<div class="editable-queue"><label><span>destination: </span><input type="text" name="destination" class="input-small"></label></div>'+
             '<div class="editable-queue"><label><span>Building: </span><input type="text" name="building" class="input-mini"></label></div>',
             
        inputclass: ''
    });

    $.fn.editabletypes.queue = QueueItem;

}(window.jQuery));