(function ($) {
    $(document).ready(function () {
        //Delete btn alert
        $(".delete-form").submit(function (e) {
            let conf = confirm("Are You Sure?");

            if (conf) {
                return true;
            } else {
                e.preventDefault();
            }
        });
    });

    //Our Data Tables
    $(".data-table-haq").DataTable();

    //Slider Photo Management
    $("#slider-photo").change(function (e) {
        //alert();
        //console.log(e.target.files);

        const photo_url = URL.createObjectURL(e.target.files[0]);
        //console.log(photo_url);
        $("#slider-photo-preview").attr("src", photo_url);
    });

    // Add new Slider button
    $("#add-new-slider-button").click(function (e) {
        e.preventDefault(); //# tag remove from URL
        //alert();
        $('.slider-btn-opt').prepend(`

        <div class="btn-opt-area">
            <span>Button #1</span>
            <input type="text" class="form-control" placeholder="Button Title">
            <input type="text" class="form-control" placeholder="Button Link">
        </div>

        `);
    });
})(jQuery);
