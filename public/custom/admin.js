(function($){
    $(document).ready(function(){

        //Delete btn alert
        $('.delete-form').submit(function(e){ 

            let conf = confirm('Are You Sure?');

            if(conf){
                return true;
            }else{
                e.preventDefault();            
            }

        });
    });

})(jQuery)