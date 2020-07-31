$(function ()
{
    let toastDiv = $("#discountToast");
    $(toastDiv).toast();

    let controller = '/order/calculate';

    // $("#calculateButton").on("click", function (e) {
    //     let body = $("#calculateForm").serializeArray();
    //     let f = new AjaxRequest(body, controller);
    //
    //     f.request()
    //         .then( (data)=> {
    //
    //             if (parseInt(data) > 0)
    //             {
    //                 $(toastDiv).find(".toast-body").html('Вы получили скидку ' + data + '%');
    //                 $(toastDiv).toast('show');
    //             }
    //         })
    //         .catch( (e)=> {
    //             console.log(e)
    //         });
    // });

    $( "#calculateForm" ).submit(function( event ) {

        event.preventDefault();
        let body = $( this ).serializeArray() ;

        let f = new AjaxRequest(body, controller);

        f.request()
            .then( (data)=> {

                if (parseInt(data) > 0)
                {
                    $(toastDiv).find(".toast-body").html('Вы получили скидку ' + data + '%');
                    $(toastDiv).toast('show');
                }
            })
            .catch( (e)=> {
                console.log(e)
            });
    });


});