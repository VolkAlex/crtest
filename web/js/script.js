class AjaxRequest {

    bodyParams = {};
    url = '';

    constructor (body, url)
    {
        Object.assign(this.bodyParams, body);
        this.url = url;
    }

    request ()
    {
        let that = this;

        return new Promise((resolve, reject) => {
            $.ajax({
                url: that.url,
                type: 'post',
                data: that.bodyParams,
                success: function (data) {
                    // console.log(data);
                    resolve(data);
                },
                error: function (e) {
                    // console.log(e);
                    reject(e);
                }
            });
        });
    }
}

