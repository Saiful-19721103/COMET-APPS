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

        let btn_no = 1;
        $("#add-new-slider-button").click(function (e) {
            e.preventDefault(); //# tag remove from URL
            //alert();

            /* Not More then Two Button
         if (btn_no <= 2) {
            $(".slider-btn-opt").append(`

             <span>Button #${btn_no}</span>
            <input type="text" class="form-control" name="btn_title[]" placeholder="Button Title">
            <input type="text" class="form-control" name="btn_link[]" placeholder="Button Link">
        </div>

        `);
            btn_no++;
        } else {
            alert(`You can't add more button`);
        } */

            // Add Remove button
            $(".slider-btn-opt").append(`

            <div class="btn-opt-area">
                <span>Button #${btn_no}</span>
                <span class="badge badge-danger remove-btn" style="margin-left:235px; cursor:pointer;">Remove</span>
                <input type="text" class="form-control" name="btn_title[]" placeholder="Button Title">
                <input type="text" class="form-control" name="btn_link[]" placeholder="Button Link">

                <select class="form-control" name="btn_type[]">
                <option value="btn-light-out"> Default </option>
                <option value="btn-color btn-full"> Red </option>
                </select>

                <hr />
            </div>

            `);

            btn_no++;
        });

        //Button(remove function)
        $(document).on("click", ".remove-btn", function () {
            //alert(); for check

            $(this).closest(".btn-opt-area").remove();
        });

        // icon select(Need to define)

        // select icon (Need to define)

        // Portfolio Gallery
        $('#portfolio-gallery').change(function(e){
            //alert();
            const files = e.target.files;
            let gallery_ui = '';

            for (let i = 0; i < files.length; i++) {
            const obj_url = URL.createObjectURL(files[i]);
            gallery_ui += `<img src="${obj_url}">`;
           }
            $('.port-gall').html(gallery_ui);

        });

        //CK Editor
        CKEDITOR.replace('portfolio-desc');


    });
})(jQuery);
