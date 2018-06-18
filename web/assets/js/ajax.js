 
    $.fn.serializeObject = function()
{
    var o = {};
    var a = this.serializeArray();
    $.each(a, function() {
        if (o[this.name] !== undefined) {
            if (!o[this.name].push) {
                o[this.name] = [o[this.name]];
            }
            o[this.name].push(this.value || '');
        } else {
            o[this.name] = this.value || '';
        }
    });
    return o;
};
    
$(document).ready( function(){
    var contact = Routing.generate('my_route_contact');

    $(".form-contact").submit(function(e){
        e.preventDefault();
       
        
        var form = $('.form-contact');
        
        $.ajax({
            type: "POST",
            url: contact,
            data:{ data: form.serializeArray()},
            dataType: "json",
            
            success: function(response){
                console.log(response);
                if(response.status == 'saved'){
                    form.fadeOut(1000);
                 } 
            }
        });
    });
});